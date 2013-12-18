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
 * Results of requests sent to api.yourls.org are stored in option 'core_version_checks' and is an array
 * with the following keys:
 *    - failed_attempts : number of consecutive failed attempts
 *    - last_attempt    : time() of last attempt
 *    - last_result     : last content retrieved from api.yourls.org
 *
 * @since 1.7
 * @param unknown_type $a    TODO
 * @return unknown           TODO
 */
function yourls_version_check() {

	if( defined( 'YOURLS_NO_VERSION_CHECK' ) && YOURLS_NO_VERSION_CHECK )
		return false;
		
	global $ydb, $yourls_user_passwords;
	
	// Config file location ('/user' or '/includes')
	$conf_loc = str_replace( YOURLS_ABSPATH, '', YOURLS_CONFIGFILE );
	$conf_loc = str_replace( '/config.php', '', $conf_loc );
	
	$checks = yourls_get_option( 'core_version_checks' );
	if( !$checks ) {
		$checks['failed_attempts'] = 0;
	}
		
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
	$checks['last_attempt'] = time();
	
	// Unexpected results ?
	if( is_string( $req ) or !$req->success ) {
		$checks['failed_attempts']++;
		$checks['last_result'] = '';
		yourls_update_option( 'core_version_checks', $checks );
		return false;
	}
	
	// Parse response
	$json = json_decode( trim( $req->body ) );
	
	// All went OK - mark this down!
	$checks['failed_attempts'] = 0;
	$checks['last_result']     = $json;
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
function yourls_maybe_check_version() {


}