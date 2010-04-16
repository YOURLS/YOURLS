<?php

// Functions to get remote content. TODO: support also cURL ?

// Get remote content using fopen. Needs sanitized $url. Returns false or $content.
function yourls_get_remote_content_fopen( $url, $maxlen = 4096, $timeout = 5 ) {
	//$url = urlencode( $url );
	$content = false;
	
	$old_timeout = ini_set('default_socket_timeout', $timeout);
	$fp = @fopen( $url, 'r');
	if( $old_timeout !== false )
		ini_set('default_socket_timeout', $old_timeout); 
	if( $fp !== false ) {
		$buffer = min( $maxlen, 4096 );
		while ( !feof( $fp ) && !( strlen( $content ) >= $maxlen ) ) {
			$content .= fread( $fp, $buffer );
		}
		fclose( $fp );
	}
	
	// return the file content
	return $content;

}

// Get remote content using fsockopen. Needs sanitized $url. Returns false or $content.
function yourls_get_remote_content_fsock( $url, $maxlen = 4096, $timeout = 5 ) {
	// get the host name and url path
	$parsed_url = parse_url($url);

	$host = $parsed_url['host'];
	if ( isset($parsed_url['path']) ) {
		$path = $parsed_url['path'];
	} else {
		$path = '/'; // the url is pointing to the host like http://www.mysite.com
	}

	if (isset($parsed_url['query'])) {
		$path .= '?' . $parsed_url['query'];
	}

	if (isset($parsed_url['port'])) {
		$port = $parsed_url['port'];
	} else {
		$port = '80';	
	}

	$response = false;

	// connect to the remote server
	$fp = @fsockopen( $host, $port, $errno, $errstr, $timeout );
	if( $fp !== false ) {
		// send some fake headers to mimick a standard browser
		fputs($fp, "GET $path HTTP/1.0\r\n" .
			"Host: $host\r\n" . 
			"User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.9.2) Gecko/20100115 Firefox/3.6\r\n" .
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
	}

	// return the file content
	return $response;
}

