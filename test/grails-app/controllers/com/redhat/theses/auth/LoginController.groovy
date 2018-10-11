package com.redhat.theses.auth

import com.redhat.theses.events.LostPasswordEvent
import grails.converters.JSON

import javax.servlet.http.HttpServletResponse

import org.codehaus.groovy.grails.plugins.springsecurity.SpringSecurityUtils

import org.springframework.security.authentication.AccountExpiredException
import org.springframework.security.authentication.CredentialsExpiredException
import org.springframework.security.authentication.DisabledException
import org.springframework.security.authentication.LockedException
import org.springframework.security.core.context.SecurityContextHolder as SCH
import org.springframework.security.web.WebAttributes
import org.springframework.security.web.authentication.UsernamePasswordAuthenticationFilter

class LoginController {

    static allowedMethods = [lostPasswordConfirm: 'POST']

    /**
     * Dependency injection of org.springframework.security.authentication.AuthenticationTrustResolver
     */
    def authenticationTrustResolver

    /**
     * Dependency injection of grails.plugins.springsecurity.SpringSecurityService
     */
    def springSecurityService

    /**
     * Default action; redirects to 'defaultTargetUrl' if logged in, /login/auth otherwise.
     */
    def index() {
        if (springSecurityService.isLoggedIn()) {
            redirect uri: SpringSecurityUtils.securityConfig.successHandler.defaultTargetUrl
        }
        else {
            redirect action: 'auth', params: params
        }
    }

    /**
     * Show the login page.
     */
    def auth() {

        def config = SpringSecurityUtils.securityConfig

        if (springSecurityService.isLoggedIn()) {
            redirect uri: config.successHandler.defaultTargetUrl
            return
        }

        String view = 'auth'
        String postUrl = "${request.contextPath}${config.apf.filterProcessesUrl}"
        render view: view, model: [postUrl: postUrl,
                                   rememberMeParameter: config.rememberMe.parameter]
    }

    /**
     * The redirect action for Ajax requests.
     */
    def authAjax() {
        response.setHeader 'Location', SpringSecurityUtils.securityConfig.auth.ajaxLoginFormUrl
        response.sendError HttpServletResponse.SC_UNAUTHORIZED
    }

    /**
     * Show denied page.
     */
    def denied() {
        if (springSecurityService.isLoggedIn() &&
                authenticationTrustResolver.isRememberMe(SCH.context?.authentication)) {
            // have cookie but the page is guarded with IS_AUTHENTICATED_FULLY
            redirect action: 'full', params: params
        }
        render view: '/errors/403'
    }

    /**
     * Login page for users with a remember-me cookie but accessing a IS_AUTHENTICATED_FULLY page.
     */
    def full() {
        def config = SpringSecurityUtils.securityConfig
        render view: 'auth', params: params,
            model: [hasCookie: authenticationTrustResolver.isRememberMe(SCH.context?.authentication),
                    postUrl: "${request.contextPath}${config.apf.filterProcessesUrl}"]
    }

    /**
     * Callback after a failed login. Redirects to the auth page with a warning message.
     */
    def authfail() {

        def email = session[UsernamePasswordAuthenticationFilter.SPRING_SECURITY_LAST_USERNAME_KEY]
        String msg = ''
        def exception = session[WebAttributes.AUTHENTICATION_EXCEPTION]
        if (exception) {
            if (exception instanceof AccountExpiredException) {
                msg = g.message(code: "security.errors.login.expired")
            }
            else if (exception instanceof CredentialsExpiredException) {
                msg = g.message(code: "security.errors.login.passwordExpired")
            }
            else if (exception instanceof DisabledException) {
                msg = g.message(code: "security.errors.login.disabled")
            }
            else if (exception instanceof LockedException) {
                msg = g.message(code: "security.errors.login.locked")
            }
            else {
                msg = g.message(code: "security.errors.login.fail")
            }
        }

        if (springSecurityService.isAjax(request)) {
            render([error: msg] as JSON)
        }
        else {
            flash.message = msg
            redirect action: 'auth', params: params
        }
    }

    def lostPassword() {
        [emailCommand: new EmailCommand()]
    }

    def lostPasswordConfirm() {
        def emailCommand = new EmailCommand()
        bindData(emailCommand, params.emailCommand)
        emailCommand.validate()

        if (emailCommand.hasErrors()) {
            render view: 'lostPassword', model: [emailCommand: emailCommand]
            return
        }

        def user = User.findByEmail(emailCommand.email)

        event("lostPassword", new LostPasswordEvent(user))
        redirect(action: 'lostPasswordVerify')
    }

    def lostPasswordVerify() {
        render view: '/emailConfirmation/lifecycle', model: [
                redirect: false,
                title: message(code: 'security.lost.password.verify.title'),
                header: message(code: 'security.lost.password.verify.header'),
                content: message(code: 'security.lost.password.verify.message')
        ]
    }

    def lostPasswordVerified() {
        render view: '/emailConfirmation/lifecycle', model: [
                redirect: false,
                title: message(code: 'security.lost.password.verified.title'),
                header: message(code: 'security.lost.password.verified.header'),
                content: message(code: 'security.lost.password.verified.message')
        ]
    }

    /**
     * The Ajax success redirect url.
     */
    def ajaxSuccess() {
        render([success: true, email: springSecurityService.authentication.name] as JSON)
    }

    /**
     * The Ajax denied redirect url.
     */
    def ajaxDenied() {
        render([error: 'access denied'] as JSON)
    }
}
