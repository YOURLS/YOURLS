<?php
// This file initialize everything

// Include everything except auth functions
require_once (dirname(__FILE__).'/version.php');
require_once (dirname(__FILE__).'/functions.php');
require_once (dirname(__FILE__).'/functions-baseconvert.php');
require_once (dirname(__FILE__).'/class-mysql.php');

// Create the YOURLS object $ydb that will contain everything we globally need
if ( function_exists( 'yourls_db_connect' ) ) {
	global $ydb;
	yourls_db_connect();
}

// Read option right from start ?
// TODO: think about it

// Check if upgrade is needed. Note: this is bypassable with define('YOURLS_NO_VERSION_CHECK', true)
if ( !defined('YOURLS_NO_VERSION_CHECK') || YOURLS_NO_VERSION_CHECK != true ) {
	if ( yourls_upgrade_is_needed() ) {
		yourls_redirect( YOURLS_SITE .'/admin/upgrade.php' );
	}
}