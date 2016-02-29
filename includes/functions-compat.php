<?php
/*
 * YOURLS
 * Compatibility functions when either missing from older PHP versions or not included by default
 */

/**
 * @codeCoverageIgnore
 */
 
/**
 * json_encode for PHP, should someone run a distro without php-json -- see http://askubuntu.com/questions/361424/
 *
 */
if( !function_exists( 'json_encode' ) ) {
	function json_encode( $array ) {
		return yourls_array_to_json( $array );
	}
}

/**
 * Converts an associative array of arbitrary depth and dimension into JSON representation. Used for compatibility with older PHP builds.
 *
 * @param array $array the array to convert.
 * @return mixed The resulting JSON string, or false if the argument was not an array.
 * @author Andy Rusterholz
 * @link http://php.net/json_encode (see comments)
 */
function yourls_array_to_json( $array ){

	if( !is_array( $array ) ){
		return false;
	}

	$associative = count( array_diff( array_keys($array), array_keys( array_keys( $array )) ));
	if( $associative ){

		$construct = array();
		foreach( $array as $key => $value ){

			// We first copy each key/value pair into a staging array,
			// formatting each key and value properly as we go.

			// Format the key:
			if( is_numeric( $key ) ){
				$key = "key_$key";
			}
			$key = '"'.addslashes( $key ).'"';

			// Format the value:
			if( is_array( $value )){
				$value = yourls_array_to_json( $value );
			} else if( !is_numeric( $value ) || is_string( $value ) ){
				$value = '"'.addslashes( $value ).'"';
			}

			// Add to staging array:
			$construct[] = "$key: $value";
		}

		// Then we collapse the staging array into the JSON form:
		$result = "{ " . implode( ", ", $construct ) . " }";

	} else { // If the array is a vector (not associative):

		$construct = array();
		foreach( $array as $value ){

			// Format the value:
			if( is_array( $value )){
				$value = yourls_array_to_json( $value );
			} else if( !is_numeric( $value ) || is_string( $value ) ){
				$value = '"'.addslashes($value).'"';
			}

			// Add to staging array:
			$construct[] = $value;
		}

		// Then we collapse the staging array into the JSON form:
		$result = "[ " . implode( ", ", $construct ) . " ]";
	}

	return $result;
}


/**
 * BC Math functions (assuming if one doesn't exist, none does)
 *
 */
if ( !function_exists( 'bcdiv' ) ) {
	function bcdiv( $dividend, $divisor ) {
		$quotient = floor( $dividend/$divisor );
		return $quotient;
	}
	function bcmod( $dividend, $modulo ) {
		$remainder = $dividend%$modulo;
		return $remainder;
	}
	function bcmul( $left, $right ) {
		return $left * $right;
	}
	function bcadd( $left, $right ) {
		return $left + $right;
	}
	function bcpow( $base, $power ) {
		return pow( $base, $power );
	}
}


/**
 * http_build_url compatibility function
 *
 * @since 1.7.1
 */
if ( !function_exists( 'http_build_url' ) ) {
    include YOURLS_INC . '/http_build_url/http_build_url.php';
}


/**
 * mb_substr compatibility function. Stolen from WP
 *
 * Only understands UTF-8 and 8bit.  All other character sets will be treated as 8bit.
 * For $encoding === UTF-8, the $str input is expected to be a valid UTF-8 byte sequence.
 * The behavior of this function for invalid inputs is undefined.
 *
 * @since 1.7.1
 */
if ( ! function_exists( 'mb_substr' ) ) :
    function mb_substr( $str, $start, $length = null, $encoding = null ) {
        return yourls_mb_substr( $str, $start, $length, $encoding );
    }
endif;
function yourls_mb_substr( $str, $start, $length = null, $encoding = null ) {
    if ( null === $encoding ) {
        $encoding = 'UTF-8';
    }
    // The solution below works only for UTF-8,
    // so in case of a different charset just use built-in substr()
    if ( ! in_array( $encoding, array( 'utf8', 'utf-8', 'UTF8', 'UTF-8' ) ) ) {
        return is_null( $length ) ? substr( $str, $start ) : substr( $str, $start, $length );
    }
    if ( yourls_supports_pcre_u() ) {
        // Use the regex unicode support to separate the UTF-8 characters into an array
        preg_match_all( '/./us', $str, $match );
        $chars = is_null( $length ) ? array_slice( $match[0], $start ) : array_slice( $match[0], $start, $length );
        return implode( '', $chars );
    }
    $regex = '/(
          [\x00-\x7F]                  # single-byte sequences   0xxxxxxx
        | [\xC2-\xDF][\x80-\xBF]       # double-byte sequences   110xxxxx 10xxxxxx
        | \xE0[\xA0-\xBF][\x80-\xBF]   # triple-byte sequences   1110xxxx 10xxxxxx * 2
        | [\xE1-\xEC][\x80-\xBF]{2}
        | \xED[\x80-\x9F][\x80-\xBF]
        | [\xEE-\xEF][\x80-\xBF]{2}
        | \xF0[\x90-\xBF][\x80-\xBF]{2} # four-byte sequences   11110xxx 10xxxxxx * 3
        | [\xF1-\xF3][\x80-\xBF]{3}
        | \xF4[\x80-\x8F][\x80-\xBF]{2}
    )/x';
    $chars = array( '' ); // Start with 1 element instead of 0 since the first thing we do is pop
    do {
        // We had some string left over from the last round, but we counted it in that last round.
        array_pop( $chars );
        // Split by UTF-8 character, limit to 1000 characters (last array element will contain the rest of the string)
        $pieces = preg_split( $regex, $str, 1000, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY );
        $chars = array_merge( $chars, $pieces );
    } while ( count( $pieces ) > 1 && $str = array_pop( $pieces ) ); // If there's anything left over, repeat the loop.
    return join( '', array_slice( $chars, $start, $length ) );
}

/**
 * mb_strlen compatibility function. Stolen from WP
 *
 * Only understands UTF-8 and 8bit.  All other character sets will be treated as 8bit.
 * For $encoding === UTF-8, the $str input is expected to be a valid UTF-8 byte sequence.
 * The behavior of this function for invalid inputs is undefined.
 *
 * @since 1.7.1
 */
if ( ! function_exists( 'mb_strlen' ) ) :
    function mb_strlen( $str, $encoding = null ) {
        return yourls_mb_strlen( $str, $encoding );
    }
endif;
function yourls_mb_strlen( $str, $encoding = null ) {
    if ( null === $encoding ) {
        $encoding = 'UTF-8';
    }
    // The solution below works only for UTF-8,
    // so in case of a different charset just use built-in strlen()
    if ( ! in_array( $encoding, array( 'utf8', 'utf-8', 'UTF8', 'UTF-8' ) ) ) {
        return strlen( $str );
    }
    if ( yourls_supports_pcre_u() ) {
        // Use the regex unicode support to separate the UTF-8 characters into an array
        preg_match_all( '/./us', $str, $match );
        return count( $match[0] );
    }
    $regex = '/(?:
          [\x00-\x7F]                  # single-byte sequences   0xxxxxxx
        | [\xC2-\xDF][\x80-\xBF]       # double-byte sequences   110xxxxx 10xxxxxx
        | \xE0[\xA0-\xBF][\x80-\xBF]   # triple-byte sequences   1110xxxx 10xxxxxx * 2
        | [\xE1-\xEC][\x80-\xBF]{2}
        | \xED[\x80-\x9F][\x80-\xBF]
        | [\xEE-\xEF][\x80-\xBF]{2}
        | \xF0[\x90-\xBF][\x80-\xBF]{2} # four-byte sequences   11110xxx 10xxxxxx * 3
        | [\xF1-\xF3][\x80-\xBF]{3}
        | \xF4[\x80-\x8F][\x80-\xBF]{2}
    )/x';
    $count = 1; // Start at 1 instead of 0 since the first thing we do is decrement
    do {
        // We had some string left over from the last round, but we counted it in that last round.
        $count--;
        // Split by UTF-8 character, limit to 1000 characters (last array element will contain the rest of the string)
        $pieces = preg_split( $regex, $str, 1000 );
        // Increment
        $count += count( $pieces );
    } while ( $str = array_pop( $pieces ) ); // If there's anything left over, repeat the loop.
    // Fencepost: preg_split() always returns one extra item in the array
    return --$count;
}
