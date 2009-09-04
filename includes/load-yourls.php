<?php
// This file initialize everything

// Include everything except auth functions
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

// Read option right from start
yourls_get_all_options();

// Check if upgrade is needed. Note: this is bypassable with define('YOURLS_NO_UPGRADE_CHECK', true)
if ( !defined('YOURLS_NO_UPGRADE_CHECK') || YOURLS_NO_UPGRADE_CHECK != true ) {
	if ( yourls_upgrade_is_needed() ) {
		yourls_redirect( YOURLS_SITE .'/admin/upgrade.php' );
	}
}