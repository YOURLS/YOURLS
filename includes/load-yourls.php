<?php
// This file initialize everything needed for YOURLS

// Include settings
if( file_exists( dirname( dirname( __FILE__ ) ) . '/user/config.php' ) ) {
	// config.php in /user/
	define( 'YOURLS_CONFIGFILE', str_replace( '\\', '/', dirname( dirname( __FILE__ ) ) ) . '/user/config.php' );
} elseif ( file_exists( dirname( __FILE__ ) . '/config.php' ) ) {
	// config.php in /includes/
	define( 'YOURLS_CONFIGFILE', str_replace( '\\', '/', dirname( __FILE__ ) ) . '/config.php' );
} else {
	// config.php not found :(
	die( '<p class="error">Cannot find <tt>config.php</tt>.</p><p>Please read the <tt><a href="../readme.html#Install">readme.html</a></tt> to learn how to install YOURLS</p>' );
}
require_once( YOURLS_CONFIGFILE );

// Check if config.php was properly updated for 1.4
if( !defined( 'YOURLS_DB_PREFIX' ) )
	die( '<p class="error">Your <tt>config.php</tt> does not contain all the required constant definitions.</p><p>Please check <tt>config-sample.php</tt> and update your config accordingly, there are new stuffs!</p>' );

	
// Define core constants that have not been user defined in config.php

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
	define( 'YOURLS_DEBUG', false );
	
// Error reporting
if( defined( 'YOURLS_DEBUG' ) && YOURLS_DEBUG == true ) {
	error_reporting( -1 );
} else {
	error_reporting( E_ERROR | E_PARSE );
}

// Include all functions
require_once( YOURLS_INC.'/version.php' );
require_once( YOURLS_INC.'/functions.php');
require_once( YOURLS_INC.'/functions-plugins.php' );
require_once( YOURLS_INC.'/functions-formatting.php' );
require_once( YOURLS_INC.'/functions-api.php' );
require_once( YOURLS_INC.'/functions-kses.php' );
require_once( YOURLS_INC.'/functions-l10n.php' );
require_once( YOURLS_INC.'/functions-compat.php' );
require_once( YOURLS_INC.'/functions-html.php' );
require_once( YOURLS_INC.'/functions-http.php' );
require_once( YOURLS_INC.'/functions-infos.php' );

// Load auth functions if needed
if( yourls_is_private() ) {
	require_once( YOURLS_INC.'/functions-auth.php' );
}

// Enforce UTC timezone to suppress PHP warnings -- correct date/time will be managed using the config time offset
date_default_timezone_set( 'UTC' );

// Load locale
yourls_load_default_textdomain();

// Check if we are in maintenance mode - if yes, it will die here.
yourls_check_maintenance_mode();

// Fix REQUEST_URI for IIS
yourls_fix_request_uri();
	
// If request for an admin page is http:// and SSL is required, redirect
if( yourls_is_admin() && yourls_needs_ssl() && !yourls_is_ssl() ) {
	if ( 0 === strpos( $_SERVER['REQUEST_URI'], 'http' ) ) {
		yourls_redirect( preg_replace( '|^http://|', 'https://', $_SERVER['REQUEST_URI'] ) );
		exit();
	} else {
		yourls_redirect( 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );
		exit();
	}
}

// Create the YOURLS object $ydb that will contain everything we globally need
global $ydb;

// Allow drop-in replacement for the DB engine
if( file_exists( YOURLS_USERDIR.'/db.php' ) ) {
	require_once( YOURLS_USERDIR.'/db.php' );
} else {
	require_once( YOURLS_INC.'/class-mysql.php' );
	yourls_db_connect();
}

// Allow early inclusion of a cache layer
if( file_exists( YOURLS_USERDIR.'/cache.php' ) )
	require_once( YOURLS_USERDIR.'/cache.php' );

// Read options right from start
yourls_get_all_options();

// Register shutdown function
register_shutdown_function( 'yourls_shutdown' );

// Core now loaded
yourls_do_action( 'init' ); // plugins can't see this, not loaded yet

// Check if need to redirect to install procedure
if( !yourls_is_installed() && !yourls_is_installing() ) {
	yourls_redirect( yourls_admin_url( 'install.php' ), 302 );
}

// Check if upgrade is needed (bypassed if upgrading or installing)
if ( !yourls_is_upgrading() && !yourls_is_installing() ) {
	if ( yourls_upgrade_is_needed() ) {
		yourls_redirect( YOURLS_SITE .'/admin/upgrade.php', 302 );
	}
}

// Init all plugins
yourls_load_plugins();
yourls_do_action( 'plugins_loaded' );

// Is there a new version of YOURLS ?
if( yourls_is_installed() && !yourls_is_upgrading() && yourls_maybe_check_core_version() ) {
    yourls_new_core_version_notice();
}

if( yourls_is_admin() )
	yourls_do_action( 'admin_init' );

