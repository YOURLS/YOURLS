<?php

/**
 * Install YOURLS
 *
 * This function does the strict minimum to install YOURLS : check requirements and create the DB schema
 *
 * @since 0.1
 */
function yut_install_yourls() {
	if( ! yourls_check_database_version() ) {
		die( sprintf( 'MySQL version too old. Version is: %s', yourls_get_database_version() ) ); 
	}
	
	if( ! yourls_check_php_version() ) {
		die( sprintf( 'PHP version too old. Version is: %s', phpversion() ) ); 
	}
		
	$create = yourls_create_sql_tables();
	if( array() != $create['error'] ) {
		die( sprintf( 'Could not run SQL. Error is: %s', implode( "\n\n", $create['error'] ) ) ); 
	}
}

/**
 * Declare all needed YOURLS constants
 *
 * @since 0.1
 */
function yut_declare_yourls_consts() {
	// physical path of YOURLS root
	if( !defined( 'YOURLS_ABSPATH' ) )
		define( 'YOURLS_ABSPATH', str_replace( '\\', '/', dirname( dirname( __FILE__ ) ) ) );

	// physical path of includes directory
	if( !defined( 'YOURLS_INC' ) )
		define( 'YOURLS_INC', YOURLS_ABSPATH.'/includes' );

	// physical path of user directory
	if( !defined( 'YOURLS_USERDIR' ) )
		define( 'YOURLS_USERDIR', YOURLS_ABSPATH.'/user' );

	// URL of user directory
	if( !defined( 'YOURLS_USERURL' ) )
		define( 'YOURLS_USERURL', YOURLS_SITE.'/user' );
		
	// physical path of asset directory
	if( !defined( 'YOURLS_ASSETDIR' ) )
		define( 'YOURLS_ASSETDIR', YOURLS_ABSPATH.'/assets' );

	// URL of asset directory
	if( !defined( 'YOURLS_ASSETURL' ) )
		define( 'YOURLS_ASSETURL', YOURLS_SITE.'/assets' );
		
	// physical path of translations directory
	if( !defined( 'YOURLS_LANG_DIR' ) )
		define( 'YOURLS_LANG_DIR', YOURLS_TESTDATA_DIR.'/pomo' );

	// physical path of plugins directory
	if( !defined( 'YOURLS_PLUGINDIR' ) )
		define( 'YOURLS_PLUGINDIR', YOURLS_USERDIR.'/plugins' );

	// URL of plugins directory
	if( !defined( 'YOURLS_PLUGINURL' ) )
		define( 'YOURLS_PLUGINURL', YOURLS_USERURL.'/plugins' );
		
	// physical path of themes directory
	if( !defined( 'YOURLS_THEMEDIR' ) )
		define( 'YOURLS_THEMEDIR', YOURLS_USERDIR.'/themes' );

	// URL of themes directory
	if( !defined( 'YOURLS_THEMEURL' ) )
		define( 'YOURLS_THEMEURL', YOURLS_USERURL.'/themes' );

	// physical path of pages directory
	if( !defined( 'YOURLS_PAGEDIR' ) )
		define('YOURLS_PAGEDIR', YOURLS_ABSPATH.'/pages' );

	// table to store URLs
	if( !defined( 'YOURLS_DB_TABLE_URL' ) )
		define( 'YOURLS_DB_TABLE_URL', YOURLS_DB_PREFIX.'url' );

	// table to store options
	if( !defined( 'YOURLS_DB_TABLE_OPTIONS' ) )
		define( 'YOURLS_DB_TABLE_OPTIONS', YOURLS_DB_PREFIX.'options' );

	// table to store hits, for stats
	if( !defined( 'YOURLS_DB_TABLE_LOG' ) )
		define( 'YOURLS_DB_TABLE_LOG', YOURLS_DB_PREFIX.'log' );

	// minimum delay in sec before a same IP can add another URL. Note: logged in users are not throttled down.
	if( !defined( 'YOURLS_FLOOD_DELAY_SECONDS' ) )
		define( 'YOURLS_FLOOD_DELAY_SECONDS', 0 );

	// comma separated list of IPs that can bypass flood check.
	if( !defined( 'YOURLS_FLOOD_IP_WHITELIST' ) )
		define( 'YOURLS_FLOOD_IP_WHITELIST', '' );

	// life span of an auth cookie in seconds (60*60*24*7 = 7 days)
	if( !defined( 'YOURLS_COOKIE_LIFE' ) )
		define( 'YOURLS_COOKIE_LIFE', 60*60*24*7 );

	// life span of a nonce in seconds
	if( !defined( 'YOURLS_NONCE_LIFE' ) )
		define( 'YOURLS_NONCE_LIFE', 43200 ); // 3600 * 12

	// if set to true, disable stat logging (no use for it, too busy servers, ...)
	if( !defined( 'YOURLS_NOSTATS' ) )
		define( 'YOURLS_NOSTATS', false );

	// if set to true, force https:// in the admin area
	if( !defined( 'YOURLS_ADMIN_SSL' ) )
		define( 'YOURLS_ADMIN_SSL', false );

	// if set to true, verbose debug infos. Will break things. Don't enable.
	if( !defined( 'YOURLS_DEBUG' ) )
		define( 'YOURLS_DEBUG', true );
		
	if( !defined( 'YOURLS_ADMIN_LOCATION' ) )
		define( 'YOURLS_ADMIN_LOCATION', 'admin' );
		
	// Error reporting
	if( defined( 'YOURLS_DEBUG' ) && YOURLS_DEBUG == true ) {
		error_reporting( -1 );
	} else {
		error_reporting( E_ERROR | E_PARSE );
	}
}

/**
 * Load YOURLS
 *
 * This is everything from load-yourls.php except:
 * - the config.php inclusion
 * - the maintenance mode check
 * - the "redirect to https:// if applicable" part
 * - checks for need to install or update
 * Yeah -- this is rather lame. Need to avoid to duplicate so much code.
 *
 * @since 0.1
 */
function yut_load_yourls() {
	// Include all functions
    require_once YOURLS_INC. '/vendor/autoload.php';
	require_once YOURLS_INC. '/version.php';
	$files = scandir( YOURLS_INC, 1 );
	foreach ( $files as $file ) {
		if ( strpos( $file, 'functions' ) === 0 && file_exists( YOURLS_INC . '/' . $file ) ) {
			require_once YOURLS_INC . '/' . $file;
		}
	}

	// Create the YOURLS object $ydb that will contain everything we globally need
	global $ydb;

	// Allow drop-in replacement for the DB engine
	if( file_exists( YOURLS_USERDIR.'/db.php' ) ) {
		require_once YOURLS_USERDIR.'/db.php';
	} else {
		require_once YOURLS_INC.'/class-mysql.php';
		yourls_db_connect();
	}

	// Allow early inclusion of a cache layer
	if( file_exists( YOURLS_USERDIR.'/cache.php' ) )
		require_once YOURLS_USERDIR.'/cache.php';
		
	// Init complete. We need to mimick the "plugins_loaded" event to load the kses lib
	yourls_do_action( 'plugins_loaded' );
}


/**
 * Destroy tables in selected DB if tests run locally
 *
 * If not running in Travis environment, this function will drop all tables in the selected DB
 *
 * @since 0.1
 */
function yut_drop_all_tables_if_local() {
	if( !yut_is_local() )
		return;

	// If not running in Travis environment, drop any tables from the selected database prior to starting tests
	global $ydb;
	$sql = sprintf( "SELECT group_concat(table_name) FROM information_schema.tables WHERE table_schema = '%s';", YOURLS_DB_NAME );
	try {
		$tables = $ydb->fetchValue( $sql );
	} catch( Exception $e ) {
		return;
	}
	if( $tables ) {
		try {
			$drop = $ydb->fetchValue( sprintf( 'DROP TABLE %s', $tables ) );
		} catch( Exception $e ) {
			return;
		}
	}
}
