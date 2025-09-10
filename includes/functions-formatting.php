<?php
/*
 * YOURLS
 * Function library for anything related to formatting / validating / sanitizing
 */

/**
 * Convert an integer (1337) to a string (3jk).
 *
 * @param int $num       Number to convert
 * @param string $chars  Characters to use for conversion
 * @return string        Converted number
 */
function yourls_int2string($num, $chars = null) {
	if( $chars == null )
		$chars = yourls_get_shorturl_charset();
	$string = '';
	$len = strlen( $chars );
	while( $num >= $len ) {
		$mod = bcmod( (string)$num, (string)$len );
		$num = bcdiv( (string)$num, (string)$len );
		$string = $chars[ $mod ] . $string;
	}
	$string = $chars[ intval( $num ) ] . $string;

	return yourls_apply_filter( 'int2string', $string, $num, $chars );
}

/**
 * Convert a string (3jk) to an integer (1337)
 *
 * @param string $string  String to convert
 * @param string $chars   Characters to use for conversion
 * @return string         Number (as a string)
 */
function yourls_string2int($string, $chars = null) {
	if( $chars == null )
		$chars = yourls_get_shorturl_charset();
	$integer = 0;
	$string = strrev( $string  );
	$baselen = strlen( $chars );
	$inputlen = strlen( $string );
	for ($i = 0; $i < $inputlen; $i++) {
		$index = strpos( $chars, $string[$i] );
		$integer = bcadd( (string)$integer, bcmul( (string)$index, bcpow( (string)$baselen, (string)$i ) ) );
	}

	return yourls_apply_filter( 'string2int', $integer, $string, $chars );
}

/**
 * Return a unique string to be used as a valid HTML id
 *
 * @since   1.8.3
 * @param  string $prefix      Optional prefix
 * @param  int    $initial_val The initial counter value (defaults to one)
 * @return string              The unique string
 */
function yourls_unique_element_id($prefix = 'yid', $initial_val = 1) {
    static $id_counter = 1;
	if ($initial_val > 1) {
		$id_counter = (int) $initial_val;
	}
	return yourls_apply_filter( 'unique_element_id', $prefix . (string) $id_counter++ );
}

/**
 * Make sure a link keyword (ie "1fv" as in "http://sho.rt/1fv") is acceptable
 *
 * If we are ADDING or EDITING a short URL, the keyword must comply to the short URL charset: every
 * character that doesn't belong to it will be removed.
 * But otherwise we must have a more conservative approach: we could be checking for a keyword that
 * was once valid but now the short URL charset has changed. In such a case, we are treating the keyword for what
 * it is: just a part of a URL, hence sanitize it as a URL.
 *
 * @param  string $keyword                        short URL keyword
 * @param  bool   $restrict_to_shorturl_charset   Optional, default false. True if we want the keyword to comply to short URL charset
 * @return string                                 The sanitized keyword
 */
function yourls_sanitize_keyword( $keyword, $restrict_to_shorturl_charset = false ) {
    if( $restrict_to_shorturl_charset === true ) {
        // make a regexp pattern with the shorturl charset, and remove everything but this
        $pattern = yourls_make_regexp_pattern( yourls_get_shorturl_charset() );
        $valid = (string) substr( preg_replace( '![^'.$pattern.']!', '', $keyword ), 0, 199 );
    } else {
        $valid = yourls_sanitize_url( $keyword );
    }

	return yourls_apply_filter( 'sanitize_string', $valid, $keyword, $restrict_to_shorturl_charset );
}

/**
 * Sanitize a page title. No HTML per W3C http://www.w3.org/TR/html401/struct/global.html#h-7.4.2
 *
 *
 * @since 1.5
 * @param string $unsafe_title  Title, potentially unsafe
 * @param string $fallback      Optional fallback if after sanitization nothing remains
 * @return string               Safe title
 */
function yourls_sanitize_title( $unsafe_title, $fallback = '' ) {
	$title = $unsafe_title;
	$title = strip_tags( $title );
	$title = preg_replace( "/\s+/", ' ', trim( $title ) );

    if ( '' === $title || false === $title ) {
        $title = $fallback;
    }

	return yourls_apply_filter( 'sanitize_title', $title, $unsafe_title, $fallback );
}

/**
 * A few sanity checks on the URL. Used for redirection or DB.
 * For redirection when you don't trust the URL ($_SERVER variable, query string), see yourls_sanitize_url_safe()
 * For display purpose, see yourls_esc_url()
 *
 * @param string $unsafe_url unsafe URL
 * @param array $protocols Optional allowed protocols, default to global $yourls_allowedprotocols
 * @return string Safe URL
 */
function yourls_sanitize_url( $unsafe_url, $protocols = array() ) {
	$url = yourls_esc_url( $unsafe_url, 'redirection', $protocols );
	return yourls_apply_filter( 'sanitize_url', $url, $unsafe_url );
}

/**
 * A few sanity checks on the URL, including CRLF. Used for redirection when URL to be sanitized is critical and cannot be trusted.
 *
 * Use when critical URL comes from user input or environment variable. In such a case, this function will sanitize
 * it like yourls_sanitize_url() but will also remove %0A and %0D to prevent CRLF injection.
 * Still, some legit URLs contain %0A or %0D (see issue 2056, and for extra fun 1694, 1707, 2030, and maybe others)
 * so we're not using this function unless it's used for internal redirection when the target location isn't
 * hardcoded, to avoid XSS via CRLF
 *
 * @since 1.7.2
 * @param string $unsafe_url unsafe URL
 * @param array $protocols Optional allowed protocols, default to global $yourls_allowedprotocols
 * @return string Safe URL
 */
function yourls_sanitize_url_safe( $unsafe_url, $protocols = array() ) {
	$url = yourls_esc_url( $unsafe_url, 'safe', $protocols );
	return yourls_apply_filter( 'sanitize_url_safe', $url, $unsafe_url );
}

/**
 * Perform a replacement while a string is found, eg $subject = '%0%0%0DDD', $search ='%0D' -> $result =''
 *
 * Stolen from WP's _deep_replace
 *
 * @param string|array $search   Needle, or array of needles.
 * @param string       $subject  Haystack.
 * @return string                The string with the replaced values.
 */
function yourls_deep_replace($search, $subject ){
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
 * @param int $int  Integer to check
 * @return string   Integer as a string
 */
function yourls_sanitize_int($int ) {
	return ( substr( preg_replace( '/[^0-9]/', '', strval( $int ) ), 0, 20 ) );
}

/**
 * Sanitize an IP address
 * No check on validity, just return a sanitized string
 *
 * @param string $ip  IP address
 * @return string     IP address
 */
function yourls_sanitize_ip($ip ) {
	return preg_replace( '/[^0-9a-fA-F:., ]/', '', $ip );
}

/**
 * Make sure a date is m(m)/d(d)/yyyy, return false otherwise
 *
 * @param string $date  Date to check
 * @return false|mixed  Date in format m(m)/d(d)/yyyy or false if invalid
 */
function yourls_sanitize_date($date ) {
	if( !preg_match( '!^\d{1,2}/\d{1,2}/\d{4}$!' , $date ) ) {
		return false;
	}
	return $date;
}

/**
 * Sanitize a date for SQL search. Return false if malformed input.
 *
 * @param string $date   Date
 * @return false|string  String in Y-m-d format for SQL search or false if malformed input
 */
function yourls_sanitize_date_for_sql($date) {
	if( !yourls_sanitize_date( $date ) )
		return false;
	return date( 'Y-m-d', strtotime( $date ) );
}

/**
 * Return trimmed string, optionally append '[...]' if string is too long
 *
 * @param string $string  String to trim
 * @param int $length     Maximum length of string
 * @param string $append  String to append if trimmed
 * @return string         Trimmed string
 */
function yourls_trim_long_string($string, $length = 60, $append = '[...]') {
	$newstring = $string;
    if ( mb_strlen( $newstring ) > $length ) {
        $newstring = mb_substr( $newstring, 0, $length - mb_strlen( $append ), 'UTF-8' ) . $append;
    }
	return yourls_apply_filter( 'trim_long_string', $newstring, $string, $length, $append );
}

/**
 * Sanitize a version number (1.4.1-whatever-RC1 -> 1.4.1)
 *
 * The regexp searches for the first digits, then a period, then more digits and periods, and discards
 * all the rest.
 * Examples:
 * 'omgmysql-5.5-ubuntu-4.20' => '5.5'
 * 'mysql5.5-ubuntu-4.20'     => '5.5'
 * '5.5-ubuntu-4.20'          => '5.5'
 * '5.5-beta2'                => '5.5'
 * '5.5'                      => '5.5'
 *
 * @since 1.4.1
 * @param  string $version  Version number
 * @return string           Sanitized version number
 */
function yourls_sanitize_version( $version ) {
    preg_match( '/([0-9]+\.[0-9.]+).*$/', $version, $matches );
    $version = isset($matches[1]) ? trim($matches[1], '.') : '';

    return $version;
}

/**
 * Sanitize a filename (no Win32 stuff)
 *
 * @param string $file  File name
 * @return string|null  Sanitized file name (or null if it's just backslashes, ok...)
 */
function yourls_sanitize_filename($file) {
	$file = str_replace( '\\', '/', $file ); // sanitize for Win32 installs
	$file = preg_replace( '|/+|' ,'/', $file ); // remove any duplicate slash
	return $file;
}

/**
 * Check if a string seems to be UTF-8. Stolen from WP.
 *
 * @param string $str  String to check
 * @return bool        Whether string seems valid UTF-8
 */
function yourls_seems_utf8($str) {
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
 * Check for PCRE /u modifier support. Stolen from WP.
 *
 * Just in case "PCRE is not compiled with PCRE_UTF8" which seems to happen
 * on some distros
 *
 * @since 1.7.1
 *
 * @return bool whether there's /u support or not
 */
function yourls_supports_pcre_u() {
    static $utf8_pcre;
    if( !isset( $utf8_pcre ) ) {
        $utf8_pcre = (bool) @preg_match( '/^./u', 'a' );
    }
    return $utf8_pcre;
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

	// We can't demand utf8 in the PCRE installation, so just return the string in those cases
	if ( ! yourls_supports_pcre_u() ) {
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

    $translation = $translation_preg = [];

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
	return yourls_apply_filter( 'esc_html', $safe_text, $text );
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
	return yourls_apply_filter( 'esc_attr', $safe_text, $text );
}

/**
 * Checks and cleans a URL before printing it. Stolen from WP.
 *
 * A number of characters are removed from the URL. If the URL is for displaying
 * (the default behaviour) ampersands are also replaced.
 *
 * This function by default "escapes" URL for display purpose (param $context = 'display') but can
 * take extra steps in URL sanitization. See yourls_sanitize_url() and yourls_sanitize_url_safe()
 *
 * @since 1.6
 *
 * @param string $url The URL to be cleaned.
 * @param string $context 'display' or something else. Use yourls_sanitize_url() for database or redirection usage.
 * @param array $protocols Optional. Array of allowed protocols, defaults to global $yourls_allowedprotocols
 * @return string The cleaned $url
 */
function yourls_esc_url( $url, $context = 'display', $protocols = array() ) {
    // trim first -- see #1931
    $url = trim( $url );

	// make sure there's only one 'http://' at the beginning (prevents pasting a URL right after the default 'http://')
	$url = str_replace(
		array( 'http://http://', 'http://https://' ),
		array( 'http://',        'https://'        ),
		$url
	);

	if ( '' == $url )
		return $url;

	$original_url = $url;

	// force scheme and domain to lowercase - see issues 591 and 1630
    $url = yourls_normalize_uri( $url );

	$url = preg_replace( '|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\[\]\\x80-\\xff]|i', '', $url );
	// Previous regexp in YOURLS was '|[^a-z0-9-~+_.?\[\]\^#=!&;,/:%@$\|*`\'<>"()\\x80-\\xff\{\}]|i'
	// TODO: check if that was it too destructive

    // If $context is 'safe', an extra step is taken to make sure no CRLF injection is possible.
    // To be used when $url can be forged by evil user (eg it's from a $_SERVER variable, a query string, etc..)
	if ( 'safe' == $context ) {
        $strip = array( '%0d', '%0a', '%0D', '%0A' );
        $url = yourls_deep_replace( $strip, $url );
    }

	// Replace ampersands and single quotes only when displaying.
	if ( 'display' == $context ) {
		$url = yourls_kses_normalize_entities( $url );
		$url = str_replace( '&amp;', '&#038;', $url );
		$url = str_replace( "'", '&#039;', $url );
	}

    // If there's a protocol, make sure it's OK
    if( yourls_get_protocol($url) !== '' ) {
        if ( ! is_array( $protocols ) or ! $protocols ) {
            global $yourls_allowedprotocols;
            $protocols = yourls_apply_filter( 'esc_url_protocols', $yourls_allowedprotocols );
            // Note: $yourls_allowedprotocols is also globally filterable in functions-kses.php/yourls_kses_init()
        }

        if ( !yourls_is_allowed_protocol( $url, $protocols ) )
            return '';

        // I didn't use KSES function kses_bad_protocol() because it doesn't work the way I liked (returns //blah from illegal://blah)
    }

	return yourls_apply_filter( 'esc_url', $url, $original_url, $context );
}


/**
 * Normalize a URI : lowercase scheme and domain, convert IDN to UTF8
 *
 * All in one example: 'HTTP://XN--mgbuq0c.Com/AbCd' -> 'http://طارق.com/AbCd'
 * See issues 591, 1630, 1889, 2691
 *
 * This function is trickier than what seems to be needed at first
 *
 * First, we need to handle several URI types: http://example.com, mailto:ozh@ozh.ozh, facetime:user@example.com, and so on, see
 * yourls_kses_allowed_protocols() in functions-kses.php
 * The general rule is that the scheme ("stuff://" or "stuff:") is case insensitive and should be lowercase. But then, depending on the
 * scheme, parts of what follows the scheme may or may not be case sensitive.
 *
 * Second, simply using parse_url() and its opposite http_build_url() is a pretty unsafe process:
 *  - parse_url() can easily trip up on malformed or weird URLs
 *  - exploding a URL with parse_url(), lowercasing some stuff, and glueing things back with http_build_url() does not handle well
 *    "stuff:"-like URI [1] and can result in URLs ending modified [2][3]. We don't want to *validate* URI, we just want to lowercase
 *    what is supposed to be lowercased.
 *
 * So, to be conservative, this function:
 *  - lowercases the scheme
 *  - does not lowercase anything else on "stuff:" URI
 *  - tries to lowercase only scheme and domain of "stuff://" URI
 *
 * [1] http_build_url(parse_url("mailto:ozh")) == "mailto:///ozh"
 * [2] http_build_url(parse_url("http://blah#omg")) == "http://blah/#omg"
 * [3] http_build_url(parse_url("http://blah?#")) == "http://blah/"
 *
 * @since 1.7.1
 * @param string $url URL
 * @return string URL with lowercase scheme and protocol
 */
function yourls_normalize_uri( $url ) {
    $scheme = yourls_get_protocol( $url );

    if ('' == $scheme) {
        // Scheme not found, malformed URL? Something else? Not sure.
        return $url;
    }

    /**
     * Case 1 : scheme like "stuff:", as opposed to "stuff://"
     * Examples: "mailto:joe@joe.com" or "bitcoin:15p1o8vnWqNkJBJGgwafNgR1GCCd6EGtQR?amount=1&label=Ozh"
     * In this case, we only lowercase the scheme, because depending on it, things after should or should not be lowercased
     */
    if (substr($scheme, -2, 2) != '//') {
        $url = str_replace( $scheme, strtolower( $scheme ), $url );
        return $url;
    }

    /**
     * Case 2 : scheme like "stuff://" (eg "http://example.com/" or "ssh://joe@joe.com")
     * Here we lowercase the scheme and domain parts
     */
    $parts = parse_url($url);

    // Most likely malformed stuff, could not parse : we'll just lowercase the scheme and leave the rest untouched
    if (false == $parts) {
        $url = str_replace( $scheme, strtolower( $scheme ), $url );
        return $url;
    }

    // URL seems parsable, let's do the best we can
    $lower = array();
    $lower['scheme'] = strtolower( $parts['scheme'] );
    if( isset( $parts['host'] ) ) {
        // Convert domain to lowercase, with mb_ to preserve UTF8
        $lower['host'] = mb_strtolower($parts['host']);
        /**
         * Convert IDN domains to their UTF8 form so that طارق.net and xn--mgbuq0c.net
         * are considered the same. Explicitly mention option and variant to avoid notice
         * on PHP 7.2 and 7.3
         */
         $lower['host'] = idn_to_utf8($lower['host'], IDNA_DEFAULT, INTL_IDNA_VARIANT_UTS46);
    }

    $url = http_build_url($url, $lower);

    return $url;
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
	return yourls_apply_filter( 'esc_js', $safe_text, $text );
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
	return yourls_apply_filter( 'esc_textarea', $safe_text, $text );
}

/**
 * Adds backslashes before letters and before a number at the start of a string. Stolen from WP.
 *
 * @since 1.6
 * @param string $string Value to which backslashes will be added.
 * @return string String with backslashes inserted.
 */
function yourls_backslashit($string) {
    $string = preg_replace('/^([0-9])/', '\\\\\\\\\1', (string)$string);
    $string = preg_replace('/([a-z])/i', '\\\\\1', (string)$string);
    return $string;
}

/**
 * Check if a string seems to be urlencoded
 *
 * We use rawurlencode instead of urlencode to avoid messing with '+'
 *
 * @since 1.7
 * @param string $string
 * @return bool
 */
function yourls_is_rawurlencoded( $string ) {
	return rawurldecode( $string ) != $string;
}

/**
 * rawurldecode a string till it's not encoded anymore
 *
 * Deals with multiple encoding (eg "%2521" => "%21" => "!").
 * See https://github.com/YOURLS/YOURLS/issues/1303
 *
 * @since 1.7
 * @param string $string
 * @return string
 */
function yourls_rawurldecode_while_encoded( $string ) {
	$string = rawurldecode( $string );
	if( yourls_is_rawurlencoded( $string ) ) {
		$string = yourls_rawurldecode_while_encoded( $string );
	}
	return $string;
}

/**
 * Converts readable Javascript code into a valid bookmarklet link
 *
 * Uses https://github.com/ozh/bookmarkletgen
 *
 * @since 1.7.1
 * @param  string $code  Javascript code
 * @return string        Bookmarklet link
 */
function yourls_make_bookmarklet( $code ) {
    $book = new \Ozh\Bookmarkletgen\Bookmarkletgen;
    return $book->crunch( $code );
}

/**
 * Return a timestamp, plus or minus the time offset if defined
 *
 * @since 1.7.10
 * @param  string|int $timestamp  a timestamp
 * @return int                    a timestamp, plus or minus offset if defined
 */
function yourls_get_timestamp( $timestamp ) {
    $offset = yourls_get_time_offset();
    $timestamp_offset = (int)$timestamp + ($offset * 3600);

    return yourls_apply_filter( 'get_timestamp', $timestamp_offset, $timestamp, $offset );
}

/**
 * Get time offset, as defined in config, filtered
 *
 * @since 1.7.10
 * @return int       Time offset
 */
function yourls_get_time_offset() {
    $offset = defined('YOURLS_HOURS_OFFSET') ? (int)YOURLS_HOURS_OFFSET : 0;
    return yourls_apply_filter( 'get_time_offset', $offset );
}

/**
 * Return a date() format for a full date + time, filtered
 *
 * @since 1.7.10
 * @param  string $format  Date format string
 * @return string          Date format string
 */
function yourls_get_datetime_format( $format ) {
    return yourls_apply_filter( 'get_datetime_format', (string)$format );
}

/**
 * Return a date() format for date (no time), filtered
 *
 * @since 1.7.10
 * @param  string $format  Date format string
 * @return string          Date format string
 */
function yourls_get_date_format( $format ) {
    return yourls_apply_filter( 'get_date_format', (string)$format );
}

/**
 * Return a date() format for a time (no date), filtered
 *
 * @since 1.7.10
 * @param  string $format  Date format string
 * @return string          Date format string
 */
function yourls_get_time_format( $format ) {
    return yourls_apply_filter( 'get_time_format', (string)$format );
}
