<?php

/**
 * json_encode for PHP prior to 5.2
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
 * @param $array The array to convert.
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
 * Compat http_build_query for PHP4
 *
 */
if ( !function_exists( 'http_build_query' ) ) {
	function http_build_query( $data, $prefix=null, $sep=null ) {
		return yourls_http_build_query( $data, $prefix, $sep );
	}
}

/**
 * Compat http_build_query for PHP4. Stolen from WP.
 *
 * from php.net (modified by Mark Jaquith to behave like the native PHP5 function)
 * 
 */
function yourls_http_build_query( $data, $prefix=null, $sep=null, $key='', $urlencode=true ) {
	$ret = array();

	foreach ( (array) $data as $k => $v ) {
		if ( $urlencode)
			$k = urlencode( $k );
		if ( is_int($k) && $prefix != null )
			$k = $prefix.$k;
		if ( !empty( $key ) )
			$k = $key . '%5B' . $k . '%5D';
		if ( $v === NULL )
			continue;
		elseif ( $v === FALSE )
			$v = '0';

		if ( is_array( $v ) || is_object( $v ) )
			array_push( $ret,yourls_http_build_query( $v, '', $sep, $k, $urlencode ) );
		elseif ( $urlencode )
			array_push( $ret, $k.'='.urlencode( $v ) );
		else
			array_push( $ret, $k.'='.$v );
	}

	if ( NULL === $sep )
		$sep = ini_get( 'arg_separator.output' );

	return implode( $sep, $ret );
}

/**
 * htmlspecialchars_decode for PHP < 5.1
 *
 */
if ( !function_exists( 'htmlspecialchars_decode' ) ) {
	function htmlspecialchars_decode( $text ) {
		return strtr( $text, array_flip( get_html_translation_table( HTML_SPECIALCHARS ) ) );
	}
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
 * Replacement for property_exists() (5.1+)
 *
 */
if ( !function_exists( 'property_exists' ) ) {
	function property_exists( $class, $property ) {
		if ( is_object( $class ) ) {
			$vars = get_object_vars( $class );
		} else {
			$vars = get_class_vars( $class );
		}
		return array_key_exists( $property, $vars );
	}
}
