<?php

/**
 * Functions that relate to HTTP requests
 *
 * On functions using the 3rd party library Requests:
 * Their goal here is to provide convenient wrapper functions to the Requests library. There are
 * 2 types of functions for each METHOD, where METHOD is 'get' or 'post' (implement more as needed)
 *     - yourls_http_METHOD() :
 *         Return a complete Response object (with ->body, ->headers, ->status_code, etc...) or
 *         a simple string (error message)
 *     - yourls_http_METHOD_body() :
 *         Return a string (response body) or null if there was an error
 *
 * @since 1.7
 */

use WpOrg\Requests\Requests;

/**
 * Perform a GET request, return response object or error string message
 *
 * Notable object properties: body, headers, status_code
 *
 * @since 1.7
 * @see yourls_http_request
 * @param string $url     URL to request
 * @param array $headers  HTTP headers to send
 * @param array $data     GET data
 * @param array $options  Options to pass to Requests
 * @return mixed Response object, or error string
 */
function yourls_http_get( $url, $headers = array(), $data = array(), $options = array() ) {
    return yourls_http_request( 'GET', $url, $headers, $data, $options );
}

/**
 * Perform a GET request, return body or null if there was an error
 *
 * @since 1.7
 * @see yourls_http_request
 * @param string $url     URL to request
 * @param array $headers  HTTP headers to send
 * @param array $data     GET data
 * @param array $options  Options to pass to Requests
 * @return mixed String (page body) or null if error
 */
function yourls_http_get_body( $url, $headers = array(), $data = array(), $options = array() ) {
    $return = yourls_http_get( $url, $headers, $data, $options );
    return isset( $return->body ) ? $return->body : null;
}

/**
 * Perform a POST request, return response object
 *
 * Notable object properties: body, headers, status_code
 *
 * @since 1.7
 * @see yourls_http_request
 * @param string $url     URL to request
 * @param array $headers  HTTP headers to send
 * @param array $data     POST data
 * @param array $options  Options to pass to Requests
 * @return mixed Response object, or error string
 */
function yourls_http_post( $url, $headers = array(), $data = array(), $options = array() ) {
    return yourls_http_request( 'POST', $url, $headers, $data, $options );
}

/**
 * Perform a POST request, return body
 *
 * Wrapper for yourls_http_request()
 *
 * @since 1.7
 * @see yourls_http_request
 * @param string $url     URL to request
 * @param array $headers  HTTP headers to send
 * @param array $data     POST data
 * @param array $options  Options to pass to Requests
 * @return mixed String (page body) or null if error
 */
function yourls_http_post_body( $url, $headers = array(), $data = array(), $options = array() ) {
    $return = yourls_http_post( $url, $headers, $data, $options );
    return isset( $return->body ) ? $return->body : null;
}

/**
 * Get proxy information
 *
 * @since 1.7.1
 * @return mixed false if no proxy is defined, or string like '10.0.0.201:3128' or array like ('10.0.0.201:3128', 'username', 'password')
 */
function yourls_http_get_proxy() {
    $proxy = false;

    if( defined( 'YOURLS_PROXY' ) ) {
        $proxy = YOURLS_PROXY;
        if( defined( 'YOURLS_PROXY_USERNAME' ) && defined( 'YOURLS_PROXY_PASSWORD' ) ) {
            $proxy = array( YOURLS_PROXY, YOURLS_PROXY_USERNAME, YOURLS_PROXY_PASSWORD );
        }
    }

    return yourls_apply_filter( 'http_get_proxy', $proxy );
}

/**
 * Get list of hosts that should bypass the proxy
 *
 * @since 1.7.1
 * @return mixed false if no host defined, or string like "example.com, *.mycorp.com"
 */
function yourls_http_get_proxy_bypass_host() {
    $hosts = defined( 'YOURLS_PROXY_BYPASS_HOSTS' ) ? YOURLS_PROXY_BYPASS_HOSTS : false;

    return yourls_apply_filter( 'http_get_proxy_bypass_host', $hosts );
}

/**
 * Default HTTP requests options for YOURLS
 *
 * For a list of all available options, see function request() in /includes/Requests/Requests.php
 *
 * @since 1.7
 * @return array Options
 */
function yourls_http_default_options() {
    $options = array(
        'timeout'          => yourls_apply_filter( 'http_default_options_timeout', 3 ),
        'useragent'        => yourls_http_user_agent(),
        'follow_redirects' => true,
        'redirects'        => 3,
    );

    if( yourls_http_get_proxy() ) {
        $options['proxy'] = yourls_http_get_proxy();
    }

    return yourls_apply_filter( 'http_default_options', $options );
}

/**
 * Whether URL should be sent through the proxy server.
 *
 * Concept stolen from WordPress. The idea is to allow some URLs, including localhost and the YOURLS install itself,
 * to be requested directly and bypassing any defined proxy.
 *
 * @since 1.7
 * @param string $url URL to check
 * @return bool true to request through proxy, false to request directly
 */
function yourls_send_through_proxy( $url ) {

    // Allow plugins to short-circuit the whole function
    $pre = yourls_apply_filter( 'shunt_send_through_proxy', yourls_shunt_default(), $url );
    if ( yourls_shunt_default() !== $pre ) {
        return $pre;
    }

    $check = @parse_url( $url );

    if( !isset( $check['host'] ) ) {
        return false;
    }

    // Malformed URL, can not process, but this could mean ssl, so let through anyway.
    if ( $check === false )
        return true;

    // Self and loopback URLs are considered local (':' is parse_url() host on '::1')
    $home = parse_url( yourls_get_yourls_site() );
    $local = array( 'localhost', '127.0.0.1', '127.1', '[::1]', ':', $home['host'] );

    if( in_array( $check['host'], $local ) )
        return false;

    $bypass = yourls_http_get_proxy_bypass_host();

    if( $bypass === false OR $bypass === '' ) {
        return true;
    }

    // Build array of hosts to bypass
    static $bypass_hosts;
    static $wildcard_regex = false;
    if ( null == $bypass_hosts ) {
        $bypass_hosts = preg_split( '|\s*,\s*|', $bypass );

        if ( false !== strpos( $bypass, '*' ) ) {
            $wildcard_regex = array();
            foreach ( $bypass_hosts as $host ) {
                $wildcard_regex[] = str_replace( '\*', '.+', preg_quote( $host, '/' ) );
                if ( false !== strpos( $host, '*' ) ) {
                    $wildcard_regex[] = str_replace( '\*\.', '', preg_quote( $host, '/' ) );
                }
            }
            $wildcard_regex = '/^(' . implode( '|', $wildcard_regex ) . ')$/i';
        }
    }

    if ( !empty( $wildcard_regex ) )
        return !preg_match( $wildcard_regex, $check['host'] );
    else
        return !in_array( $check['host'], $bypass_hosts );
}

/**
 * Resolve a host name to a list of IP addresses
 *
 * Returns every A and AAAA record found for $host, or an empty array if the host cannot be
 * resolved. Does not check the addresses in any way, see yourls_host_is_local() for this.
 *
 * @since 1.10.5
 * @param string $host Host name to resolve (no brackets around IPv6 literals)
 * @return array       Array of IP addresses as strings, empty array if resolution failed
 */
function yourls_resolve_host(string $host): array {
    $ips = array();

    /* Both dns_get_record() and gethostbynamel() emit an E_WARNING when a lookup fails, which is
     * an expected outcome here (host longer than 255 chars, or resolver returning SERVFAIL). We silence them with a
     * scoped error handler rather than with '@' that may hide other errors (the try/catch isn't enough
     * because the E_WARNING is not an exception).
     * Note that this does not check the validity of the host name itself, it just tries to resolve it. Invalid hosts
     * like omgilove.slayer will return whatever the resolver returns (SERVFAIL, NXDOMAIN, etc...) and will be
     * considered local by yourls_host_is_local().
     */
    set_error_handler( function() { return true; }, E_WARNING );

    try {
        // dns_get_record() gets us IPv6 too, but it's disabled on some shared hosts
        if( function_exists( 'dns_get_record' ) ) {
            $records = dns_get_record( $host, DNS_A | DNS_AAAA );
            foreach( is_array( $records ) ? $records : array() as $record ) {
                if( isset( $record['ip'] ) ) {
                    $ips[] = $record['ip'];     // A record
                } elseif( isset( $record['ipv6'] ) ) {
                    $ips[] = $record['ipv6'];   // AAAA record
                }
            }
        }

        // Fallback when dns_get_record() is unavailable or came back empty handed. IPv4 only.
        if( !$ips && function_exists( 'gethostbynamel' ) ) {
            $ips = gethostbynamel( $host ) ?: array();  // returns false when host is unknown
        }
    } finally {
        restore_error_handler();
    }

    return yourls_apply_filter( 'resolve_host_ips', $ips, $host );
}

/**
 * Check if an IP address is not a public one (loopback, private, reserved or link-local)
 *
 * Anything that is not a valid IP is considered non-public.
 *
 * @since 1.10.5
 * @param string $ip IP address, v4 or v6
 * @return bool      true if the address is not public, or not an IP at all
 */
function yourls_ip_is_local(string $ip): bool {
    // Not an IP at all: fail closed
    if( filter_var( $ip, FILTER_VALIDATE_IP ) === false ) {
        return true;
    }

    /* An IPv4-mapped IPv6 address ('::ffff:127.0.0.1', ie 10 null bytes, 2 xFF bytes, then the
     * IPv4) is an IPv4 in disguise and is routed as such, so check the IPv4 it wraps instead.
     * PHP only started rejecting these with FILTER_FLAG_NO_RES_RANGE in 8.3: on 8.1 and 8.2,
     * '[::ffff:127.0.0.1]' would otherwise pass for a public address, and so would every other
     * local IPv4 written that way.
     * Same treatment for the deprecated IPv4-compatible form ('::127.0.0.1', 12 null bytes then
     * the IPv4), hence testing the 10 first bytes only. '::' and '::1' match too and unwrap to
     * 0.0.0.0 and 0.0.0.1, both reserved: still non-public, as they should be.
     */
    $packed = inet_pton( $ip );
    if( strlen( $packed ) === 16 && substr( $packed, 0, 10 ) === str_repeat( "\0", 10 ) ) {
        $ip = inet_ntop( substr( $packed, 12 ) );
    }

    // FILTER_FLAG_NO_PRIV_RANGE covers 10/8, 172.16/12, 192.168/16 and fc00::/7
    // FILTER_FLAG_NO_RES_RANGE covers 0/8, 127/8, 169.254/16 (cloud metadata), 240/4, ::, ::1 and fe80::/10
    return filter_var( $ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE ) === false;
}

/**
 * Check if a host points to a non-public address (loopback, private, reserved or link-local)
 *
 * Accepts either a host name or an IP literal. A host name is resolved first, and considered
 * local as soon as one of its addresses is not public. A host that cannot be resolved is
 * considered local too.
 *
 * Known limitation: this does not protect against DNS rebinding (attacker controlling a DNS server
 * with 0s TTL refresh, where evil-url.com could point to 1.2.3.4 (public) and then the next second point
 * to 10.0.0.1 (private). Let's consider this a low risk, and not worth the complexity of a DNS cache with TTL awareness.
 *
 * @since 1.10.5
 * @param string $host Host name or IP address. IPv6 literals can be bracketed or not.
 * @return bool        true if the host is not a public address or cannot be resolved
 */
function yourls_host_is_local(string $host): bool {
    // Allow plugins to short-circuit the whole function
    $pre = yourls_apply_filter( 'shunt_host_is_local', yourls_shunt_default(), $host );
    if ( yourls_shunt_default() !== $pre ) {
        return $pre;
    }

    $host = trim( (string)$host );

    // parse_url() keeps IPv6 hosts bracketed ('[::1]'). Unbracket, otherwise the literal is not
    // recognized as an IP and we needlessly hand it over to the resolver.
    if( strlen( $host ) > 2 && $host[0] === '[' && substr( $host, -1 ) === ']' ) {
        $host = substr( $host, 1, -1 );
    }

    if( $host === '' ) {
        $is_local = true;
    }

    // IP literal: no DNS involved, check it as is
    elseif( filter_var( $host, FILTER_VALIDATE_IP ) !== false ) {
        $is_local = yourls_ip_is_local( $host );
    }

    else {
        $ips = yourls_resolve_host( $host );

        // Unresolvable host: fail closed
        $is_local = empty( $ips );

        foreach( $ips as $ip ) {
            if( yourls_ip_is_local( $ip ) ) {
                $is_local = true;
                break;
            }
        }
    }

    return (bool)yourls_apply_filter( 'host_is_local', $is_local, $host );
}

/**
 * Check if the destination of a remote title fetch must be restricted to public addresses
 *
 * We want to avoid the situation where a public install of YOURLS is used to fetch titles from internal hosts,
 * and potentially leak information about them (SSRF and port scan / service discovery)
 * On a private install, the user is authenticated and (hopefully) trusted.
 *
 * Public install can be: YOURLS_PRIVATE set to false, or having a public interface on top of a regular private
 * install. Checking constant YOURLS_USER covers both cases at once.
 *
 * A one-liner plugin disables the filtering entirely (say, public install on a private network):
 *     // Disable the restriction on remote title fetches (allow internal hosts)
 *     yourls_add_filter( 'restrict_remote_title_fetch', 'yourls_return_false' );
 *
 * @since 1.10.5
 * @return bool  true if the fetch destination must be restricted to public addresses
 */
function yourls_restrict_remote_title_fetch(): bool {
    return (bool)yourls_apply_filter( 'restrict_remote_title_fetch', !defined( 'YOURLS_USER' ) );
}

/**
 * HTTP request options that make a request fail when it is redirected to a non-public host
 *
 * Redirects are still followed: dropping them would break 'http -> https', 'example.com ->
 * www.example.com', URL shorteners, or any legit 30x redirect. Instead, every hop
 * is checked before it is requested.
 *
 * Meant to be merged into the $options of a single yourls_http_*() call, not to be added to
 * yourls_http_default_options() -- other requests (core version check, plugins) are not
 * triggered by an untrusted party.
 *
 * @since 1.10.5
 * @return array  Options to pass to yourls_http_get()
 */
function yourls_http_options_no_local_redirect(): array {
    $hooks = new \WpOrg\Requests\Hooks();
    $hooks->register( 'requests.before_redirect', 'yourls_http_abort_local_redirect' );

    return array(
        'hooks'     => $hooks,
        'redirects' => 3,
    );
}

/**
 * Callback on the 'requests.before_redirect' hook: abort if the redirect target is not public
 *
 * The exception thrown is a \WpOrg\Requests\Exception and not a plain \Exception, because this
 * is what yourls_http_request() catches -- anything else would escape and fatal.
 *
 * @since 1.10.5
 * @param string $location URL the request is about to be redirected to
 * @return void
 * @throws \WpOrg\Requests\Exception  When the redirect target is a non public host
 */
function yourls_http_abort_local_redirect(string $location): void {
    $host = parse_url( $location, PHP_URL_HOST );

    if( !is_string( $host ) || yourls_host_is_local( $host ) ) {
        throw new \WpOrg\Requests\Exception( 'Redirect to a non public host: ' . $location, 'yourls.local_redirect', $location );
    }
}

/**
 * Perform a HTTP request, return response object
 *
 * @since 1.7
 * @param string $type HTTP request type (GET, POST)
 * @param string $url URL to request
 * @param array $headers Extra headers to send with the request
 * @param array $data Data to send either as a query string for GET requests, or in the body for POST requests
 * @param array $options Options for the request (see /includes/Requests/Requests.php:request())
 * @return object WpOrg\Requests\Response object
 */
function yourls_http_request( $type, $url, $headers, $data, $options ) {

    // Allow plugins to short-circuit the whole function
    $pre = yourls_apply_filter( 'shunt_yourls_http_request', yourls_shunt_default(), $type, $url, $headers, $data, $options );
    if ( yourls_shunt_default() !== $pre ) {
        return $pre;
    }

    $options = array_merge( yourls_http_default_options(), $options );

    if( yourls_http_get_proxy() && !yourls_send_through_proxy( $url ) ) {
        unset( $options['proxy'] );
    }

    // filter everything
    $type    = yourls_apply_filter('http_request_type', $type);
    $url     = yourls_apply_filter('http_request_url', $url);
    $headers = yourls_apply_filter('http_request_headers', $headers);
    $data    = yourls_apply_filter('http_request_data', $data);
    $options = yourls_apply_filter('http_request_options', $options);

    try {
        $result = Requests::request( $url, $headers, $data, $type, $options );
    } catch( \WpOrg\Requests\Exception $e ) {
        $result = yourls_debug_log( $e->getMessage() . ' (' . $type . ' on ' . $url . ')' );
    };

    return $result;
}

/**
 * Return funky user agent string
 *
 * @since 1.5
 * @return string UA string
 */
function yourls_http_user_agent() {
    return yourls_apply_filter( 'http_user_agent', 'YOURLS v'.YOURLS_VERSION.' +http://yourls.org/ (running on '.yourls_get_yourls_site().')' );
}

/**
 * Check api.yourls.org if there's a newer version of YOURLS
 *
 * This function collects various stats to help us improve YOURLS. See the blog post about it:
 * http://blog.yourls.org/2014/01/on-yourls-1-7-and-api-yourls-org/
 * Results of requests sent to api.yourls.org are stored in option 'core_version_checks' and is an object
 * with the following properties:
 *    - failed_attempts : number of consecutive failed attempts
 *    - last_attempt    : time() of last attempt
 *    - last_result     : content retrieved from api.yourls.org during previous check
 *    - version_checked : installed YOURLS version that was last checked
 *
 * @since 1.7
 * @return mixed JSON data if api.yourls.org successfully requested, false otherwise
 */
function yourls_check_core_version() {

    global $yourls_user_passwords;

    $checks = yourls_get_option( 'core_version_checks' );

    // Invalidate check data when YOURLS version changes
    if ( is_object( $checks ) && YOURLS_VERSION != $checks->version_checked ) {
        $checks = false;
    }

    if( !is_object( $checks ) ) {
        $checks = new stdClass;
        $checks->failed_attempts = 0;
        $checks->last_attempt    = 0;
        $checks->last_result     = '';
        $checks->version_checked = YOURLS_VERSION;
    }

    // Total number of links and clicks
    list( $total_urls, $total_clicks ) = array_values(yourls_get_db_stats());

    // The collection of stuff to report
    $stuff = array(
        // Globally uniquish site identifier
        // This uses const YOURLS_SITE and not yourls_get_yourls_site() to prevent creating another id for an already known install
        'md5'                => md5( YOURLS_SITE . YOURLS_ABSPATH ),

        // Install information
        'failed_attempts'    => $checks->failed_attempts,
        'yourls_site'        => defined( 'YOURLS_SITE' ) ? yourls_get_yourls_site() : 'unknown',
        'yourls_version'     => defined( 'YOURLS_VERSION' ) ? YOURLS_VERSION : 'unknown',
        'php_version'        => PHP_VERSION,
        'mysql_version'      => yourls_get_db('read-check_core_version')->mysql_version(),
        'locale'             => yourls_get_locale(),

        // custom DB driver if any, and useful common PHP extensions
        'db_driver'          => defined( 'YOURLS_DB_DRIVER' ) ? YOURLS_DB_DRIVER : 'unset',
        'db_ext_pdo'         => extension_loaded( 'PDO' )     ? 1 : 0,
        'db_ext_mysql'       => extension_loaded( 'mysql' )   ? 1 : 0,
        'db_ext_mysqli'      => extension_loaded( 'mysqli' )  ? 1 : 0,
        'ext_curl'           => extension_loaded( 'curl' )    ? 1 : 0,

        // Config information
        'yourls_private'     => defined( 'YOURLS_PRIVATE' ) && YOURLS_PRIVATE ? 1 : 0,
        'yourls_unique'      => defined( 'YOURLS_UNIQUE_URLS' ) && YOURLS_UNIQUE_URLS ? 1 : 0,
        'yourls_url_convert' => defined( 'YOURLS_URL_CONVERT' ) ? YOURLS_URL_CONVERT : 'unknown',

        // Usage information
        'num_users'          => count( $yourls_user_passwords ),
        'num_active_plugins' => yourls_has_active_plugins(),
        'num_pages'          => defined( 'YOURLS_PAGEDIR' ) ? count( (array) glob( YOURLS_PAGEDIR .'/*.php') ) : 0,
        'num_links'          => $total_urls,
        'num_clicks'         => $total_clicks,
    );

    $stuff = yourls_apply_filter( 'version_check_stuff', $stuff );

    // Send it in
    $url = 'http://api.yourls.org/core/version/1.1/';
    if( yourls_can_http_over_ssl() ) {
        $url = yourls_set_url_scheme($url, 'https');
    }
    $req = yourls_http_post( $url, array(), $stuff );

    $checks->last_attempt = time();
    $checks->version_checked = YOURLS_VERSION;

    // Unexpected results ?
    if( is_string( $req ) or !$req->success ) {
        $checks->failed_attempts = $checks->failed_attempts + 1;
        yourls_update_option( 'core_version_checks', $checks );
        if( is_string($req) ) {
            yourls_debug_log('Version check failed: ' . $req);
        }
        return false;
    }

    // Parse response
    $json = json_decode( trim( $req->body ) );

    if( yourls_validate_core_version_response($json) ) {
        // All went OK - mark this down
        $checks->failed_attempts = 0;
        $checks->last_result     = $json;
        yourls_update_option( 'core_version_checks', $checks );

        return $json;
    }

    // Request returned actual result, but not what we expected
    return false;
}

/**
 *  Make sure response from api.yourls.org is valid
 *
 *  1) we should get a json object with two following properties:
 *    'latest' => a string representing a YOURLS version number, eg '1.2.3'
 *    'zipurl' => a string for a zip package URL, from github, eg 'https://api.github.com/repos/YOURLS/YOURLS/zipball/1.2.3'
 *  2) 'latest' and version extracted from 'zipurl' should match
 *  3) the object should not contain any other key
 *
 *  @since 1.7.7
 *  @param object $json  JSON object to check
 *  @return bool   true if seems legit, false otherwise
 */
function yourls_validate_core_version_response($json) {
    return (
        yourls_validate_core_version_response_keys($json)
     && $json->latest === yourls_sanitize_version($json->latest)
     && $json->zipurl === yourls_sanitize_url($json->zipurl)
     && $json->latest === yourls_get_version_from_zipball_url($json->zipurl)
     && yourls_is_valid_github_repo_url($json->zipurl)
    );
}

/**
 * Get version number from Github zipball URL (last part of URL, really)
 *
 * @since 1.8.3
 * @param string $zipurl eg 'https://api.github.com/repos/YOURLS/YOURLS/zipball/1.2.3'
 * @return string
 */
function yourls_get_version_from_zipball_url($zipurl) {
    $version = '';
    $parts = explode('/', parse_url(yourls_sanitize_url($zipurl), PHP_URL_PATH) ?? '');
    // expect at least 1 slash in path, return last part
    if( count($parts) > 1 ) {
        $version = end($parts);
    }
    return $version;
}

/**
 * Check if URL is from YOURLS/YOURLS repo on github
 *
 * @since 1.8.3
 * @param string $url  URL to check
 * @return bool
 */
function yourls_is_valid_github_repo_url($url) {
    $url = yourls_sanitize_url($url);
    return (
        join('.',array_slice(explode('.', parse_url($url, PHP_URL_HOST) ?? ''), -2, 2)) === 'github.com'
            // explodes on '.' (['api','github','com']) and keeps the last two elements
            // to make sure domain is either github.com or one of its subdomain (api.github.com for instance)
            // TODO: keep an eye on Github API to make sure it doesn't change some day to another domain (githubapi.com, ...)
        && substr( parse_url($url, PHP_URL_PATH), 0, 21 ) === '/repos/YOURLS/YOURLS/'
            // make sure path starts with '/repos/YOURLS/YOURLS/'
    );
}

/**
 * Check if object has only expected keys 'latest' and 'zipurl' containing strings
 *
 * @since 1.8.3
 * @param object $json
 * @return bool
 */
function yourls_validate_core_version_response_keys($json) {
    $keys = array('latest', 'zipurl');
    return (
        count(array_diff(array_keys((array)$json), $keys)) === 0
        && isset($json->latest)
        && isset($json->zipurl)
        && is_string($json->latest)
        && is_string($json->zipurl)
    );
}

/**
 * Determine if we want to check for a newer YOURLS version (and check if applicable)
 *
 * Currently checks are performed every 24h and only when someone is visiting an admin page.
 * In the future (1.8?) maybe check with cronjob emulation instead.
 *
 * @since 1.7
 * @return bool true if a check was needed and successfully performed, false otherwise
 */
function yourls_maybe_check_core_version() {
    // Allow plugins to short-circuit the whole function
    $pre = yourls_apply_filter( 'shunt_maybe_check_core_version', yourls_shunt_default() );
    if ( yourls_shunt_default() !== $pre ) {
        return $pre;
    }

    if (yourls_skip_version_check()) {
        return false;
    }

    if (!yourls_is_admin()) {
        return false;
    }

    $checks = yourls_get_option( 'core_version_checks' );

    /* We don't want to check if :
     - last_result is set (a previous check was performed)
     - and it was less than 24h ago (or less than 2h ago if it wasn't successful)
     - and version checked matched version running
     Otherwise, we want to check.
    */
    if( !empty( $checks->last_result )
        AND
        (
            ( $checks->failed_attempts == 0 && ( ( time() - $checks->last_attempt ) < 24 * 3600 ) )
            OR
            ( $checks->failed_attempts > 0  && ( ( time() - $checks->last_attempt ) <  2 * 3600 ) )
        )
        AND ( $checks->version_checked == YOURLS_VERSION )
    )
        return false;

    // We want to check if there's a new version
    $new_check = yourls_check_core_version();

    // Could not check for a new version, and we don't have ancient data
    if( false == $new_check && !isset( $checks->last_result->latest ) )
        return false;

    return true;
}

/**
 * Check if user setting for skipping version check is set
 *
 * @since 1.8.2
 * @return bool
 */
function yourls_skip_version_check() {
    return yourls_apply_filter('skip_version_check', defined('YOURLS_NO_VERSION_CHECK') && YOURLS_NO_VERSION_CHECK);
}

/**
 * Check if server can perform HTTPS requests, return bool
 *
 * @since 1.7.1
 * @return bool whether the server can perform HTTP requests over SSL
 */
function yourls_can_http_over_ssl() {
    $ssl_curl = $ssl_socket = false;

    if( function_exists( 'curl_exec' ) ) {
        $curl_version  = curl_version();
        $ssl_curl = ( $curl_version['features'] & CURL_VERSION_SSL );
    }

    if( function_exists( 'stream_socket_client' ) ) {
        $ssl_socket = extension_loaded( 'openssl' ) && function_exists( 'openssl_x509_parse' );
    }

    return ( $ssl_curl OR $ssl_socket );
}
