<?php
// TODO: improve this.
// yourls_get_http_transport: use static vars
// yourls_get_remote_content: return array( content, status, code )

/**
 * Determine best transport for GET request. Return 'curl', 'fopen', 'fsockopen' or false if nothing works
 *
 * Order of preference: curl, fopen, fsockopen.
 *
 */
function yourls_get_http_transport( $url ) {

	$transports = array();
	
	$scheme = parse_url( $url, PHP_URL_SCHEME );
	$is_ssl = ( $scheme == 'https' || $scheme == 'ssl' );

	// Test transports by order of preference, best first

	// curl
	if( function_exists( 'curl_init' ) && function_exists( 'curl_exec' ) )
		$transports[]= 'curl';

	// fopen. Doesn't work with https?
	if( !$is_ssl && function_exists( 'fopen' ) && ini_get( 'allow_url_fopen' ) )
		$transports[]= 'fopen';
		
	// fsock
	if( function_exists( 'fsockopen' ) )
		$transports[]= 'fsockopen';
	
	$best = ( $transports ? array_shift( $transports ) : false );
	
	return yourls_apply_filter( 'get_http_transport', $best, $transports );
}

/**
 * Get remote content via a GET request using best transport available
 *
 * Returns $content (might be an error message) or false if no transport available
 *
 */
function yourls_get_remote_content( $url,  $maxlen = 4096, $timeout = 5 ) {
	$url = yourls_sanitize_url( $url );

	$transport = yourls_get_http_transport( $url );
	if( $transport ) {
		$content = call_user_func( 'yourls_get_remote_content_'.$transport, $url, $maxlen, $timeout );
	} else {
		$content = false;
	}
	
	return yourls_apply_filter( 'get_remote_content', $content, $url, $maxlen, $timeout );
}

/**
 * Get remote content using curl. Needs sanitized $url. Returns $content or false
 *
 */
function yourls_get_remote_content_curl( $url, $maxlen = 4096, $timeout = 5 ) {
	
	$ch = curl_init();
	curl_setopt( $ch, CURLOPT_URL, $url );
	curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, $timeout );
	curl_setopt( $ch, CURLOPT_TIMEOUT, $timeout );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1 ); // follow redirects...
	curl_setopt( $ch, CURLOPT_MAXREDIRS, 3 ); // ... but not more than 3
	curl_setopt( $ch, CURLOPT_USERAGENT, yourls_http_user_agent() );
	curl_setopt( $ch, CURLOPT_RANGE, "0-{$maxlen}" ); // Get no more than $maxlen
	curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 ); // dont check SSL certificates
	curl_setopt( $ch, CURLOPT_HEADER, 0 );

	$response = curl_exec( $ch );
	
	if( !$response || curl_error( $ch ) ) {
		//$response = 'Error: '.curl_error( $ch );
		return false;
	}

	curl_close( $ch );

	return substr( $response, 0, $maxlen ); // substr in case CURLOPT_RANGE not supported
}

/**
 * Get remote content using fopen. Needs sanitized $url. Returns $content or false
 *
 */
function yourls_get_remote_content_fopen( $url, $maxlen = 4096, $timeout = 5 ) {
	$content = false;
	
	$initial_timeout = @ini_set( 'default_socket_timeout', $timeout );
	$initial_user_agent = @ini_set( 'user_agent', yourls_http_user_agent() );

	// Basic error reporting shortcut
	set_error_handler( create_function('$code, $string', 'global $ydb; $ydb->fopen_error = $string;') );
	
	$fp = fopen( $url, 'r');
	if( $fp !== false ) {
		$buffer = min( $maxlen, 4096 );
		while ( !feof( $fp ) && !( strlen( $content ) >= $maxlen ) ) {
			$content .= fread( $fp, $buffer );
		}
		fclose( $fp );
	}

	if( $initial_timeout !== false )
		@ini_set( 'default_socket_timeout', $initial_timeout ); 
	if( $initial_user_agent !== false )
		@ini_set( 'user_agent', $initial_user_agent );
		

	restore_error_handler();
	
	if( !$content ) {
		//global $ydb;
		//$content = 'Error: '.strip_tags( $ydb->fopen_error );
		return false;
	}
	
	return $content;
}

/**
 * Get remote content using fsockopen. Needs sanitized $url. Returns $content or false
 *
 */
function yourls_get_remote_content_fsockopen( $url, $maxlen = 4096, $timeout = 5 ) {
	// get the host name and url path
	$parsed_url = parse_url( $url );

	$host = $parsed_url['host'];
	if ( isset( $parsed_url['path'] ) ) {
		$path = $parsed_url['path'];
	} else {
		$path = '/'; // the url is pointing to the host like http://www.mysite.com
	}

	if ( isset( $parsed_url['query'] ) ) {
		$path .= '?' . $parsed_url['query'];
	}

	if ( isset( $parsed_url['port'] ) ) {
		$port = $parsed_url['port'];
	} else {
		$port = '80';	
	}

	$response = false;

	// connect to the remote server
	$fp = @fsockopen( $host, $port, $errno, $errstr, $timeout );
	var_dump( $errno, $errstr );
	if( $fp !== false ) {
		// send some fake headers to mimick a standard browser
		fputs($fp, "GET $path HTTP/1.0\r\n" .
			"Host: $host\r\n" . 
			"User-Agent: " . yourls_http_user_agent() . "\r\n" .
			"Accept: */*\r\n" .
			"Accept-Language: en-us,en;q=0.5\r\n" .
			"Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7\r\n" .
			"Keep-Alive: 300\r\n" .
			"Connection: keep-alive\r\n" .
			"Referer: http://$host\r\n\r\n");

		// retrieve the response from the remote server
		$buffer = min( $maxlen, 4096 );
		while ( !feof( $fp ) && !( strlen( $response ) >= $maxlen ) ) { // get more or less $maxlen bytes (between $maxlen and ($maxlen + ($maxlen-1)) actually)
			$response .= fread( $fp, $buffer );
		}

		fclose( $fp );
	} else {
		//$response = trim( "Error: #$errno. $errstr" );
		return false;
	}

	// return the file content
	return $response;
}

/**
 * Return funky user agent string
 *
 */
function yourls_http_user_agent() {
	return yourls_apply_filter( 'http_user_agent', 'YOURLS v'.YOURLS_VERSION.' +http://yourls.org/ (running on '.YOURLS_SITE.')' );
}
