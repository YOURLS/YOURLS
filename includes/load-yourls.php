<?php
// This file initialize everything needed for YOURLS

// Include settings and functions
if( !file_exists(dirname(__FILE__).'/config.php') ) {
	require_once (dirname(__FILE__).'/functions.php');
	require_once (dirname(__FILE__).'/functions-html.php');
	define('YOURLS_SITE', dirname($_SERVER['REQUEST_URI'])); // LOL. Wild guess.
	yourls_die('<p class="error">Cannot find <tt>config.php</tt>.</p><p>Please read the <tt>readme.html</tt> to learn how to install YOURLS</p>');
}
	
require_once (dirname(__FILE__).'/config.php');
require_once (dirname(__FILE__).'/version.php');
require_once (dirname(__FILE__).'/functions.php');
require_once (dirname(__FILE__).'/functions-baseconvert.php');
require_once (dirname(__FILE__).'/class-mysql.php');
// Load auth functions if needed
if( yourls_is_private() )
	require_once( dirname(__FILE__).'/functions-auth.php' );
// Load template functions if needed
if( yourls_has_interface() )
	require_once( dirname(__FILE__).'/functions-html.php' );

// Check if config.php was properly updated for 1.4
if( !defined('YOURLS_DB_PREFIX') )
	yourls_die('<p class="error">Your <tt>config.php</tt> does not contain all the required constant definitions.</p><p>Please check <tt>config-sample.php</tt> and update your config accordingly, there are new stuffs!</p>');


// Define constants that have not been user defined in config.php
if( !defined('YOURLS_DB_TABLE_URL') )
	define('YOURLS_DB_TABLE_URL', YOURLS_DB_PREFIX.'url'); // table to store URLs
if( !defined('YOURLS_DB_TABLE_OPTIONS') )
	define('YOURLS_DB_TABLE_OPTIONS', YOURLS_DB_PREFIX.'options'); // table to store options
if( !defined('YOURLS_DB_TABLE_LOG') )
	define('YOURLS_DB_TABLE_LOG', YOURLS_DB_PREFIX.'log');  // table to store hits, for stats
if( !defined('YOURLS_FLOOD_DELAY_SECONDS') )
	define('YOURLS_FLOOD_DELAY_SECONDS', 15 ); // minimum delay in sec before a same IP can add another URL. Note: logged in users are not throttled down.
if( !defined('YOURLS_FLOOD_IP_WHITELIST') )
	define('YOURLS_FLOOD_IP_WHITELIST', '' ); // comma separated list of IPs that can bypass flood check.
if( !defined('YOURLS_COOKIE_LIFE') )
	define( 'YOURLS_COOKIE_LIFE', 60*60*24*7 ); // life span of an auth cookie in seconds (60*60*24*7 = 7 days)
if( !defined('YOURLS_NONCE_LIFE') )
	define( 'YOURLS_NONCE_LIFE', 3600 ); // life span of a nonce in seconds
if( !defined('YOURLS_NOSTATS') )
	define( 'YOURLS_NOSTATS', false ); // if set to true, disable stat logging (no use for it, too busy servers, ...)
if( !defined('YOURLS_DEBUG') )
	define( 'YOURLS_DEBUG', false ); // if set to true, verbose debug infos. Will break things. Don't enable.


// Create the YOURLS object $ydb that will contain everything we globally need
if ( function_exists( 'yourls_db_connect' ) ) {
	global $ydb;
	yourls_db_connect();
}

// Read options right from start
yourls_get_all_options();

// Check if need to redirect to install procedure
if( !yourls_is_installed() && ( !defined('YOURLS_INSTALLING') || YOURLS_INSTALLING != true ) ) {
	yourls_redirect( YOURLS_SITE .'/admin/install.php' );
}

// Check if upgrade is needed.
// Note: this is bypassable with define('YOURLS_NO_UPGRADE_CHECK', true)
// This is also bypassed if YOURLS_INSTALLING
if (
	( !defined('YOURLS_NO_UPGRADE_CHECK') || YOURLS_NO_UPGRADE_CHECK != true )
	&&  
	( !defined('YOURLS_INSTALLING') || YOURLS_INSTALLING != true )
) {
	if ( yourls_upgrade_is_needed() ) {
		yourls_redirect( YOURLS_SITE .'/admin/upgrade.php' );
	}
}