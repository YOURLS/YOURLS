<?php
/**
 * Deprecated functions from past YOURLS versions. Don't use them, as they may be
 * removed in a later version. Use the newer alternatives instead.
 *
 * Note to devs: when deprecating a function, move it here. Then check all the places
 * in core that might be using it, including core plugins.
 *
 * Usage :  yourls_deprecated_function( 'function_name', 'version', 'replacement' );
 * Output:  "{function_name} is deprecated since version {version}! Use {replacement} instead."
 *
 * Usage :  yourls_deprecated_function( 'function_name', 'version' );
 * Output:  "{function_name} is deprecated since version {version} with no alternative available."
 *
 * @see yourls_deprecated_function()
 */

// @codeCoverageIgnoreStart

/**
 * Plugin activation sandbox
 *
 * @since 1.8.3
 * @deprecated 1.9.2
 * @param string $pluginfile Plugin filename (full path)
 * @return string|true  string if error or true if success
 */
function yourls_activate_plugin_sandbox( $pluginfile ) {
    yourls_deprecated_function( __FUNCTION__, '1.9.1', 'yourls_include_file_sandbox');
    return yourls_include_file_sandbox($pluginfile);
}

/**
 * Return current admin page, or null if not an admin page. Was not used anywhere.
 *
 * @return mixed string if admin page, null if not an admin page
 * @since 1.6
 * @deprecated 1.9.1
 */
function yourls_current_admin_page() {
    yourls_deprecated_function( __FUNCTION__, '1.9.1' );
    if( yourls_is_admin() ) {
        $current = substr( yourls_get_request(), 6 );
        if( $current === false )
            $current = 'index.php'; // if current page is http://sho.rt/admin/ instead of http://sho.rt/admin/index.php

        return $current;
    }
    return null;
}

/**
 * PHP emulation of JS's encodeURI
 *
 * @link https://developer.mozilla.org/en/JavaScript/Reference/Global_Objects/encodeURI
 * @deprecated 1.9.1
 * @param string $url
 * @return string
 */
function yourls_encodeURI($url) {
    yourls_deprecated_function( __FUNCTION__, '1.9.1', '' );
    // Decode URL all the way
    $result = yourls_rawurldecode_while_encoded( $url );
    // Encode once
    $result = strtr( rawurlencode( $result ), array (
        '%3B' => ';', '%2C' => ',', '%2F' => '/', '%3F' => '?', '%3A' => ':', '%40' => '@',
        '%26' => '&', '%3D' => '=', '%2B' => '+', '%24' => '$', '%21' => '!', '%2A' => '*',
        '%27' => '\'', '%28' => '(', '%29' => ')', '%23' => '#',
    ) );
    // @TODO:
    // Known limit: this will most likely break IDN URLs such as http://www.académie-française.fr/
    // To fully support IDN URLs, advocate use of a plugin.
    return yourls_apply_filter( 'encodeURI', $result, $url );
}

/**
 * Check if a file is a plugin file
 *
 * @deprecated 1.8.3
 */
function yourls_validate_plugin_file( $file ) {
    yourls_deprecated_function( __FUNCTION__, '1.8.3', 'yourls_is_a_plugin_file' );
    return yourls_is_a_plugin_file($file);
}

/**
 * Return a unique(ish) hash for a string to be used as a valid HTML id
 *
 * @deprecated 1.8.3
 */
function yourls_string2htmlid( $string ) {
    yourls_deprecated_function( __FUNCTION__, '1.8.3', 'yourls_unique_element_id' );
    return yourls_apply_filter( 'string2htmlid', 'y'.abs( crc32( $string ) ) );
}

/**
 * Get search text from query string variables search_protocol, search_slashes and search
 *
 * Some servers don't like query strings containing "(ht|f)tp(s)://". A javascript bit
 * explodes the search text into protocol, slashes and the rest (see JS function
 * split_search_text_before_search()) and this function glues pieces back together
 * See issue https://github.com/YOURLS/YOURLS/issues/1576
 *
 * @since 1.7
 * @deprecated 1.8.2
 * @return string Search string
 */
function yourls_get_search_text() {
    yourls_deprecated_function( __FUNCTION__, '1.8.2', 'YOURLS\Views\AdminParams::get_search' );
    $view_params = new YOURLS\Views\AdminParams();
    return $view_params->get_search();
}

/**
 * Retrieve the current time based on specified type. Stolen from WP.
 *
 * The 'mysql' type will return the time in the format for MySQL DATETIME field.
 * The 'timestamp' type will return the current timestamp.
 *
 * If $gmt is set to either '1' or 'true', then both types will use GMT time.
 * if $gmt is false, the output is adjusted with the GMT offset in the WordPress option.
 *
 * @since 1.6
 * @deprecated 1.7.10
 *
 * @param string $type Either 'mysql' or 'timestamp'.
 * @param int|bool $gmt Optional. Whether to use GMT timezone. Default is false.
 * @return int|string String if $type is 'gmt', int if $type is 'timestamp'.
 */
function yourls_current_time( $type, $gmt = 0 ) {
    yourls_deprecated_function( __FUNCTION__, '1.7.10', 'yourls_get_timestamp' );
    switch ( $type ) {
        case 'mysql':
            return ( $gmt ) ? gmdate( 'Y-m-d H:i:s' ) : gmdate( 'Y-m-d H:i:s', yourls_get_timestamp( time() ));
        case 'timestamp':
            return ( $gmt ) ? time() : yourls_get_timestamp( time() );
    }
}

/**
 * Lowercase scheme and domain of an URI - see issues 591, 1630, 1889
 *
 * Renamed to yourls_normalize_uri() in 1.7.10 because the function now does more than just
 * lowercasing the scheme and domain.
 *
 * @deprecated 1.7.10
 *
 */
function yourls_lowercase_scheme_domain( $url ) {
    yourls_deprecated_function( __FUNCTION__, '1.7.10', 'yourls_normalize_uri' );
    return yourls_normalize_uri( $url );
}

/**
 * The original string sanitize function
 *
 * @deprecated 1.7.10
 *
 */
function yourls_sanitize_string( $string, $restrict_to_shorturl_charset = false ) {
    yourls_deprecated_function( __FUNCTION__, '1.7.10', 'yourls_sanitize_keyword' );
    return yourls_sanitize_keyword( $string, $restrict_to_shorturl_charset );
}

/**
 * Return favicon URL (either default or custom)
 *
 * @deprecated 1.7.10
 *
 */
function yourls_favicon( $echo = true ) {
    yourls_deprecated_function( __FUNCTION__, '1.7.10', 'yourls_get_yourls_favicon_url' );
    return yourls_get_yourls_favicon_url( $echo );
}

/**
 * Return array of stats for a given keyword
 *
 * @deprecated 1.7.10
 *
 */
function yourls_get_link_stats( $url ) {
    yourls_deprecated_function( __FUNCTION__, '1.7.10', 'yourls_get_keyword_stats' );
    return yourls_get_keyword_stats( $url );
}

/**
 * Check if a long URL already exists in the DB. Return NULL (doesn't exist) or an object with URL informations.
 *
 * @since 1.5.1
 * @deprecated 1.7.10
 *
 */
function yourls_url_exists( $url ) {
    yourls_deprecated_function( __FUNCTION__, '1.7.10', 'yourls_long_url_exists' );
    return yourls_long_url_exists( $url );
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
function yourls_intval( $int ) {
    yourls_deprecated_function( __FUNCTION__, '1.7', 'yourls_sanitize_int' );
    return yourls_escape( $int );
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

/**
 * Escape a string or an array of strings before DB usage. ALWAYS escape before using in a SQL query. Thanks.
 *
 * Deprecated in 1.7.3 because we moved onto using PDO and using built-in escaping functions, instead of
 * rolling our own.
 *
 * @deprecated 1.7.3
 * @param string|array $data string or array of strings to be escaped
 * @return string|array escaped data
 */
function yourls_escape( $data ) {
    yourls_deprecated_function( __FUNCTION__, '1.7.3', 'PDO' );
    if( is_array( $data ) ) {
        foreach( $data as $k => $v ) {
            if( is_array( $v ) ) {
                $data[ $k ] = yourls_escape( $v );
            } else {
                $data[ $k ] = yourls_escape_real( $v );
            }
        }
    } else {
        $data = yourls_escape_real( $data );
    }

    return $data;
}

/**
 * "Real" escape. This function should NOT be called directly. Use yourls_escape() instead.
 *
 * This function uses a "real" escape if possible, using PDO, MySQL or MySQLi functions,
 * with a fallback to a "simple" addslashes
 * If you're implementing a custom DB engine or a custom cache system, you can define an
 * escape function using filter 'custom_escape_real'
 *
 * @since 1.7
 * @deprecated 1.7.3
 * @param string $a string to be escaped
 * @return string escaped string
 */
function yourls_escape_real( $string ) {
    yourls_deprecated_function( __FUNCTION__, '1.7.3', 'PDO' );
    global $ydb;
    if( isset( $ydb ) && ( $ydb instanceof \YOURLS\Database\YDB ) )
        return $ydb->escape( $string );

    // YOURLS DB classes have been bypassed by a custom DB engine or a custom cache layer
    return yourls_apply_filter( 'custom_escape_real', addslashes( $string ), $string );
}

// @codeCoverageIgnoreEnd
