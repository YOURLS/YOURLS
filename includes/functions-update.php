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
 * @param unknown_type $a    TODO
 * @return unknown           TODO
 */
function yourls_check_core_version() {

	if( defined( 'YOURLS_NO_VERSION_CHECK' ) && YOURLS_NO_VERSION_CHECK )
		return false;
		
	global $ydb, $yourls_user_passwords;
	
	$checks = yourls_get_option( 'core_version_checks' );
	
	// Invalidate check data when YOURLS version changes
	if ( is_object( $checks ) && YOURLS_VERSION != $checks->version_checked )
		$checks = false;

	if( !is_object( $checks ) ) {
		$checks = new stdClass;
		$checks->failed_attempts = 0;
		$checks->last_attempt    = 0;
		$checks->last_result     = '';
		$checks->version_checked = YOURLS_VERSION;
	}

	// Config file location ('/user' or '/includes')
	$conf_loc = str_replace( YOURLS_ABSPATH, '', YOURLS_CONFIGFILE );
	$conf_loc = str_replace( '/config.php', '', $conf_loc );
		
	// The collection of stuff to report
	$stuff = array(
		'md5'                => md5( YOURLS_SITE . YOURLS_ABSPATH ),

		'failed_attempts'    => $checks['failed'],
		'yourls_site'        => YOURLS_SITE,
		'yourls_version'     => YOURLS_VERSION,
		'php_version'        => phpversion(),
		'mysql_version'      => $ydb->mysql_version(),
		'locale'             => yourls_get_locale(),

		'db_driver'          => YOURLS_DB_DRIVER,
		'db_ext_pdo'         => extension_loaded( 'pdo_mysql' ),
		'db_ext_mysql'       => extension_loaded( 'mysql' ),
		'db_ext_mysqli'      => extension_loaded( 'mysqli' ),
		'ext_curl'           => extension_loaded( 'curl' ),

		'num_users'          => count( $yourls_user_passwords ),
		'config_location'    => $conf_loc,
		'yourls_private'     => YOURLS_PRIVATE,
		'yourls_unique'      => YOURLS_UNIQUE_URLS,
		'yourls_url_convert' => YOURLS_URL_CONVERT,
		'num_active_plugins' => yourls_has_active_plugins(),
	);
	
	$stuff = yourls_apply_filter( 'version_check_stuff', $stuff );
	
	// Send it in
	$url = 'https://api.yourls.org/core/version/1.0/';
	$req = yourls_http_post( $url, array(), $stuff );
	$checks->last_attempt = time();
	
	// Unexpected results ?
	if( is_string( $req ) or !$req->success ) {
		$checks->failed_attempts++;
		$checks->last_result  = '';
		yourls_update_option( 'core_version_checks', $checks );
		return false;
	}
	
	// Parse response
	$json = json_decode( trim( $req->body ) );
	
	// All went OK - mark this down!
	$checks->failed_attempts = 0;
	$checks->last_result     = $json;
	yourls_update_option( 'core_version_checks', $checks );
	
	return true;
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

	/* We check if we're viewing an admin page and one of these cases:
	 - no check data (never checked)
	 - failed_attempts = 0 && last_attempt > 24h  ( 24 * 3600 > ( time() - $check->last_attempt )
	 - failed_attempts > 0 && last_attempt >  2h
	 - version_checked != YOURLS_VERSION
	 
	 In the future, check with cronjob emulation instead of limiting to when viewing an admin page
	*/
	
	== blah i was last here ==

	$checks = yourls_get_option( 'core_version_checks' );
	
	if( !$checks )
		yourls_check_core_version();
		
	
		
		
	if ( isset( $$checks->last_checked ) &&
        12 * HOUR_IN_SECONDS > ( time() - $current->last_checked ) &&
        isset( $current->version_checked ) &&
        $current->version_checked == $wp_version )
        return;

	yourls_check_core_version();

}