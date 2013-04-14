<?php
/*
 * YOURLS
 * Function library for anything related to formatting / validating / sanitizing
 */

/**
 * Convert an integer (1337) to a string (3jk).
 *
 */
function yourls_int2string( $num, $chars = null ) {
	if( $chars == null )
		$chars = yourls_get_shorturl_charset();
	$string = '';
	$len = strlen( $chars );
	while( $num >= $len ) {
		$mod = bcmod( $num, $len );
		$num = bcdiv( $num, $len );
		$string = $chars[ $mod ] . $string;
	}
	$string = $chars[ intval( $num ) ] . $string;
	
	return yourls_apply_filter( 'int2string', $string, $num, $chars );
}

/**
 * Convert a string (3jk) to an integer (1337)
 *
 */
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

/**
 * Return a unique(ish) hash for a string to be used as a valid HTML id
 *
 */
function yourls_string2htmlid( $string ) {
	return yourls_apply_filter( 'string2htmlid', 'y'.abs( crc32( $string ) ) );
}

/**
 * Make sure a link keyword (ie "1fv" as in "site.com/1fv") is valid.
 *
 */
function yourls_sanitize_string( $string ) {
	// make a regexp pattern with the shorturl charset, and remove everything but this
	$pattern = yourls_make_regexp_pattern( yourls_get_shorturl_charset() );
	$valid = substr( preg_replace( '![^'.$pattern.']!', '', $string ), 0, 199 );
	
	return yourls_apply_filter( 'sanitize_string', $valid, $string );
}

/**
 * Alias function. I was always getting it wrong.
 *
 */
function yourls_sanitize_keyword( $keyword ) {
	return yourls_sanitize_string( $keyword );
}

/**
 * Sanitize a page title. No HTML per W3C http://www.w3.org/TR/html401/struct/global.html#h-7.4.2
 *
 */
function yourls_sanitize_title( $unsafe_title ) {
	$title = $unsafe_title;
	$title = strip_tags( $title );
	$title = preg_replace( "/\s+/", ' ', trim( $title ) );
	return yourls_apply_filter( 'sanitize_title', $title, $unsafe_title );
}

/**
 * A few sanity checks on the URL. Used for redirection or DB. For display purpose, see yourls_esc_url()
 *
 */
function yourls_sanitize_url( $unsafe_url ) {
	$url = yourls_esc_url( $unsafe_url, 'redirection' );	
	return yourls_apply_filter( 'sanitize_url', $url, $unsafe_url );
}

/**
 * Perform a replacement while a string is found, eg $subject = '%0%0%0DDD', $search ='%0D' -> $result =''
 *
 * Stolen from WP's _deep_replace
 *
 */
function yourls_deep_replace( $search, $subject ){
	$found = true;
	while($found) {
		$found = false;
		foreach( (array) $search as $val ) {
			while( strpos( $subject, $val ) !== false ) {
				$found = true;
				$subject = str_replace( $val, '', $subject );
			}
		}
	}
	
	return $subject;
}

/**
 * Make sure an integer is a valid integer (PHP's intval() limits to too small numbers)
 *
 */
function yourls_sanitize_int( $in ) {
	return ( substr( preg_replace( '/[^0-9]/', '', strval( $in ) ), 0, 20 ) );
}

/**
 * Make sure a integer is safe
 * 
 * Note: this is not checking for integers, since integers on 32bits system are way too limited
 * TODO: find a way to validate as integer
 *
 */
function yourls_intval( $in ) {
	return yourls_escape( $in );
}

/**
 * Escape a string
 *
 */
function yourls_escape( $in ) {
	return mysql_real_escape_string( $in );
}

/**
 * Sanitize an IP address
 *
 */
function yourls_sanitize_ip( $ip ) {
	return preg_replace( '/[^0-9a-fA-F:., ]/', '', $ip );
}

/**
 * Make sure a date is m(m)/d(d)/yyyy, return false otherwise
 *
 */
function yourls_sanitize_date( $date ) {
	if( !preg_match( '!^\d{1,2}/\d{1,2}/\d{4}$!' , $date ) ) {
		return false;
	}
	return $date;
}

/**
 * Sanitize a date for SQL search. Return false if malformed input.
 *
 */
function yourls_sanitize_date_for_sql( $date ) {
	if( !yourls_sanitize_date( $date ) )
		return false;
	return date( 'Y-m-d', strtotime( $date ) );
}

/**
 * Return word or words if more than one
 *
 */
function yourls_plural( $word, $count=1 ) {
	yourls_deprecated_function( __FUNCTION__, '1.6', 'yourls_n' );
	return $word . ($count > 1 ? 's' : '');
}

/**
 * Return trimmed string
 *
 */
function yourls_trim_long_string( $string, $length = 60, $append = '[...]' ) {
	$newstring = $string;
	if( function_exists( 'mb_substr' ) ) {
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

/**
 * Sanitize a version number (1.4.1-whatever -> 1.4.1)
 *
 */
function yourls_sanitize_version( $ver ) {
	return preg_replace( '/[^0-9.]/', '', $ver );
}

/**
 * Sanitize a filename (no Win32 stuff)
 *
 */
function yourls_sanitize_filename( $file ) {
	$file = str_replace( '\\', '/', $file ); // sanitize for Win32 installs
	$file = preg_replace( '|/+|' ,'/', $file ); // remove any duplicate slash
	return $file;
}

/**
 * Check if a string seems to be UTF-8. Stolen from WP.
 *
 */
function yourls_seems_utf8( $str ) {
	$length = strlen( $str );
	for ( $i=0; $i < $length; $i++ ) {
		$c = ord( $str[ $i ] );
		if ( $c < 0x80 ) $n = 0; # 0bbbbbbb
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

/**
 * Checks for invalid UTF8 in a string. Stolen from WP
 *
 * @since 1.6
 *
 * @param string $string The text which is to be checked.
 * @param boolean $strip Optional. Whether to attempt to strip out invalid UTF8. Default is false.
 * @return string The checked text.
 */
function yourls_check_invalid_utf8( $string, $strip = false ) {
	$string = (string) $string;

	if ( 0 === strlen( $string ) ) {
		return '';
	}

	// Check for support for utf8 in the installed PCRE library once and store the result in a static
	static $utf8_pcre;
	if ( !isset( $utf8_pcre ) ) {
		$utf8_pcre = @preg_match( '/^./u', 'a' );
	}
	// We can't demand utf8 in the PCRE installation, so just return the string in those cases
	if ( !$utf8_pcre ) {
		return $string;
	}

	// preg_match fails when it encounters invalid UTF8 in $string
	if ( 1 === @preg_match( '/^./us', $string ) ) {
		return $string;
	}

	// Attempt to strip the bad chars if requested (not recommended)
	if ( $strip && function_exists( 'iconv' ) ) {
		return iconv( 'utf-8', 'utf-8', $string );
	}

	return '';
}

/**
 * Converts a number of special characters into their HTML entities. Stolen from WP.
 *
 * Specifically deals with: &, <, >, ", and '.
 *
 * $quote_style can be set to ENT_COMPAT to encode " to
 * &quot;, or ENT_QUOTES to do both. Default is ENT_NOQUOTES where no quotes are encoded.
 *
 * @since 1.6
 *
 * @param string $string The text which is to be encoded.
 * @param mixed $quote_style Optional. Converts double quotes if set to ENT_COMPAT, both single and double if set to ENT_QUOTES or none if set to ENT_NOQUOTES. Also compatible with old values; converting single quotes if set to 'single', double if set to 'double' or both if otherwise set. Default is ENT_NOQUOTES.
 * @param string $charset Optional. The character encoding of the string. Default is false.
 * @param boolean $double_encode Optional. Whether to encode existing html entities. Default is false.
 * @return string The encoded text with HTML entities.
 */
function yourls_specialchars( $string, $quote_style = ENT_NOQUOTES, $double_encode = false ) {
	$string = (string) $string;

	if ( 0 === strlen( $string ) )
		return '';

	// Don't bother if there are no specialchars - saves some processing
	if ( ! preg_match( '/[&<>"\']/', $string ) )
		return $string;

	// Account for the previous behaviour of the function when the $quote_style is not an accepted value
	if ( empty( $quote_style ) )
		$quote_style = ENT_NOQUOTES;
	elseif ( ! in_array( $quote_style, array( 0, 2, 3, 'single', 'double' ), true ) )
		$quote_style = ENT_QUOTES;

	$charset = 'UTF-8';

	$_quote_style = $quote_style;

	if ( $quote_style === 'double' ) {
		$quote_style = ENT_COMPAT;
		$_quote_style = ENT_COMPAT;
	} elseif ( $quote_style === 'single' ) {
		$quote_style = ENT_NOQUOTES;
	}

	// Handle double encoding ourselves
	if ( $double_encode ) {
		$string = @htmlspecialchars( $string, $quote_style, $charset );
	} else {
		// Decode &amp; into &
		$string = yourls_specialchars_decode( $string, $_quote_style );

		// Guarantee every &entity; is valid or re-encode the &
		$string = yourls_kses_normalize_entities( $string );

		// Now re-encode everything except &entity;
		$string = preg_split( '/(&#?x?[0-9a-z]+;)/i', $string, -1, PREG_SPLIT_DELIM_CAPTURE );

		for ( $i = 0; $i < count( $string ); $i += 2 )
			$string[$i] = @htmlspecialchars( $string[$i], $quote_style, $charset );

		$string = implode( '', $string );
	}

	// Backwards compatibility
	if ( 'single' === $_quote_style )
		$string = str_replace( "'", '&#039;', $string );

	return $string;
}

/**
 * Converts a number of HTML entities into their special characters. Stolen from WP.
 *
 * Specifically deals with: &, <, >, ", and '.
 *
 * $quote_style can be set to ENT_COMPAT to decode " entities,
 * or ENT_QUOTES to do both " and '. Default is ENT_NOQUOTES where no quotes are decoded.
 *
 * @since 1.6
 *
 * @param string $string The text which is to be decoded.
 * @param mixed $quote_style Optional. Converts double quotes if set to ENT_COMPAT, both single and double if set to ENT_QUOTES or none if set to ENT_NOQUOTES. Also compatible with old _wp_specialchars() values; converting single quotes if set to 'single', double if set to 'double' or both if otherwise set. Default is ENT_NOQUOTES.
 * @return string The decoded text without HTML entities.
 */
function yourls_specialchars_decode( $string, $quote_style = ENT_NOQUOTES ) {
	$string = (string) $string;

	if ( 0 === strlen( $string ) ) {
		return '';
	}

	// Don't bother if there are no entities - saves a lot of processing
	if ( strpos( $string, '&' ) === false ) {
		return $string;
	}

	// Match the previous behaviour of _wp_specialchars() when the $quote_style is not an accepted value
	if ( empty( $quote_style ) ) {
		$quote_style = ENT_NOQUOTES;
	} elseif ( !in_array( $quote_style, array( 0, 2, 3, 'single', 'double' ), true ) ) {
		$quote_style = ENT_QUOTES;
	}

	// More complete than get_html_translation_table( HTML_SPECIALCHARS )
	$single = array( '&#039;'  => '\'', '&#x27;' => '\'' );
	$single_preg = array( '/&#0*39;/'  => '&#039;', '/&#x0*27;/i' => '&#x27;' );
	$double = array( '&quot;' => '"', '&#034;'  => '"', '&#x22;' => '"' );
	$double_preg = array( '/&#0*34;/'  => '&#034;', '/&#x0*22;/i' => '&#x22;' );
	$others = array( '&lt;'   => '<', '&#060;'  => '<', '&gt;'   => '>', '&#062;'  => '>', '&amp;'  => '&', '&#038;'  => '&', '&#x26;' => '&' );
	$others_preg = array( '/&#0*60;/'  => '&#060;', '/&#0*62;/'  => '&#062;', '/&#0*38;/'  => '&#038;', '/&#x0*26;/i' => '&#x26;' );

	if ( $quote_style === ENT_QUOTES ) {
		$translation = array_merge( $single, $double, $others );
		$translation_preg = array_merge( $single_preg, $double_preg, $others_preg );
	} elseif ( $quote_style === ENT_COMPAT || $quote_style === 'double' ) {
		$translation = array_merge( $double, $others );
		$translation_preg = array_merge( $double_preg, $others_preg );
	} elseif ( $quote_style === 'single' ) {
		$translation = array_merge( $single, $others );
		$translation_preg = array_merge( $single_preg, $others_preg );
	} elseif ( $quote_style === ENT_NOQUOTES ) {
		$translation = $others;
		$translation_preg = $others_preg;
	}

	// Remove zero padding on numeric entities
	$string = preg_replace( array_keys( $translation_preg ), array_values( $translation_preg ), $string );

	// Replace characters according to translation table
	return strtr( $string, $translation );
}


/**
 * Escaping for HTML blocks. Stolen from WP
 *
 * @since 1.6
 *
 * @param string $text
 * @return string
 */
function yourls_esc_html( $text ) {
	$safe_text = yourls_check_invalid_utf8( $text );
	$safe_text = yourls_specialchars( $safe_text, ENT_QUOTES );
	return yourls_apply_filters( 'esc_html', $safe_text, $text );
}

/**
 * Escaping for HTML attributes.  Stolen from WP
 *
 * @since 1.6
 *
 * @param string $text
 * @return string
 */
function yourls_esc_attr( $text ) {
	$safe_text = yourls_check_invalid_utf8( $text );
	$safe_text = yourls_specialchars( $safe_text, ENT_QUOTES );
	return yourls_apply_filters( 'esc_attr', $safe_text, $text );
}

/**
 * Checks and cleans a URL before printing it. Stolen from WP.
 *
 * A number of characters are removed from the URL. If the URL is for displaying
 * (the default behaviour) ampersands are also replaced.
 *
 * @since 1.6
 *
 * @param string $url The URL to be cleaned.
 * @param string $context 'display' or something else. Use yourls_sanitize_url() for database or redirection usage.
 * @param array $protocols Optional. Array of allowed protocols, defaults to global $yourls_allowedprotocols
 * @return string The cleaned $url
 */
function yourls_esc_url( $url, $context = 'display', $protocols = array() ) {
	// make sure there's only one 'http://' at the beginning (prevents pasting a URL right after the default 'http://')
	$url = str_replace( 
		array( 'http://http://', 'http://https://' ),
		array( 'http://',        'https://'        ),
		$url
	);

	if ( '' == $url )
		return $url;

	// make sure there's a protocol, add http:// if not
	if ( ! yourls_get_protocol( $url ) )
		$url = 'http://'.$url;

	// force scheme and domain to lowercase - see issue 591
	preg_match( '!^([a-zA-Z]+://([^/]+))(.*)$!', $url, $matches );
	if( isset( $matches[1] ) && isset( $matches[3] ) )
		$url = strtolower( $matches[1] ) . $matches[3];

	$original_url = $url;

	$url = preg_replace( '|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url );
	// Previous regexp in YOURLS was '|[^a-z0-9-~+_.?\[\]\^#=!&;,/:%@$\|*`\'<>"()\\x80-\\xff\{\}]|i'
	// TODO: check if that was it too destructive
	$strip = array( '%0d', '%0a', '%0D', '%0A' );
	$url = yourls_deep_replace( $strip, $url );
	$url = str_replace( ';//', '://', $url );

	// Replace ampersands and single quotes only when displaying.
	if ( 'display' == $context ) {
		$url = yourls_kses_normalize_entities( $url );
		$url = str_replace( '&amp;', '&#038;', $url );
		$url = str_replace( "'", '&#039;', $url );
	}
	
	if ( ! is_array( $protocols ) or ! $protocols ) {
		global $yourls_allowedprotocols;
		$protocols = yourls_apply_filter( 'esc_url_protocols', $yourls_allowedprotocols );
		// Note: $yourls_allowedprotocols is also globally filterable in functions-kses.php/yourls_kses_init()
	}

	if ( !yourls_is_allowed_protocol( $url, $protocols ) )
		return '';
	
	// I didn't use KSES function kses_bad_protocol() because it doesn't work the way I liked (returns //blah from illegal://blah)

	$url = substr( $url, 0, 1999 );
	
	return yourls_apply_filter( 'esc_url', $url, $original_url, $context );
}

/**
 * Escape single quotes, htmlspecialchar " < > &, and fix line endings. Stolen from WP.
 *
 * Escapes text strings for echoing in JS. It is intended to be used for inline JS
 * (in a tag attribute, for example onclick="..."). Note that the strings have to
 * be in single quotes. The filter 'js_escape' is also applied here.
 *
 * @since 1.6
 *
 * @param string $text The text to be escaped.
 * @return string Escaped text.
 */
function yourls_esc_js( $text ) {
	$safe_text = yourls_check_invalid_utf8( $text );
	$safe_text = yourls_specialchars( $safe_text, ENT_COMPAT );
	$safe_text = preg_replace( '/&#(x)?0*(?(1)27|39);?/i', "'", stripslashes( $safe_text ) );
	$safe_text = str_replace( "\r", '', $safe_text );
	$safe_text = str_replace( "\n", '\\n', addslashes( $safe_text ) );
	return yourls_apply_filters( 'esc_js', $safe_text, $text );
}

/**
 * Escaping for textarea values. Stolen from WP.
 *
 * @since 1.6
 *
 * @param string $text
 * @return string
 */
function yourls_esc_textarea( $text ) {
	$safe_text = htmlspecialchars( $text, ENT_QUOTES );
	return yourls_apply_filters( 'esc_textarea', $safe_text, $text );
}


/**
* PHP emulation of JS's encodeURI
*
* @link https://developer.mozilla.org/en/JavaScript/Reference/Global_Objects/encodeURI
* @param $url
* @return string
*/
function yourls_encodeURI( $url ) {
    return strtr( rawurlencode( $url ), array (
        '%3B' => ';', '%2C' => ',', '%2F' => '/', '%3F' => '?', '%3A' => ':', '%40' => '@',
		'%26' => '&', '%3D' => '=', '%2B' => '+', '%24' => '$', '%21' => '!', '%2A' => '*',
		'%27' => '\'', '%28' => '(', '%29' => ')', '%23' => '#',
    ) );
}

/**
 * Adds backslashes before letters and before a number at the start of a string. Stolen from WP.
 *
 * @since 1.6
 *
 * @param string $string Value to which backslashes will be added.
 * @return string String with backslashes inserted.
 */
function yourls_backslashit($string) {
    $string = preg_replace('/^([0-9])/', '\\\\\\\\\1', $string);
    $string = preg_replace('/([a-z])/i', '\\\\\1', $string);
    return $string;
}

