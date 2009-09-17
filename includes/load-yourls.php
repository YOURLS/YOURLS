<?php
// This file initialize everything needed for YOURLS

// Include settings and functions
if( !file_exists(dirname(__FILE__).'/config.php') )
	die('Cannot find <tt>config.php</tt>. Please read the <tt>readme.html</tt> to learn how to install YOURLS');
	
require_once (dirname(__FILE__).'/config.php');
require_once (dirname(__FILE__).'/version.php');
require_once (dirname(__FILE__).'/functions.php');
require_once (dirname(__FILE__).'/functions-baseconvert.php');
require_once (dirname(__FILE__).'/class-mysql.php');

// Check if config.php was properly updated for 1.4
if( !defined('YOURLS_DB_PREFIX') )
	die('<p>Your <tt>config.php</tt> does not contain all the required constant definitions. Please check <tt>config-sample.php</tt> and update your config accordingly, there are new stuffs!</p>');

// Define tables
if( !defined('YOURLS_DB_TABLE_URL') )
	define('YOURLS_DB_TABLE_URL', YOURLS_DB_PREFIX.'url');
if( !defined('YOURLS_DB_TABLE_OPTIONS') )
	define('YOURLS_DB_TABLE_OPTIONS', YOURLS_DB_PREFIX.'options');
if( !defined('YOURLS_DB_TABLE_LOG') )
	define('YOURLS_DB_TABLE_LOG', YOURLS_DB_PREFIX.'log');

// Create the YOURLS object $ydb that will contain everything we globally need
if ( function_exists( 'yourls_db_connect' ) ) {
	global $ydb;
	yourls_db_connect();
}

// Read options right from start
yourls_get_all_options();

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