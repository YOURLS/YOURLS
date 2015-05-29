<?php
/**
 * Deprecated functions from past YOURLS versions. Don't use them, as they may be
 * removed in a later version. Use the newer alternatives instead.
 *
 * Note to devs: when deprecating a function, move it here. Then check all the places
 * in core that might be using it, including core plugins.
 */

/**
 * Return word or words if more than one
 *
 */
function yourls_plural( $word, $count=1 ) {
	yourls_deprecated_function( __FUNCTION__, '1.6', 'yourls_n' );
	return $word . ($count > 1 ? 's' : '');
}

/**
 * Return list of all shorturls associated to the same long URL. Returns NULL or array of keywords.
 *
 */
function yourls_get_duplicate_keywords( $longurl ) {
	yourls_deprecated_function( __FUNCTION__, '1.7', 'yourls_get_longurl_keywords' );
	if( !yourls_allow_duplicate_longurls() )
		return NULL;
	return yourls_apply_filter( 'get_duplicate_keywords', yourls_get_longurl_keywords ( $longurl ), $longurl );
}

/**
 * Make sure a integer is safe
 * 
 * Note: this function is dumb and dumbly named since it does not intval(). DO NOT USE.
 *
 */
function yourls_intval( $in ) {
	yourls_deprecated_function( __FUNCTION__, '1.7', 'yourls_sanitize_int' );
	return yourls_escape( $in );
}

/**
 * Get remote content via a GET request using best transport available
 *
 */
function yourls_get_remote_content( $url,  $maxlen = 4096, $timeout = 5 ) {
	yourls_deprecated_function( __FUNCTION__, '1.7', 'yourls_http_get_body' );
	return yourls_http_get_body( $url );
}

/**
 * Alias for yourls_apply_filter because I never remember if it's _filter or _filters
 *
 * At first I thought it made semantically more sense but thinking about it, I was wrong. It's one filter.
 * There may be several function hooked into it, but it still the same one filter.
 *
 * @since 1.6
 * @deprecated 1.7.1
 *
 * @param string $hook the name of the YOURLS element or action
 * @param mixed $value the value of the element before filtering
 * @return mixed
 */
function yourls_apply_filters( $hook, $value = '' ) {
	yourls_deprecated_function( __FUNCTION__, '1.7.1', 'yourls_apply_filter' );
	return yourls_apply_filter( $hook, $value );
}

/**
 * Check if we'll need interface display function (ie not API or redirection)
 *
 */
function yourls_has_interface() {
	yourls_deprecated_function( __FUNCTION__, '1.7.1' );
	if( yourls_is_API() or yourls_is_GO() )
		return false;
	return true;
}

/**
 * Check if a proxy is defined for HTTP requests
 *
 * @uses YOURLS_PROXY
 * @since 1.7
 * @deprecated 1.7.1
 * @return bool true if a proxy is defined, false otherwise
 */
function yourls_http_proxy_is_defined() {
	yourls_deprecated_function( __FUNCTION__, '1.7.1', 'yourls_http_get_proxy' );
	return yourls_apply_filter( 'http_proxy_is_defined', defined( 'YOURLS_PROXY' ) );
}

/**
 * Displays translated string with gettext context
 *
 * This function has been renamed yourls_xe() for consistency with other *e() functions
 *
 * @see yourls_x()
 * @since 1.6
 * @deprecated 1.7.1
 *
 * @param string $text Text to translate
 * @param string $context Context information for the translators
 * @param string $domain Optional. Domain to retrieve the translated text
 * @return string Translated context string without pipe
 */
function yourls_ex( $text, $context, $domain = 'default' ) {
	yourls_deprecated_function( __FUNCTION__, '1.7.1', 'yourls_xe' );
	echo yourls_xe( $text, $context, $domain );
}

