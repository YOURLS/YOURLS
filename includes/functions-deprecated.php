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
 * Check if we'll need interface display function (ie not API or redirection)
 *
 */
function yourls_has_interface() {
	yourls_deprecated_function( __FUNCTION__, '1.7' );
	if( yourls_is_API() or yourls_is_GO() )
		return false;
	return true;
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
