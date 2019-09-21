<?php

/**
 * Install YOURLS tables
 *
 * @return void
 */
function yut_install_yourls() {
    yut_drop_all_tables_if_local();

	if (!yourls_check_database_version()) {
		die( sprintf( 'MySQL version too old. Version is: %s', yourls_get_database_version() ) );
	}

	if (!yourls_check_php_version()) {
		die( sprintf( 'PHP version too old. Version is: %s', phpversion() ) );
	}

	$create = yourls_create_sql_tables();
	if (array() != $create['error']) {
		die( sprintf( 'Could not run SQL. Error is: %s', implode( "\n\n", $create['error'] ) ) );
	}
}


/**
 * Find YOURLS config depending on unit test context
 *
 * Unit tests can be run locally (someone typing 'phpunit' in their console) or on Travis
 * on YOURLS/YOURLS or YOURLS/YOURLS/YOURLS-unit-tests when pushing commits.
 *
 * @return string  config file path (eg '/home/you/path/to/config.php')
 */
function yut_find_config() {
    $config_locations = array(
        dirname(__DIR__). '/yourls-tests-config.php',         // manual, run locally
        dirname(dirname(__DIR__)) . '/user/config.php',       // Travis, run from YOURLS/YOURLS
    );

    foreach($config_locations as $config) {
        if (is_readable($config)) {
            return str_replace('\\', '/', $config);
        }
    }

    die( sprintf( "ERROR: config file missing. Current directory: %s\n", dirname(__DIR__) ) );
}

/**
 * Destroy tables in selected DB if tests run locally
 *
 * If not running in Travis environment, this function will drop all tables in the selected DB
 *
 * @return void
 */
function yut_drop_all_tables_if_local() {
	if( !yut_is_local() )
		return;

	// If not running in Travis environment, drop any tables from the selected database prior to starting tests
	global $ydb;
    $tables = sprintf('%s,%s,%s', YOURLS_DB_TABLE_URL, YOURLS_DB_TABLE_OPTIONS, YOURLS_DB_TABLE_LOG);
    $sql = sprintf('DROP TABLE IF EXISTS %s', $tables);
    $ydb->perform($sql);
}
