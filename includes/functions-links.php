<?php
/*
 * Functions relative to how YOURLS handle some links
 *
 */

/**
 * Add a query var to a URL and return URL. Completely stolen from WP.
 *
 * Works with one of these parameter patterns:
 *     array( 'var' => 'value' )
 *     array( 'var' => 'value' ), $url
 *     'var', 'value'
 *     'var', 'value', $url
 * If $url omitted, uses $_SERVER['REQUEST_URI']
 *
 * The result of this function call is a URL : it should be escaped before being printed as HTML
 *
 * @since 1.5
 * @param string|array $param1 Either newkey or an associative_array.
 * @param string       $param2 Either newvalue or oldquery or URI.
 * @param string       $param3 Optional. Old query or URI.
 * @return string New URL query string.
 */
function yourls_add_query_arg() {
    $ret = '';
    if ( is_array( func_get_arg(0) ) ) {
        if ( @func_num_args() < 2 || false === @func_get_arg( 1 ) )
            $uri = $_SERVER['REQUEST_URI'];
        else
            $uri = @func_get_arg( 1 );
    } else {
        if ( @func_num_args() < 3 || false === @func_get_arg( 2 ) )
            $uri = $_SERVER['REQUEST_URI'];
        else
            $uri = @func_get_arg( 2 );
    }

    $uri = str_replace( '&amp;', '&', $uri );


    if ( $frag = strstr( $uri, '#' ) )
        $uri = substr( $uri, 0, -strlen( $frag ) );
    else
        $frag = '';

    if ( preg_match( '|^https?://|i', $uri, $matches ) ) {
        $protocol = $matches[0];
        $uri = substr( $uri, strlen( $protocol ) );
    } else {
        $protocol = '';
    }

    if ( strpos( $uri, '?' ) !== false ) {
        $parts = explode( '?', $uri, 2 );
        if ( 1 == count( $parts ) ) {
            $base = '?';
            $query = $parts[0];
        } else {
            $base = $parts[0] . '?';
            $query = $parts[1];
        }
    } elseif ( !empty( $protocol ) || strpos( $uri, '=' ) === false ) {
        $base = $uri . '?';
        $query = '';
    } else {
        $base = '';
        $query = $uri;
    }

    parse_str( $query, $qs );
    $qs = yourls_urlencode_deep( $qs ); // this re-URL-encodes things that were already in the query string
    if ( is_array( func_get_arg( 0 ) ) ) {
        $kayvees = func_get_arg( 0 );
        $qs = array_merge( $qs, $kayvees );
    } else {
        $qs[func_get_arg( 0 )] = func_get_arg( 1 );
    }

    foreach ( (array) $qs as $k => $v ) {
        if ( $v === false )
            unset( $qs[$k] );
    }

    $ret = http_build_query( $qs );
    $ret = trim( $ret, '?' );
    $ret = preg_replace( '#=(&|$)#', '$1', $ret );
    $ret = $protocol . $base . $ret . $frag;
    $ret = rtrim( $ret, '?' );
    return $ret;
}

/**
 * Navigates through an array and encodes the values to be used in a URL. Stolen from WP, used in yourls_add_query_arg()
 *
 * @param array|string $value The array or string to be encoded.
 * @return array|string
 */
function yourls_urlencode_deep( $value ) {
    $value = is_array( $value ) ? array_map( 'yourls_urlencode_deep', $value ) : urlencode( $value );
    return $value;
}

/**
 * Remove arg from query. Opposite of yourls_add_query_arg. Stolen from WP.
 *
 * The result of this function call is a URL : it should be escaped before being printed as HTML
 *
 * @since 1.5
 * @param string|array $key   Query key or keys to remove.
 * @param bool|string  $query Optional. When false uses the $_SERVER value. Default false.
 * @return string New URL query string.
 */
function yourls_remove_query_arg( $key, $query = false ) {
    if ( is_array( $key ) ) { // removing multiple keys
        foreach ( $key as $k )
            $query = yourls_add_query_arg( $k, false, $query );
        return $query;
    }
    return yourls_add_query_arg( $key, false, $query );
}

/**
 * Converts keyword into short link (prepend with YOURLS base URL) or stat link (sho.rt/abc+)
 *
 * This function does not check for a valid keyword.
 * The resulting link is normalized to allow for IDN translation to UTF8
 *
 * @param  string $keyword  Short URL keyword
 * @param  bool   $stats    Optional, true to return a stat link (eg sho.rt/abc+)
 * @return string           Short URL, or keyword stat URL
 */
function yourls_link( $keyword = '', $stats = false ) {
    $keyword = yourls_sanitize_keyword($keyword);
    if( $stats  === true ) {
        $keyword = $keyword . '+';
    }
    $link    = yourls_normalize_uri( yourls_get_yourls_site() . '/' . $keyword );

    if( yourls_is_ssl() ) {
        $link = yourls_set_url_scheme( $link, 'https' );
    }

    return yourls_apply_filter( 'yourls_link', $link, $keyword );
}

/**
 * Converts keyword into stat link (prepend with YOURLS base URL, append +)
 *
 * This function does not make sure the keyword matches an actual short URL
 *
 * @param  string $keyword  Short URL keyword
 * @return string           Short URL stat link
 */
function yourls_statlink( $keyword = '' ) {
    $link = yourls_link( $keyword, true );
    return yourls_apply_filter( 'yourls_statlink', $link, $keyword );
}

/**
 * Return admin link, with SSL preference if applicable.
 *
 * @param string $page  Page name, eg "index.php"
 * @return string
 */
function yourls_admin_url( $page = '' ) {
    $admin = yourls_get_yourls_site() . '/admin/' . $page;
    if( yourls_is_ssl() or yourls_needs_ssl() ) {
        $admin = yourls_set_url_scheme( $admin, 'https' );
    }
    return yourls_apply_filter( 'admin_url', $admin, $page );
}

/**
 * Return YOURLS_SITE or URL under YOURLS setup, with SSL preference
 *
 * @param bool $echo   Echo if true, or return if false
 * @param string $url
 * @return string
 */
function yourls_site_url($echo = true, $url = '' ) {
    $url = yourls_get_relative_url( $url );
    $url = trim( yourls_get_yourls_site() . '/' . $url, '/' );

    // Do not enforce (checking yourls_need_ssl() ) but check current usage so it won't force SSL on non-admin pages
    if( yourls_is_ssl() ) {
        $url = yourls_set_url_scheme( $url, 'https' );
    }
    $url = yourls_apply_filter( 'site_url', $url );
    if( $echo ) {
        echo $url;
    }
    return $url;
}

/**
 *  Get YOURLS_SITE value, trimmed and filtered
 *
 *  In addition of being filtered for plugins to hack this, this function is mostly here
 *  to help people entering "sho.rt/" instead of "sho.rt" in their config
 *
 *  @since 1.7.7
 *  @return string  YOURLS_SITE, trimmed and filtered
 */
function yourls_get_yourls_site() {
    return yourls_apply_filter('get_yourls_site', trim(YOURLS_SITE, '/'));
}

/**
 * Change protocol of a URL to HTTPS if we are currently on HTTPS
 *
 * This function is used to avoid insert 'http://' images or scripts in a page when it's served through HTTPS,
 * to avoid "mixed content" errors.
 * So:
 *   - if you are on http://sho.rt/, 'http://something' and 'https://something' are left untouched.
 *   - if you are on https:/sho.rt/, 'http://something' is changed to 'https://something'
 *
 * So, arguably, this function is poorly named. It should be something like yourls_match_current_protocol_if_we_re_on_https
 *
 * @since 1.5.1
 * @param string $url        a URL
 * @param string $normal     Optional, the standard scheme (defaults to 'http://')
 * @param string $ssl        Optional, the SSL scheme (defaults to 'https://')
 * @return string            the modified URL, if applicable
 */
function yourls_match_current_protocol( $url, $normal = 'http://', $ssl = 'https://' ) {
    // we're only doing something if we're currently serving through SSL and the input URL begins with 'http://' or 'https://'
    if( yourls_is_ssl() && in_array( yourls_get_protocol($url), array('http://', 'https://') ) ) {
        $url = str_replace( $normal, $ssl, $url );
    }

    return yourls_apply_filter( 'match_current_protocol', $url );
}

/**
 * Auto detect custom favicon in /user directory, fallback to YOURLS favicon, and echo/return its URL
 *
 * This function supersedes function yourls_favicon(), deprecated in 1.7.10, with a better naming.
 *
 * @since 1.7.10
 * @param  bool $echo   true to echo, false to silently return
 * @return string       favicon URL
 *
 */
function yourls_get_yourls_favicon_url( $echo = true ) {
    static $favicon = null;

    if( $favicon !== null ) {
        if( $echo ) {
            echo $favicon;
        }
        return $favicon;
    }

    $custom = null;
    // search for favicon.(gif|ico|png|jpg|svg)
    foreach( array( 'gif', 'ico', 'png', 'jpg', 'svg' ) as $ext ) {
        if( file_exists( YOURLS_USERDIR. '/favicon.' . $ext ) ) {
            $custom = 'favicon.' . $ext;
            break;
        }
    }

    if( $custom ) {
        $favicon = yourls_site_url( false, YOURLS_USERURL . '/' . $custom );
    } else {
        $favicon = yourls_site_url( false ) . '/images/favicon.svg';
    }

    $favicon = yourls_apply_filter('get_favicon_url', $favicon);

    if( $echo ) {
        echo $favicon;
    }
    return $favicon;
}
