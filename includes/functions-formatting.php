<?php
/*
 * YOURLS
 * Function library for anything related to formatting / validating / sanitizing
 */

// function to convert an integer (1337) to a string (3jk).
function yourls_int2string( $num, $chars = null ) {
	if( $chars == null )
		$chars = yourls_get_shorturl_charset();
	$string = '';
	$len = strlen( $chars );
	while( $num >= $len ) {
		$mod = bcmod( $num, $len );
		$num = bcdiv( $num, $len );
		$string = $chars[$mod] . $string;
	}
	$string = $chars[$num] . $string;
	
	return yourls_apply_filter( 'int2string', $string, $num, $chars );
}

// function to convert a string (3jk) to an integer (1337)
function yourls_string2int( $string, $chars = null ) {
	if( $chars == null )
		$chars = yourls_get_shorturl_charset();
	$integer = 0;
	$string = strrev( $string  );
	$baselen = strlen( $chars );
	$inputlen = strlen( $string );
	for ($i = 0; $i < $inputlen; $i++) {
		$index = strpos( $chars, $string[$i] );
		$integer = bcadd( $integer, bcmul( $index, bcpow( $baselen, $i ) ) );
	}

	return yourls_apply_filter( 'string2int', $integer, $string, $chars );
}

// return a unique(ish) hash for a string to be used as a valid HTML id
function yourls_string2htmlid( $string ) {
	return yourls_apply_filter( 'string2htmlid', 'y'.abs( crc32( $string ) ) );
}

// Make sure a link keyword (ie "1fv" as in "site.com/1fv") is valid.
function yourls_sanitize_string( $string ) {
	// make a regexp pattern with the shorturl charset, and remove everything but this
	$pattern = yourls_make_regexp_pattern( yourls_get_shorturl_charset() );
	$valid = substr(preg_replace('![^'.$pattern.']!', '', $string ), 0, 199);
	
	return yourls_apply_filter( 'sanitize_string', $valid, $string );
}

// Alias function. I was always getting it wrong.
function yourls_sanitize_keyword( $keyword ) {
	return yourls_sanitize_string( $keyword );
}

// Sanitize a page title. No HTML per W3C http://www.w3.org/TR/html401/struct/global.html#h-7.4.2
function yourls_sanitize_title( $title ) {
	// TODO: make stronger Implement KSES?
	$title = strip_tags( $title );
	// Remove extra white space
	$title = preg_replace( "/\s+/", ' ', trim( $title ) );
	return $title;
}

// A few sanity checks on the URL
function yourls_sanitize_url( $url, $force_protocol = true, $force_lowercase = true ) {
	// make sure there's only one 'http://' at the beginning (prevents pasting a URL right after the default 'http://')
	$url = str_replace( 
		array( 'http://http://', 'http://https://' ),
		array( 'http://',        'https://'        ),
		$url
	);

	if( $force_protocol ) {
		// make sure there's a protocol, add http:// if not
		if ( !preg_match('!^([a-zA-Z]+://)!', $url ) )
			$url = 'http://'.$url;
	}
	
	if( $force_lowercase ) {
		// force scheme and domain to lowercase - see issue 591
		preg_match( '!^([a-zA-Z]+://([^/]+))(.*)$!', $url, $matches );
		if( isset( $matches[1] ) && isset( $matches[3] ) )
			$url = strtolower( $matches[1] ) . $matches[3];
	}
	
	// clean and shave
	$url = yourls_clean_url( $url );
	return substr( $url, 0, 1999 );
}

// Function to filter all invalid characters from a URL. Stolen from WP's clean_url()
function yourls_clean_url( $url ) {
	$url = preg_replace( '|[^a-z0-9-~+_.?\[\]\^#=!&;,/:%@$\|*\'"()\\x80-\\xff]|i', '', $url );
	$strip = array( '%0d', '%0a', '%0D', '%0A' );
	$url = yourls_deep_replace( $strip, $url );
	$url = str_replace( ';//', '://', $url );
	$url = str_replace( '&amp;', '&', $url ); // Revert & not to break query strings
	
	return $url;
}

// Perform a replacement while a string is found, eg $subject = '%0%0%0DDD', $search ='%0D' -> $result =''
// Stolen from WP's _deep_replace
function yourls_deep_replace($search, $subject){
	$found = true;
	while($found) {
		$found = false;
		foreach( (array) $search as $val ) {
			while(strpos($subject, $val) !== false) {
				$found = true;
				$subject = str_replace($val, '', $subject);
			}
		}
	}
	
	return $subject;
}

// Make sure an integer is a valid integer (PHP's intval() limits to too small numbers)
// TODO FIXME FFS: unused ?
function yourls_sanitize_int($in) {
	return ( substr(preg_replace('/[^0-9]/', '', strval($in) ), 0, 20) );
}

// Make sure a integer is safe
// Note: this is not checking for integers, since integers on 32bits system are way too limited
// TODO: find a way to validate as integer
function yourls_intval($in) {
	return yourls_escape($in);
}

// Escape a string
function yourls_escape( $in ) {
	return mysql_real_escape_string($in);
}

// Sanitize an IP address
function yourls_sanitize_ip( $ip ) {
	return preg_replace( '/[^0-9a-fA-F:., ]/', '', $ip );
}

// Make sure a date is m(m)/d(d)/yyyy, return false otherwise
function yourls_sanitize_date( $date ) {
	if( !preg_match( '!^\d{1,2}/\d{1,2}/\d{4}$!' , $date ) ) {
		return false;
	}
	return $date;
}

// Sanitize a date for SQL search. Return false if malformed input.
function yourls_sanitize_date_for_sql( $date ) {
	if( !yourls_sanitize_date( $date ) )
		return false;
	return date('Y-m-d', strtotime( $date ) );
}

// Return word or words if more than one
function yourls_plural( $word, $count=1 ) {
	return $word . ($count > 1 ? 's' : '');
}

// Return trimmed string
function yourls_trim_long_string( $string, $length = 60, $append = '[...]' ) {
	$newstring = $string;
	if( function_exists('mb_substr') ) {
		if ( mb_strlen( $newstring ) > $length ) {
			$newstring = mb_substr( $newstring, 0, $length - mb_strlen( $append ), 'UTF-8' ) . $append;	
		}
	} else {
		if ( strlen( $newstring ) > $length ) {
			$newstring = substr( $newstring, 0, $length - strlen( $append ) ) . $append;	
		}
	}
	return yourls_apply_filter( 'trim_long_string', $newstring, $string, $length, $append );
}

// Sanitize a version number (1.4.1-whatever -> 1.4.1)
function yourls_sanitize_version( $ver ) {
	return preg_replace( '/[^0-9.]/', '', $ver );
}

// Sanitize a filename (no Win32 stuff)
function yourls_sanitize_filename( $file ) {
	$file = str_replace( '\\', '/', $file ); // sanitize for Win32 installs
	$file = preg_replace( '|/+|' ,'/', $file ); // remove any duplicate slash
	return $file;
}

// Check if a string seems to be UTF-8. Stolen from WP.
function yourls_seems_utf8($str) {
	$length = strlen($str);
	for ($i=0; $i < $length; $i++) {
		$c = ord($str[$i]);
		if ($c < 0x80) $n = 0; # 0bbbbbbb
		elseif (($c & 0xE0) == 0xC0) $n=1; # 110bbbbb
		elseif (($c & 0xF0) == 0xE0) $n=2; # 1110bbbb
		elseif (($c & 0xF8) == 0xF0) $n=3; # 11110bbb
		elseif (($c & 0xFC) == 0xF8) $n=4; # 111110bb
		elseif (($c & 0xFE) == 0xFC) $n=5; # 1111110b
		else return false; # Does not match any model
		for ($j=0; $j<$n; $j++) { # n bytes matching 10bbbbbb follow ?
			if ((++$i == $length) || ((ord($str[$i]) & 0xC0) != 0x80))
				return false;
		}
	}
	return true;
}

