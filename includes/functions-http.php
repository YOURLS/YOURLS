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

/**
 * Perform a GET request, return response object or error string message
 *
 * Notable object properties: body, headers, status_code
 *
 * @since 1.7
 * @see yourls_http_request
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
 * @return mixed String (page body) or null if error
 */
function yourls_http_post_body( $url, $headers = array(), $data = array(), $options = array() ) {
	$return = yourls_http_post( $url, $headers, $data, $options );
	return isset( $return->body ) ? $return->body : null;
}

/**
 * Get proxy information
 *
 * @uses YOURLS_PROXY YOURLS_PROXY_USERNAME YOURLS_PROXY_PASSWORD
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
 * @uses YOURLS_PROXY_BYPASS_HOSTS
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
 * @uses YOURLS_PROXY
 * @uses YOURLS_PROXY_BYPASS_HOSTS
 * @since 1.7
 * @param string $url URL to check
 * @return bool true to request through proxy, false to request directly
 */
function yourls_send_through_proxy( $url ) {

	// Allow plugins to short-circuit the whole function
	$pre = yourls_apply_filter( 'shunt_send_through_proxy', null, $url );
	if ( null !== $pre )
		return $pre;

	$check = @parse_url( $url );
    
    if( !isset( $check['host'] ) ) {
        return false;
    }
	
	// Malformed URL, can not process, but this could mean ssl, so let through anyway.
	if ( $check === false )
		return true;
	
	// Self and loopback URLs are considered local (':' is parse_url() host on '::1')
	$home = parse_url( YOURLS_SITE );
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
 * Perform a HTTP request, return response object
 *
 * @since 1.7
 * @param string $type HTTP request type (GET, POST)
 * @param string $url URL to request
 * @param array $headers Extra headers to send with the request
 * @param array $data Data to send either as a query string for GET requests, or in the body for POST requests
 * @param array $options Options for the request (see /includes/Requests/Requests.php:request())
 * @return object Requests_Response object
 */
function yourls_http_request( $type, $url, $headers, $data, $options ) {

	// Allow plugins to short-circuit the whole function
	$pre = yourls_apply_filter( 'shunt_yourls_http_request', null, $type, $url, $headers, $data, $options );
	if ( null !== $pre )
		return $pre;

	yourls_http_load_library();
	
	$options = array_merge( yourls_http_default_options(), $options );
	
	if( yourls_http_get_proxy() && !yourls_send_through_proxy( $url ) ) {
		unset( $options['proxy'] );
	}
    
	try {
		$result = Requests::request( $url, $headers, $data, $type, $options );
	} catch( Requests_Exception $e ) {
		$result = yourls_debug_log( $e->getMessage() . ' (' . $type . ' on ' . $url . ')' );
	};
	
	return $result;
}

/**
 * Check if Requests class is defined, include Requests library if need be
 *
 * All HTTP functions should perform that check prior to any operation. This is to avoid
 * include()-ing all the Requests files on every YOURLS instance disregarding whether needed or not.
 *
 * @since 1.7
 */
function yourls_http_load_library() {
	if ( !class_exists( 'Requests', false ) ) {
		require_once dirname( __FILE__ ) . '/Requests/Requests.php';
		Requests::register_autoloader();
	}
}

/**
 * Return funky user agent string
 *
 * @since 1.5
 * @return string UA string
 */
function yourls_http_user_agent() {
	return yourls_apply_filter( 'http_user_agent', 'YOURLS v'.YOURLS_VERSION.' +http://yourls.org/ (running on '.YOURLS_SITE.')' );
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

	global $ydb, $yourls_user_passwords;
	
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

	// Config file location ('u' for '/user' or 'i' for '/includes')
	$conf_loc = str_replace( YOURLS_ABSPATH, '', YOURLS_CONFIGFILE );
	$conf_loc = str_replace( '/config.php', '', $conf_loc );
	$conf_loc = ( $conf_loc == '/user' ? 'u' : 'i' );
		
	// The collection of stuff to report
	$stuff = array(
		// Globally uniquish site identifier
		'md5'                => md5( YOURLS_SITE . YOURLS_ABSPATH ),

		// Install information
		'failed_attempts'    => $checks->failed_attempts,
		'yourls_site'        => defined( 'YOURLS_SITE' ) ? YOURLS_SITE : 'unknown',
		'yourls_version'     => defined( 'YOURLS_VERSION' ) ? YOURLS_VERSION : 'unknown',
		'php_version'        => phpversion(),
		'mysql_version'      => $ydb->mysql_version(),
		'locale'             => yourls_get_locale(),

		// custom DB driver if any, and useful common PHP extensions
		'db_driver'          => defined( 'YOURLS_DB_DRIVER' ) ? YOURLS_DB_DRIVER : 'unset',
		'db_ext_pdo'         => extension_loaded( 'pdo_mysql' ) ? 1 : 0,
		'db_ext_mysql'       => extension_loaded( 'mysql' )     ? 1 : 0,
		'db_ext_mysqli'      => extension_loaded( 'mysqli' )    ? 1 : 0,
		'ext_curl'           => extension_loaded( 'curl' )      ? 1 : 0,

		// Config information
		'num_users'          => count( $yourls_user_passwords ),
		'config_location'    => $conf_loc,
		'yourls_private'     => defined( 'YOURLS_PRIVATE' ) && YOURLS_PRIVATE ? 1 : 0,
		'yourls_unique'      => defined( 'YOURLS_UNIQUE_URLS' ) && YOURLS_UNIQUE_URLS ? 1 : 0,
		'yourls_url_convert' => defined( 'YOURLS_URL_CONVERT' ) ? YOURLS_URL_CONVERT : 'unknown',
		'num_active_plugins' => yourls_has_active_plugins(),
		'num_pages'          => defined( 'YOURLS_PAGEDIR' ) ? count( (array) glob( YOURLS_PAGEDIR .'/*.php') ) : 0,
	);
	
	$stuff = yourls_apply_filter( 'version_check_stuff', $stuff );
	
	// Send it in
	$url = 'http://api.yourls.org/core/version/1.0/';
    if( yourls_can_http_over_ssl() )
        $url = yourls_set_url_scheme( $url, 'https' );
	$req = yourls_http_post( $url, array(), $stuff );
	
	$checks->last_attempt = time();
	$checks->version_checked = YOURLS_VERSION;

	// Unexpected results ?
	if( is_string( $req ) or !$req->success ) {
		$checks->failed_attempts = $checks->failed_attempts + 1;
		yourls_update_option( 'core_version_checks', $checks );
		return false;
	}
	
	// Parse response
	$json = json_decode( trim( $req->body ) );
	
	if( isset( $json->latest ) && isset( $json->zipurl ) ) {
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
	$pre = yourls_apply_filter( 'shunt_maybe_check_core_version', null );
	if ( null !== $pre )
		return $pre;

	if( defined( 'YOURLS_NO_VERSION_CHECK' ) && YOURLS_NO_VERSION_CHECK )
		return false;

	if( !yourls_is_admin() )
		return false;

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

