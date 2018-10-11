package com.redhat.theses

import com.redhat.theses.util.Util
import grails.plugins.springsecurity.Secured
import org.springframework.context.i18n.LocaleContextHolder as LCH

/**
 * @author vdedik@redhat.com
 */
@Secured(['ROLE_ADMIN'])
class ConfigurationController {

    static allowedMethods = [update: 'POST']

    /**
     * Dependency injection of com.redhat.theses.config.Configuration
     */
    def configuration

    def index() {
        if (Util.isActionInUrl(request, 'index')) {
            redirect uri: '/configuration', permanent: true
        }

        def locale = LCH.getLocale()
        [config: configuration.getConfig(), locale: locale]
    }

    def update() {
        ConfigObject config = new ConfigObject()
        config.putAll(params.configuration ?: [:])
        configuration.setConfig(config)
        
        def configurationCommand = new ConfigurationCommand()
        
        params.configuration?.emailDomains.each {
            configurationCommand.domains.push(it)
        }
        params.configuration?.defaultSupervisors.each {
            configurationCommand.defaultSupervisors.push(it)
        }
        params.configuration?.defaultLeaders.each {
            configurationCommand.defaultLeaders.push(it)
        }
        params.configuration?.defaultAdmins.each {
            configurationCommand.defaultAdmins.push(it)
        }
        
        configurationCommand.validate()
        
        if (configurationCommand.hasErrors()) {
            render view: 'index', model: [configurationCommand: configurationCommand, config: config]
            return
        }

        if (!configuration.save()) {
            flash.message = message(code: 'config.not.updated')
            render view: 'index', model: [config: config]
        }

        flash.message = message(code: 'config.updated')

        redirect uri: '/configuration'
    }
}
