<?php
/**
 * YOURLS Unit Test. No, I don't know what I'm doing.
 */

require_once 'PHPUnit/Autoload.php';
require_once dirname( __FILE__ ) . '/utils.php';

// Include config
$config_locations = array(
	dirname( dirname( __FILE__ ) ) . '/yourls-tests-config.php',        // manual, run locally
	dirname( dirname( dirname( __FILE__ ) ) ) . '/user/config.php',     // Travis, run from YOURLS/YOURLS
	dirname( dirname( __FILE__ ) ) . '/yourls-tests-config-travis.php', // Travis, run from YOURLS/YOURLS-unit-tests
);
foreach( $config_locations as $config ) {
	if( is_readable( $config ) ) {
		define( 'YOURLS_CONFIGFILE', $config );
		require_once YOURLS_CONFIGFILE;
		break;
	}
}
if( !defined( 'YOURLS_CONFIGFILE' ) ) {
	die( sprintf( "ERROR: config file missing. Current directory: %s\n", dirname( __FILE__ ) ) );
}

// Globalize some YOURLS variables because PHPUnit loads this inside a function
// See https://github.com/sebastianbergmann/phpunit/issues/325
global $ydb, $yourls_user_passwords, $yourls_reserved_URL,        // main object & config file
       $yourls_filters, $yourls_actions,                          // used by plugin API
       $yourls_locale, $yourls_l10n, $yourls_locale_formats,      // used by L10N API
       $yourls_allowedentitynames, $yourls_allowedprotocols,      // used by KSES
	   $ezsql_mysql_str, $ezsql_mysqli_str, $ezsql_pdo_str;       // used by ezSQL

// Initialize ourselves some constants that are typically user defined
$yourls_user_passwords = array(
	'yourls'  => 'travis-ci-test',
	'clear'   => 'somepassword',
	'md5'     => 'md5:31712:f6cae1f032b9ae81b233866f4aa791af', // password: "md5"
	'phpass'  => '$2a$08$UbOIKE2oyh.shrjSkOJ3Au7zN2vqTkrhsmAFgaMPomfeS0S6xHjG6', // password: "phpass"
	'phpass2' => '!2a!08$zzwkOxZHwup7qsfSuxdFXOzRBEOtKu4b15gXqceYJ23GOJtRq.yvO', // password: also "phpass" with YOURLS' internal char substitution
);
$yourls_reserved_URL = array(
	'porn', 'faggot', 'sex', 'nigger', 'fuck', 'cunt', 'dick', 'gay',
);
$yourls_user_consts = array(
	'YOURLS_HOURS_OFFSET'     => 5,
	'YOURLS_UNIQUE_URLS'      => true,
	'YOURLS_PRIVATE'          => true,
	'YOURLS_COOKIEKEY'        => 'I &hearts; unit tests',
	'YOURLS_URL_CONVERT'      => 62,
	'YOURLS_DB_PREFIX'        => 'yourls_',
	'YOURLS_NO_HASH_PASSWORD' => true, // prevents rewriting config.php with encrypted passwords
	'YOURLS_API'              => true, // prevents all internal redirections (login forms, etc)
);
foreach( $yourls_user_consts as $CONST => $value ) {
	if( !defined( $CONST ) )
		define( $CONST, $value );
}

// All set -- go.
declare_yourls_consts();
load_yourls();
drop_all_tables_if_local();

/**
 * Declare all needed YOURLS constants
 *
 * @since 0.1
 */
function declare_yourls_consts() {
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
		define( 'YOURLS_LANG_DIR', YOURLS_USERDIR.'/languages' );

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
function load_yourls() {
	// Include all functions
	require_once YOURLS_INC.'/version.php';
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
