databaseChangeLog = {
    include file: 'initial-database.groovy'

	include file: 'application-approved-replaced-by-status.groovy'

	include file: 'add-links-to-theses.groovy'
}
