<?php
/*
 * YOURLS
 * Functions related to update checks and api.yourls.org
 *
 */

/**
 * Check if there's a newer version of YOURLS
 *
 * This function collects various stats to help us improve YOURLS. See https://gist.github.com/ozh/5518761
 * Results of requests sent to api.yourls.org are stored in option 'core_version_checks' and is an object
 * with the following properties:
 *    - failed_attempts : number of consecutive failed attempts
 *    - last_attempt    : time() of last attempt
 *    - last_result     : content retrieved from api.yourls.org during previous check
 *    - version_checked : installed YOURLS version that was last checked
 *
 * @since 1.7
 * @return boolean True if api.yourls.org successfully requested, false otherwise
 */
function yourls_check_core_version() {

	if( defined( 'YOURLS_NO_VERSION_CHECK' ) && YOURLS_NO_VERSION_CHECK )
		return false;
		
	global $ydb, $yourls_user_passwords;
	
	$checks = yourls_get_option( 'core_version_checks' );
	
	// Invalidate check data when YOURLS version changes
	if ( is_object( $checks ) && YOURLS_VERSION != $checks->version_checked ) {
		$checks = false;
	}
	
	if( !is_object( $checks ) ) {
		$checks = new stdClass;
		$checks->failed_attempts = 0;
		$checks->last_attempt    = 0;
		$checks->last_result     = '';
		$checks->version_checked = YOURLS_VERSION;
	}

	// Config file location ('u' for '/user' or 'i' for '/includes')
	$conf_loc = str_replace( YOURLS_ABSPATH, '', YOURLS_CONFIGFILE );
	$conf_loc = str_replace( '/config.php', '', $conf_loc );
	$conf_loc = ( $conf_loc == '/user' ? 'u' : 'i' );
		
	// The collection of stuff to report
	$stuff = array(
		'md5'                => md5( YOURLS_SITE . YOURLS_ABSPATH ),

		'failed_attempts'    => $checks->failed_attempts,
		'yourls_site'        => YOURLS_SITE,
		'yourls_version'     => YOURLS_VERSION,
		'php_version'        => phpversion(),
		'mysql_version'      => $ydb->mysql_version(),
		'locale'             => yourls_get_locale(),

		'db_driver'          => YOURLS_DB_DRIVER,
		'db_ext_pdo'         => extension_loaded( 'pdo_mysql' ) ? 1 : 0,
		'db_ext_mysql'       => extension_loaded( 'mysql' )     ? 1 : 0,
		'db_ext_mysqli'      => extension_loaded( 'mysqli' )    ? 1 : 0,
		'ext_curl'           => extension_loaded( 'curl' )      ? 1 : 0,

		'num_users'          => count( $yourls_user_passwords ),
		'config_location'    => $conf_loc,
		'yourls_private'     => YOURLS_PRIVATE     ? 1 : 0,
		'yourls_unique'      => YOURLS_UNIQUE_URLS ? 1 : 0,
		'yourls_url_convert' => YOURLS_URL_CONVERT,
		'num_active_plugins' => yourls_has_active_plugins(),
	);
	
	$stuff = yourls_apply_filter( 'version_check_stuff', $stuff );
	
	// Send it in
	$checks->last_attempt = time();
	$url = 'https://api.yourls.org/core/version/1.0/';
	$req = yourls_http_post( $url, array(), $stuff );
	
	// Unexpected results ?
	if( is_string( $req ) or !$req->success ) {
		$checks->failed_attempts = $checks->failed_attempts + 1;
		$checks->last_result     = '';
		yourls_update_option( 'core_version_checks', $checks );
		return false;
	}
	
	// Parse response
	$json = json_decode( trim( $req->body ) );
	
	if( isset( $json->latest ) && isset( $json->zipurl ) ) {
		// All went OK - mark this down
		$checks->failed_attempts = 0;
		$checks->last_result     = $json;
		$checks->version_checked = YOURLS_VERSION;
		yourls_update_option( 'core_version_checks', $checks );
		
		return true;
	}
	
	// Request returned actual result, but not what we expected
	return false;	
}


/**
 * Determine if we need to check for a newer YOURLS version
 *
 * Longer description
 *
 * @since
 * @param unknown_type $a    TODO
 * @return unknown           TODO
 */
function yourls_maybe_check_core_version() {

	/* Let's check if :
	 - we're viewing an admin page
	 AND one of these cases:
	 - last_result not set
	 - failed_attempts = 0 && last_attempt > 24h  ( 24 * 3600 > ( time() - $check->last_attempt )
	 - failed_attempts > 0 && last_attempt >  2h
	 - version_checked != YOURLS_VERSION
	 
	 In the future, maybe check with cronjob emulation instead of limiting to when viewing an admin page
	*/
	

}