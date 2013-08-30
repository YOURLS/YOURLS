<?php
/**
 * YOURLS Unit Test. No, I don't know what I'm doing.
 */

require_once 'PHPUnit/Autoload.php';

// Include config
$config_file_path = dirname( dirname( __FILE__ ) ) . '/yourls-tests-config.php';
if ( !is_readable( $config_file_path ) ) {
	die( "ERROR: yourls-tests-config.php is missing!\n" );
}
require_once $config_file_path;

// Load YOURLS
load_yourls();

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
function load_yourls() {
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
		
	// physical path of translations directory
	if( !defined( 'YOURLS_LANG_DIR' ) )
		define( 'YOURLS_LANG_DIR', YOURLS_USERDIR.'/languages' );

	// physical path of plugins directory
	if( !defined( 'YOURLS_PLUGINDIR' ) )
		define( 'YOURLS_PLUGINDIR', YOURLS_USERDIR.'/plugins' );

	// URL of plugins directory
	if( !defined( 'YOURLS_PLUGINURL' ) )
		define( 'YOURLS_PLUGINURL', YOURLS_USERURL.'/plugins' );
		
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
		define( 'YOURLS_FLOOD_DELAY_SECONDS', 15 );

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
		
	// Error reporting
	if( defined( 'YOURLS_DEBUG' ) && YOURLS_DEBUG == true ) {
		error_reporting( -1 );
	} else {
		error_reporting( E_ERROR | E_PARSE );
	}

	// Include all functions
	$files = scandir( YOURLS_INC );
	foreach ( $files as $file ) {
		if ( strpos( $file, 'functions-' ) && file_exists( YOURLS_INC . '/' . $file ) ) {
			require_once YOURLS_INC . '/' . $file;
		}
	}

	// Load locale
	yourls_load_default_textdomain();

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

	// Read options right from start
	yourls_get_all_options();

	// Register shutdown function
	register_shutdown_function( 'yourls_shutdown' );

	// Core now loaded
	yourls_do_action( 'init' ); // plugins can't see this, not loaded yet

	// Init all plugins
	yourls_load_plugins();
	yourls_do_action( 'plugins_loaded' );

	if( yourls_is_admin() )
		yourls_do_action( 'admin_init' );
}
