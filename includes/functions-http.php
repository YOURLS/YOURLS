<?php
// Functions that relate to HTTP stuff

/**
 * Perform a GET request, return response object
 *
 * Notable object properties: body, headers, status_code
 *
 * @since 1.7
 * @see yourls_http_request
 * @return object Response
 */
function yourls_http_get( $url, $headers = array(), $data = array(), $options = array() ) {
	return yourls_http_request( 'GET', $url, $headers, $data, $options );
}

/**
 * Perform a GET request, return body
 *
 * @since 1.7
 * @see yourls_http_request
 * @return string body
 */
function yourls_http_get_body( $url, $headers = array(), $data = array(), $options = array() ) {
	$return = yourls_http_get( $url, $headers, $data, $options );
	return $return->body;
}

/**
 * Perform a POST request, return response object
 *
 * Notable object properties: body, headers, status_code
 *
 * @since 1.7
 * @see yourls_http_request
 * @return object Response
 */
function yourls_http_post( $url, $headers = array(), $data = array(), $options = array() ) {
	return yourls_http_request( 'POST', $url, $headers, $data, $options );
}

/**
 * Perform a POST request, return body
 *
 * Wrapper for yourls_http_request()
 *
 * @since 1.7
 * @see yourls_http_request
 * @return string body
 */
function yourls_http_post_body( $url, $headers = array(), $data = array(), $options = array() ) {
	$return = yourls_http_post( $url, $headers, $data, $options );
	return $return->body;
}

/**
 * Default HTTP requests options for YOURLS
 *
 * For a list of all available options, see function request() in Requests/Requests.php
 *
 * @since 1.7
 * @return array Options
 */
function yourls_http_default_options() {
	$options = array(
		'timeout'          => '5',
		'useragent'        => yourls_http_user_agent(),
		'follow_redirects' => true,
		'redirects'        => 3,
	);

	return yourls_apply_filter( 'http_default_options', $options );	
}

/**
 * Perform a HTTP request, return response object
 *
 * @since 1.7
 * @param string $var Stuff
 * @return string Result
 */
function yourls_http_request( $type, $url, $headers, $data, $options ) {
	yourls_http_load_library();
	
	$options = array_merge( yourls_http_default_options(), $options );

	return Requests::request( $url, $headers, $data, $type, $options );
}

/**
 * Check if Requests class is defined, include Requests library if need be
 *
 * All HTTP functions should perform that check prior to any operation. This is to avoid
 * include()-ing all the Requests files on every YOURLS instance disregarding whether needed or not.
 *
 * @since 1.7
 */
function yourls_http_load_library() {
	if ( !class_exists( 'Requests', false ) ) {
		require_once dirname( __FILE__ ) . '/Requests/Requests.php';
		Requests::register_autoloader();
	}
}

/**
 * Deprecated. Get remote content via a GET request using best transport available
 * Returns $content (might be an error message) or false if no transport available
 *
 */
function yourls_get_remote_content( $url,  $maxlen = 4096, $timeout = 5 ) {
	yourls_deprecated_function( __FUNCTION__, '1.7', 'yourls_http_get' );
	return yourls_http_get_body( $url );
}

/**
 * Return funky user agent string
 *
 */
function yourls_http_user_agent() {
	return yourls_apply_filter( 'http_user_agent', 'YOURLS v'.YOURLS_VERSION.' +http://yourls.org/ (running on '.YOURLS_SITE.')' );
}
