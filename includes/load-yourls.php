<?php
// This file initialize everything

// Include everything except auth functions
require_once (dirname(__FILE__).'/version.php');
require_once (dirname(__FILE__).'/functions.php');
require_once (dirname(__FILE__).'/functions-baseconvert.php');
require_once (dirname(__FILE__).'/class-mysql.php');

// Check if config.php was properly updated for 1.4
if( !defined('YOURLS_DB_TABLE_OPTIONS') )
	die('<p>Your <tt>config.php</tt> does not contain all the required constant definitions. Please check <tt>config-sample.php</tt> and update your config accordingly, there are new stuffs!</p>');

// Create the YOURLS object $ydb that will contain everything we globally need
if ( function_exists( 'yourls_db_connect' ) ) {
	global $ydb;
	yourls_db_connect();
}

// Read option right from start
yourls_get_all_options();


// Check if upgrade is needed. Note: this is bypassable with define('YOURLS_NO_VERSION_CHECK', true)
if ( !defined('YOURLS_NO_VERSION_CHECK') || YOURLS_NO_VERSION_CHECK != true ) {
	if ( yourls_upgrade_is_needed() ) {
		yourls_redirect( YOURLS_SITE .'/admin/upgrade.php' );
	}
}