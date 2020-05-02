<?php
/*
 * YOURLS general functions
 *
 */

/**
 * Make an optimized regexp pattern from a string of characters
 *
 */
function yourls_make_regexp_pattern( $string ) {
	$pattern = preg_quote( $string, '@' ); // add @ as an escaped character because @ is used as the regexp delimiter in yourls-loader.php
	// Simple benchmarks show that regexp with smarter sequences (0-9, a-z, A-Z...) are not faster or slower than 0123456789 etc...
	return $pattern;
}

/**
 * Function: Get client IP Address. Returns a DB safe string.
 *
 */
function yourls_get_IP() {
	$ip = '';

	// Precedence: if set, X-Forwarded-For > HTTP_X_FORWARDED_FOR > HTTP_CLIENT_IP > HTTP_VIA > REMOTE_ADDR
	$headers = array( 'X-Forwarded-For', 'HTTP_X_FORWARDED_FOR', 'HTTP_CLIENT_IP', 'HTTP_VIA', 'REMOTE_ADDR' );
	foreach( $headers as $header ) {
		if ( !empty( $_SERVER[ $header ] ) ) {
			$ip = $_SERVER[ $header ];
			break;
		}
	}

	// headers can contain multiple IPs (X-Forwarded-For = client, proxy1, proxy2). Take first one.
	if ( strpos( $ip, ',' ) !== false )
		$ip = substr( $ip, 0, strpos( $ip, ',' ) );

	return yourls_apply_filter( 'get_IP', yourls_sanitize_ip( $ip ) );
}

/**
 * Get next id a new link will have if no custom keyword provided
 *
 * @since 1.0
 * @return int            id of next link
 */
function yourls_get_next_decimal() {
	return yourls_apply_filter( 'get_next_decimal', (int)yourls_get_option( 'next_id' ) );
}

/**
 * Update id for next link with no custom keyword
 *
 * Note: this function relies upon yourls_update_option(), which will return either true or false
 * depending if there has been an actual MySQL query updating the DB.
 * In other words, this function may return false yet this would not mean it has functionnaly failed
 * In other words I'm not sure we really need this function to return something :face_with_eyes_looking_up:
 * See issue 2621 for more on this.
 *
 * @since 1.0
 * @param integer $int     id for next link
 * @return bool            true or false depending on if there has been an actual MySQL query. See note above.
 */
function yourls_update_next_decimal( $int = '' ) {
	$int = ( $int == '' ) ? yourls_get_next_decimal() + 1 : (int)$int ;
	$update = yourls_update_option( 'next_id', $int );
	yourls_do_action( 'update_next_decimal', $int, $update );
	return $update;
}

/**
 * Return XML output.
 *
 */
function yourls_xml_encode( $array ) {
	require_once( YOURLS_INC.'/functions-xml.php' );
	$converter= new yourls_array2xml;
	return $converter->array2xml( $array );
}

/**
 * Update click count on a short URL. Return 0/1 for error/success.
 *
 */
function yourls_update_clicks( $keyword, $clicks = false ) {
	// Allow plugins to short-circuit the whole function
	$pre = yourls_apply_filter( 'shunt_update_clicks', false, $keyword, $clicks );
	if ( false !== $pre )
		return $pre;

	global $ydb;
	$keyword = yourls_sanitize_string( $keyword );
	$table = YOURLS_DB_TABLE_URL;
	if ( $clicks !== false && is_int( $clicks ) && $clicks >= 0 )
		$update = $ydb->fetchAffected( "UPDATE `$table` SET `clicks` = :clicks WHERE `keyword` = :keyword", array('clicks' => $clicks, 'keyword' => $keyword) );
	else
		$update = $ydb->fetchAffected( "UPDATE `$table` SET `clicks` = clicks + 1 WHERE `keyword` = :keyword", array('keyword' => $keyword) );

	yourls_do_action( 'update_clicks', $keyword, $update, $clicks );
	return $update;
}

/**
 * Return array of stats. (string)$filter is 'bottom', 'last', 'rand' or 'top'. (int)$limit is the number of links to return
 *
 */
function yourls_get_stats( $filter = 'top', $limit = 10, $start = 0 ) {
	global $ydb;

	switch( $filter ) {
		case 'bottom':
			$sort_by    = '`clicks`';
			$sort_order = 'asc';
			break;
		case 'last':
			$sort_by    = '`timestamp`';
			$sort_order = 'desc';
			break;
		case 'rand':
		case 'random':
			$sort_by    = 'RAND()';
			$sort_order = '';
			break;
		case 'top':
		default:
			$sort_by    = '`clicks`';
			$sort_order = 'desc';
			break;
	}

	// Fetch links
	$limit = intval( $limit );
	$start = intval( $start );
	if ( $limit > 0 ) {

		$table_url = YOURLS_DB_TABLE_URL;
		$results = $ydb->fetchObjects( "SELECT * FROM `$table_url` WHERE 1=1 ORDER BY $sort_by $sort_order LIMIT $start, $limit;" );

		$return = array();
		$i = 1;

		foreach ( (array)$results as $res ) {
			$return['links']['link_'.$i++] = array(
				'shorturl' => yourls_get_yourls_site() .'/'. $res->keyword,
				'url'      => $res->url,
				'title'    => $res->title,
				'timestamp'=> $res->timestamp,
				'ip'       => $res->ip,
				'clicks'   => $res->clicks,
			);
		}
	}

	$return['stats'] = yourls_get_db_stats();

	$return['statusCode'] = 200;

	return yourls_apply_filter( 'get_stats', $return, $filter, $limit, $start );
}

/**
 * Get total number of URLs and sum of clicks. Input: optional "AND WHERE" clause. Returns array
 *
 * The $where parameter will contain additional SQL arguments:
 *   $where['sql'] will concatenate SQL clauses: $where['sql'] = ' AND something = :value AND otherthing < :othervalue';
 *   $where['binds'] will hold the (name => value) placeholder pairs: $where['binds'] = array('value' => $value, 'othervalue' => $value2)
 *
 * @param  $where array  See comment above
 * @return array
 */
function yourls_get_db_stats( $where = array('sql' => '', 'binds' => array()) ) {
	global $ydb;
	$table_url = YOURLS_DB_TABLE_URL;

	$totals = $ydb->fetchObject( "SELECT COUNT(keyword) as count, SUM(clicks) as sum FROM `$table_url` WHERE 1=1 " . $where['sql'] , $where['binds'] );
	$return = array( 'total_links' => $totals->count, 'total_clicks' => $totals->sum );

	return yourls_apply_filter( 'get_db_stats', $return, $where );
}

/**
 * Get number of SQL queries performed
 *
 */
function yourls_get_num_queries() {
	global $ydb;

	return yourls_apply_filter( 'get_num_queries', $ydb->get_num_queries() );
}

/**
 * Returns a sanitized a user agent string. Given what I found on http://www.user-agents.org/ it should be OK.
 *
 */
function yourls_get_user_agent() {
	if ( !isset( $_SERVER['HTTP_USER_AGENT'] ) )
		return '-';

	$ua = strip_tags( html_entity_decode( $_SERVER['HTTP_USER_AGENT'] ));
	$ua = preg_replace('![^0-9a-zA-Z\':., /{}\(\)\[\]\+@&\!\?;_\-=~\*\#]!', '', $ua );

	return yourls_apply_filter( 'get_user_agent', substr( $ua, 0, 255 ) );
}

/**
 * Redirect to another page
 *
 * YOURLS redirection, either to internal or external URLs. If headers have not been sent, redirection
 * is achieved with PHP's header(). If headers have been sent already and we're not in a command line
 * client, redirection occurs with Javascript.
 *
 * @since 1.4
 * @param string $location      URL to redirect to
 * @param int    $code          HTTP status code to send
 * @return int                  1 for header redirection, 2 for js redirection, 3 otherwise
 */
function yourls_redirect( $location, $code = 301 ) {
	yourls_do_action( 'pre_redirect', $location, $code );
	$location = yourls_apply_filter( 'redirect_location', $location, $code );
	$code     = yourls_apply_filter( 'redirect_code', $code, $location );
	// Redirect, either properly if possible, or via Javascript otherwise
	if( !headers_sent() ) {
		yourls_status_header( $code );
		header( "Location: $location" );
        return 1;
	}

	if( php_sapi_name() !== 'cli') {
        yourls_redirect_javascript( $location );
        return 2;
	}

	return 3;
}

/**
 * Redirect to an existing short URL
 *
 * Redirect client to an existing short URL (no check performed) and execute misc tasks: update
 * clicks for short URL, update logs, and send a nocache header to prevent bots indexing short
 * URLS (see #2202)
 *
 * @since  1.7.3
 * @param  string $url
 * @param  string $keyword
 */
function yourls_redirect_shorturl($url, $keyword) {
    yourls_do_action('redirect_shorturl', $url, $keyword);

    // Update click count in main table
    $update_clicks = yourls_update_clicks($keyword);

    // Update detailed log for stats
    $log_redirect = yourls_log_redirect($keyword);

    // Tell (Google)bots not to index this short URL, see #2202
    if( !headers_sent() ) {
        header("X-Robots-Tag: noindex", true);
    }

    yourls_redirect($url, 301);
}

/**
 * Set HTTP status header
 *
 * @since 1.4
 * @param int $code  status header code
 * @return bool      whether header was sent
 */
function yourls_status_header( $code = 200 ) {
	yourls_do_action( 'status_header', $code );

	if( headers_sent() )
		return false;

	$protocol = $_SERVER['SERVER_PROTOCOL'];
	if ( 'HTTP/1.1' != $protocol && 'HTTP/1.0' != $protocol )
		$protocol = 'HTTP/1.0';

	$code = intval( $code );
	$desc = yourls_get_HTTP_status( $code );

	@header ("$protocol $code $desc"); // This causes problems on IIS and some FastCGI setups

    return true;
}

/**
 * Redirect to another page using Javascript. Set optional (bool)$dontwait to false to force manual redirection (make sure a message has been read by user)
 *
 */
function yourls_redirect_javascript( $location, $dontwait = true ) {
	yourls_do_action( 'pre_redirect_javascript', $location, $dontwait );
	$location = yourls_apply_filter( 'redirect_javascript', $location, $dontwait );
	if( $dontwait ) {
		$message = yourls_s( 'if you are not redirected after 10 seconds, please <a href="%s">click here</a>', $location );
		echo <<<REDIR
		<script type="text/javascript">
		window.location="$location";
		</script>
		<small>($message)</small>
REDIR;
	} else {
		echo '<p>' . yourls_s( 'Please <a href="%s">click here</a>', $location ) . '</p>';
	}
	yourls_do_action( 'post_redirect_javascript', $location );
}

/**
 * Return a HTTP status code
 *
 */
function yourls_get_HTTP_status( $code ) {
	$code = intval( $code );
	$headers_desc = array(
		100 => 'Continue',
		101 => 'Switching Protocols',
		102 => 'Processing',

		200 => 'OK',
		201 => 'Created',
		202 => 'Accepted',
		203 => 'Non-Authoritative Information',
		204 => 'No Content',
		205 => 'Reset Content',
		206 => 'Partial Content',
		207 => 'Multi-Status',
		226 => 'IM Used',

		300 => 'Multiple Choices',
		301 => 'Moved Permanently',
		302 => 'Found',
		303 => 'See Other',
		304 => 'Not Modified',
		305 => 'Use Proxy',
		306 => 'Reserved',
		307 => 'Temporary Redirect',

		400 => 'Bad Request',
		401 => 'Unauthorized',
		402 => 'Payment Required',
		403 => 'Forbidden',
		404 => 'Not Found',
		405 => 'Method Not Allowed',
		406 => 'Not Acceptable',
		407 => 'Proxy Authentication Required',
		408 => 'Request Timeout',
		409 => 'Conflict',
		410 => 'Gone',
		411 => 'Length Required',
		412 => 'Precondition Failed',
		413 => 'Request Entity Too Large',
		414 => 'Request-URI Too Long',
		415 => 'Unsupported Media Type',
		416 => 'Requested Range Not Satisfiable',
		417 => 'Expectation Failed',
		422 => 'Unprocessable Entity',
		423 => 'Locked',
		424 => 'Failed Dependency',
		426 => 'Upgrade Required',

		500 => 'Internal Server Error',
		501 => 'Not Implemented',
		502 => 'Bad Gateway',
		503 => 'Service Unavailable',
		504 => 'Gateway Timeout',
		505 => 'HTTP Version Not Supported',
		506 => 'Variant Also Negotiates',
		507 => 'Insufficient Storage',
		510 => 'Not Extended'
	);

	if ( isset( $headers_desc[$code] ) )
		return $headers_desc[$code];
	else
		return '';
}

/**
 * Log a redirect (for stats)
 *
 * This function does not check for the existence of a valid keyword, in order to save a query. Make sure the keyword
 * exists before calling it.
 *
 * @since 1.4
 * @param string $keyword short URL keyword
 * @return mixed Result of the INSERT query (1 on success)
 */
function yourls_log_redirect( $keyword ) {
	// Allow plugins to short-circuit the whole function
	$pre = yourls_apply_filter( 'shunt_log_redirect', false, $keyword );
	if ( false !== $pre )
		return $pre;

	if ( !yourls_do_log_redirect() )
		return true;

	global $ydb;
	$table = YOURLS_DB_TABLE_LOG;
    $ip = yourls_get_IP();
    $binds = array(
        'now' => date( 'Y-m-d H:i:s' ),
        'keyword'  => yourls_sanitize_string($keyword),
        'referrer' => isset($_SERVER['HTTP_REFERER']) ? yourls_sanitize_url_safe(substr($_SERVER['HTTP_REFERER'], 0, 200)) : 'direct',
        'ua'       => substr(yourls_get_user_agent(), 0, 255),
        'ip'       => $ip,
        'location' => yourls_geo_ip_to_countrycode($ip),
    );

    return $ydb->fetchAffected("INSERT INTO `$table` (click_time, shorturl, referrer, user_agent, ip_address, country_code) VALUES (:now, :keyword, :referrer, :ua, :ip, :location)", $binds );
}

/**
 * Check if we want to not log redirects (for stats)
 *
 */
function yourls_do_log_redirect() {
	return ( !defined( 'YOURLS_NOSTATS' ) || YOURLS_NOSTATS != true );
}

/**
 * Check if an upgrade is needed
 *
 */
function yourls_upgrade_is_needed() {
	// check YOURLS_DB_VERSION exist && match values stored in YOURLS_DB_TABLE_OPTIONS
	list( $currentver, $currentsql ) = yourls_get_current_version_from_sql();
	if( $currentsql < YOURLS_DB_VERSION )
		return true;

	// Check if YOURLS_VERSION exist && match value stored in YOURLS_DB_TABLE_OPTIONS, update DB if required
	if( $currentver < YOURLS_VERSION )
		yourls_update_option( 'version', YOURLS_VERSION );

	return false;
}

/**
 * Get current version & db version as stored in the options DB. Prior to 1.4 there's no option table.
 *
 */
function yourls_get_current_version_from_sql() {
	$currentver = yourls_get_option( 'version' );
	$currentsql = yourls_get_option( 'db_version' );

	// Values if version is 1.3
	if( !$currentver )
		$currentver = '1.3';
	if( !$currentsql )
		$currentsql = '100';

	return array( $currentver, $currentsql);
}

/**
 * Determine if the current page is private
 *
 */
function yourls_is_private() {
	$private = false;

	if ( defined('YOURLS_PRIVATE') && YOURLS_PRIVATE == true ) {

		// Allow overruling for particular pages:

		// API
		if( yourls_is_API() ) {
			if( !defined('YOURLS_PRIVATE_API') || YOURLS_PRIVATE_API != false )
				$private = true;

		// Infos
		} elseif( yourls_is_infos() ) {
			if( !defined('YOURLS_PRIVATE_INFOS') || YOURLS_PRIVATE_INFOS !== false )
				$private = true;

		// Others
		} else {
			$private = true;
		}

	}

	return yourls_apply_filter( 'is_private', $private );
}

/**
 * Allow several short URLs for the same long URL ?
 *
 */
function yourls_allow_duplicate_longurls() {
	// special treatment if API to check for WordPress plugin requests
	if( yourls_is_API() ) {
		if ( isset($_REQUEST['source']) && $_REQUEST['source'] == 'plugin' )
			return false;
	}
	return ( defined( 'YOURLS_UNIQUE_URLS' ) && YOURLS_UNIQUE_URLS == false );
}

/**
 * Check if an IP shortens URL too fast to prevent DB flood. Return true, or die.
 *
 */
function yourls_check_IP_flood( $ip = '' ) {

	// Allow plugins to short-circuit the whole function
	$pre = yourls_apply_filter( 'shunt_check_IP_flood', false, $ip );
	if ( false !== $pre )
		return $pre;

	yourls_do_action( 'pre_check_ip_flood', $ip ); // at this point $ip can be '', check it if your plugin hooks in here

	// Raise white flag if installing or if no flood delay defined
	if(
		( defined('YOURLS_FLOOD_DELAY_SECONDS') && YOURLS_FLOOD_DELAY_SECONDS === 0 ) ||
		!defined('YOURLS_FLOOD_DELAY_SECONDS') ||
		yourls_is_installing()
	)
		return true;

	// Don't throttle logged in users
	if( yourls_is_private() ) {
		 if( yourls_is_valid_user() === true )
			return true;
	}

	// Don't throttle whitelist IPs
	if( defined( 'YOURLS_FLOOD_IP_WHITELIST' ) && YOURLS_FLOOD_IP_WHITELIST ) {
		$whitelist_ips = explode( ',', YOURLS_FLOOD_IP_WHITELIST );
		foreach( (array)$whitelist_ips as $whitelist_ip ) {
			$whitelist_ip = trim( $whitelist_ip );
			if ( $whitelist_ip == $ip )
				return true;
		}
	}

	$ip = ( $ip ? yourls_sanitize_ip( $ip ) : yourls_get_IP() );

	yourls_do_action( 'check_ip_flood', $ip );

	global $ydb;
	$table = YOURLS_DB_TABLE_URL;

	$lasttime = $ydb->fetchValue( "SELECT `timestamp` FROM $table WHERE `ip` = :ip ORDER BY `timestamp` DESC LIMIT 1", array('ip' => $ip) );
	if( $lasttime ) {
		$now = date( 'U' );
		$then = date( 'U', strtotime( $lasttime ) );
		if( ( $now - $then ) <= YOURLS_FLOOD_DELAY_SECONDS ) {
			// Flood!
			yourls_do_action( 'ip_flood', $ip, $now - $then );
			yourls_die( yourls__( 'Too many URLs added too fast. Slow down please.' ), yourls__( 'Too Many Requests' ), 429 );
		}
	}

	return true;
}

/**
 * Check if YOURLS is installing
 *
 * @return bool
 * @since 1.6
 */
function yourls_is_installing() {
	$installing = defined( 'YOURLS_INSTALLING' ) && YOURLS_INSTALLING == true;
	return yourls_apply_filter( 'is_installing', $installing );
}

/**
 * Check if YOURLS is upgrading
 *
 * @return bool
 * @since 1.6
 */
function yourls_is_upgrading() {
	$upgrading = defined( 'YOURLS_UPGRADING' ) && YOURLS_UPGRADING == true;
	return yourls_apply_filter( 'is_upgrading', $upgrading );
}


/**
 * Check if YOURLS is installed
 *
 * Checks property $ydb->installed that is created by yourls_get_all_options()
 *
 * See inline comment for updating from 1.3 or prior.
 *
 */
function yourls_is_installed() {
	global $ydb;
	return yourls_apply_filter( 'is_installed', $ydb->is_installed() );
}

/**
 * Set installed state
 *
 * @since  1.7.3
 * @param  bool $bool  whether YOURLS is installed or not
 * @return void
 */
function yourls_set_installed($bool) {
    global $ydb;
    $ydb->set_installed($bool);
}

/**
 * Generate random string of (int)$length length and type $type (see function for details)
 *
 */
function yourls_rnd_string ( $length = 5, $type = 0, $charlist = '' ) {
	$str = '';
	$length = intval( $length );

	// define possible characters
	switch ( $type ) {

		// custom char list, or comply to charset as defined in config
		case '0':
			$possible = $charlist ? $charlist : yourls_get_shorturl_charset() ;
			break;

		// no vowels to make no offending word, no 0/1/o/l to avoid confusion between letters & digits. Perfect for passwords.
		case '1':
			$possible = "23456789bcdfghjkmnpqrstvwxyz";
			break;

		// Same, with lower + upper
		case '2':
			$possible = "23456789bcdfghjkmnpqrstvwxyzBCDFGHJKMNPQRSTVWXYZ";
			break;

		// all letters, lowercase
		case '3':
			$possible = "abcdefghijklmnopqrstuvwxyz";
			break;

		// all letters, lowercase + uppercase
		case '4':
			$possible = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
			break;

		// all digits & letters lowercase
		case '5':
			$possible = "0123456789abcdefghijklmnopqrstuvwxyz";
			break;

		// all digits & letters lowercase + uppercase
		case '6':
			$possible = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
			break;

	}

    $str = substr( str_shuffle( $possible ), 0, $length );

	return yourls_apply_filter( 'rnd_string', $str, $length, $type, $charlist );
}

/**
 * Check if we're in API mode. Returns bool
 *
 */
function yourls_is_API() {
    $return = defined( 'YOURLS_API' ) && YOURLS_API == true;
    return yourls_apply_filter( 'is_API', $return );
}

/**
 * Check if we're in Ajax mode. Returns bool
 *
 */
function yourls_is_Ajax() {
    $return = defined( 'YOURLS_AJAX' ) && YOURLS_AJAX == true;
    return yourls_apply_filter( 'is_Ajax', $return );
}

/**
 * Check if we're in GO mode (yourls-go.php). Returns bool
 *
 */
function yourls_is_GO() {
    $return = defined( 'YOURLS_GO' ) && YOURLS_GO == true;
    return yourls_apply_filter( 'is_GO', $return );
}

/**
 * Check if we're displaying stats infos (yourls-infos.php). Returns bool
 *
 */
function yourls_is_infos() {
    $return = defined( 'YOURLS_INFOS' ) && YOURLS_INFOS == true;
    return yourls_apply_filter( 'is_infos', $return );
}

/**
 * Check if we're in the admin area. Returns bool
 *
 */
function yourls_is_admin() {
    $return = defined( 'YOURLS_ADMIN' ) && YOURLS_ADMIN == true;
    return yourls_apply_filter( 'is_admin', $return );
}

/**
 * Check if the server seems to be running on Windows. Not exactly sure how reliable this is.
 *
 */
function yourls_is_windows() {
	return defined( 'DIRECTORY_SEPARATOR' ) && DIRECTORY_SEPARATOR == '\\';
}

/**
 * Check if SSL is required. Returns bool.
 *
 */
function yourls_needs_ssl() {
    $return = defined('YOURLS_ADMIN_SSL') && YOURLS_ADMIN_SSL == true;
    return yourls_apply_filter( 'needs_ssl', $return );
}

/**
 * Check if SSL is used, returns bool. Stolen from WP.
 *
 */
function yourls_is_ssl() {
	$is_ssl = false;
	if ( isset( $_SERVER['HTTPS'] ) ) {
		if ( 'on' == strtolower( $_SERVER['HTTPS'] ) )
			$is_ssl = true;
		if ( '1' == $_SERVER['HTTPS'] )
			$is_ssl = true;
	} elseif ( isset( $_SERVER['SERVER_PORT'] ) && ( '443' == $_SERVER['SERVER_PORT'] ) ) {
		$is_ssl = true;
	}
	return yourls_apply_filter( 'is_ssl', $is_ssl );
}

/**
 * Get a remote page title
 *
 * This function returns a string: either the page title as defined in HTML, or the URL if not found
 * The function tries to convert funky characters found in titles to UTF8, from the detected charset.
 * Charset in use is guessed from HTML meta tag, or if not found, from server's 'content-type' response.
 *
 * @param string $url URL
 * @return string Title (sanitized) or the URL if no title found
 */
function yourls_get_remote_title( $url ) {
	// Allow plugins to short-circuit the whole function
	$pre = yourls_apply_filter( 'shunt_get_remote_title', false, $url );
	if ( false !== $pre )
		return $pre;

	$url = yourls_sanitize_url( $url );

	// Only deal with http(s)://
	if( !in_array( yourls_get_protocol( $url ), array( 'http://', 'https://' ) ) )
		return $url;

	$title = $charset = false;

    $max_bytes = yourls_apply_filter( 'get_remote_title_max_byte', 32768 ); // limit data fetching to 32K in order to find a <title> tag

	$response = yourls_http_get( $url, array(), array(), array( 'max_bytes' => $max_bytes ) ); // can be a Request object or an error string
	if( is_string( $response ) ) {
		return $url;
	}

	// Page content. No content? Return the URL
	$content = $response->body;
	if( !$content )
		return $url;

	// look for <title>. No title found? Return the URL
	if ( preg_match('/<title>(.*?)<\/title>/is', $content, $found ) ) {
		$title = $found[1];
		unset( $found );
	}
	if( !$title )
		return $url;

	// Now we have a title. We'll try to get proper utf8 from it.

	// Get charset as (and if) defined by the HTML meta tag. We should match
	// <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	// or <meta charset='utf-8'> and all possible variations: see https://gist.github.com/ozh/7951236
	if ( preg_match( '/<meta[^>]*charset\s*=["\' ]*([a-zA-Z0-9\-_]+)/is', $content, $found ) ) {
		$charset = $found[1];
		unset( $found );
	} else {
		// No charset found in HTML. Get charset as (and if) defined by the server response
		$_charset = current( $response->headers->getValues( 'content-type' ) );
		if( preg_match( '/charset=(\S+)/', $_charset, $found ) ) {
			$charset = trim( $found[1], ';' );
			unset( $found );
		}
	}

	// Conversion to utf-8 if what we have is not utf8 already
	if( strtolower( $charset ) != 'utf-8' && function_exists( 'mb_convert_encoding' ) ) {
		// We use @ to remove warnings because mb_ functions are easily bitching about illegal chars
		if( $charset ) {
			$title = @mb_convert_encoding( $title, 'UTF-8', $charset );
		} else {
			$title = @mb_convert_encoding( $title, 'UTF-8' );
		}
	}

	// Remove HTML entities
	$title = html_entity_decode( $title, ENT_QUOTES, 'UTF-8' );

	// Strip out evil things
	$title = yourls_sanitize_title( $title, $url );

	return yourls_apply_filter( 'get_remote_title', $title, $url );
}

/**
 * Quick UA check for mobile devices. Return boolean.
 *
 */
function yourls_is_mobile_device() {
	// Strings searched
	$mobiles = array(
		'android', 'blackberry', 'blazer',
		'compal', 'elaine', 'fennec', 'hiptop',
		'iemobile', 'iphone', 'ipod', 'ipad',
		'iris', 'kindle', 'opera mobi', 'opera mini',
		'palm', 'phone', 'pocket', 'psp', 'symbian',
		'treo', 'wap', 'windows ce', 'windows phone'
	);

	// Current user-agent
	$current = strtolower( $_SERVER['HTTP_USER_AGENT'] );

	// Check and return
	$is_mobile = ( str_replace( $mobiles, '', $current ) != $current );
	return yourls_apply_filter( 'is_mobile_device', $is_mobile );
}

/**
 * Get request in YOURLS base (eg in 'http://sho.rt/yourls/abcd' get 'abdc')
 *
 * With no parameter passed, this function will guess current page and consider
 * it is the requested page.
 * For testing purposes, parameters can be passed.
 *
 * @since 1.5
 * @param string $yourls_site   Optional, YOURLS installation URL (default to constant YOURLS_SITE)
 * @param string $uri           Optional, page requested (default to $_SERVER['REQUEST_URI'] eg '/yourls/abcd' )
 * @return string               request relative to YOURLS base (eg 'abdc')
 */
function yourls_get_request($yourls_site = false, $uri = false) {
	// Allow plugins to short-circuit the whole function
	$pre = yourls_apply_filter( 'shunt_get_request', false );
	if ( false !== $pre )
		return $pre;

	yourls_do_action( 'pre_get_request', $yourls_site, $uri );

    // Default values
    if (false === $yourls_site) {
        $yourls_site = yourls_get_yourls_site();
    }
    if (false === $uri) {
        $uri = $_SERVER['REQUEST_URI'];
    }

    // Even though the config sample states YOURLS_SITE should be set without trailing slash...
    $yourls_site = rtrim($yourls_site,'/');

    // Now strip the YOURLS_SITE path part out of the requested URI, and get the request relative to YOURLS base
    // +---------------------------+-------------------------+---------------------+--------------+
    // |       if we request       | and YOURLS is hosted on | YOURLS path part is | "request" is |
    // +---------------------------+-------------------------+---------------------+--------------+
    // | http://sho.rt/abc         | http://sho.rt           | /                   | abc          |
    // | https://SHO.rt/subdir/abc | https://shor.rt/subdir/ | /subdir/            | abc          |
    // +---------------------------+-------------------------+---------------------+--------------+
    // and so on. You can find various test cases in /tests/tests/utilities/get_request.php

    // Take only the URL_PATH part of YOURLS_SITE (ie "https://sho.rt:1337/path/to/yourls" -> "/path/to/yourls")
    $yourls_site = parse_url($yourls_site, PHP_URL_PATH) . '/';

    // Strip path part from request if exists
    $request = $uri;
    if( substr($uri, 0, strlen($yourls_site)) == $yourls_site) {
        $request = ltrim( substr($uri, strlen($yourls_site)), '/');
    }

	// Unless request looks like a full URL (ie request is a simple keyword) strip query string
	if( !preg_match( "@^[a-zA-Z]+://.+@", $request ) ) {
		$request = current( explode( '?', $request ) );
	}

	return yourls_apply_filter( 'get_request', $request );
}

/**
 * Fix $_SERVER['REQUEST_URI'] variable for various setups. Stolen from WP.
 *
 */
function yourls_fix_request_uri() {

	$default_server_values = array(
		'SERVER_SOFTWARE' => '',
		'REQUEST_URI' => '',
	);
	$_SERVER = array_merge( $default_server_values, $_SERVER );

	// Fix for IIS when running with PHP ISAPI
	if ( empty( $_SERVER['REQUEST_URI'] ) || ( php_sapi_name() != 'cgi-fcgi' && preg_match( '/^Microsoft-IIS\//', $_SERVER['SERVER_SOFTWARE'] ) ) ) {

		// IIS Mod-Rewrite
		if ( isset( $_SERVER['HTTP_X_ORIGINAL_URL'] ) ) {
			$_SERVER['REQUEST_URI'] = $_SERVER['HTTP_X_ORIGINAL_URL'];
		}
		// IIS Isapi_Rewrite
		else if ( isset( $_SERVER['HTTP_X_REWRITE_URL'] ) ) {
			$_SERVER['REQUEST_URI'] = $_SERVER['HTTP_X_REWRITE_URL'];
		} else {
			// Use ORIG_PATH_INFO if there is no PATH_INFO
			if ( !isset( $_SERVER['PATH_INFO'] ) && isset( $_SERVER['ORIG_PATH_INFO'] ) )
				$_SERVER['PATH_INFO'] = $_SERVER['ORIG_PATH_INFO'];

			// Some IIS + PHP configurations puts the script-name in the path-info (No need to append it twice)
			if ( isset( $_SERVER['PATH_INFO'] ) ) {
				if ( $_SERVER['PATH_INFO'] == $_SERVER['SCRIPT_NAME'] )
					$_SERVER['REQUEST_URI'] = $_SERVER['PATH_INFO'];
				else
					$_SERVER['REQUEST_URI'] = $_SERVER['SCRIPT_NAME'] . $_SERVER['PATH_INFO'];
			}

			// Append the query string if it exists and isn't null
			if ( ! empty( $_SERVER['QUERY_STRING'] ) ) {
				$_SERVER['REQUEST_URI'] .= '?' . $_SERVER['QUERY_STRING'];
			}
		}
	}
}

/**
 * Check for maintenance mode. If yes, die. See yourls_maintenance_mode(). Stolen from WP.
 *
 */
function yourls_check_maintenance_mode() {

	$file = YOURLS_ABSPATH . '/.maintenance' ;
	if ( !file_exists( $file ) || yourls_is_upgrading() || yourls_is_installing() )
		return;

	global $maintenance_start;

	include_once( $file );
	// If the $maintenance_start timestamp is older than 10 minutes, don't die.
	if ( ( time() - $maintenance_start ) >= 600 )
		return;

	// Use any /user/maintenance.php file
	if( file_exists( YOURLS_USERDIR.'/maintenance.php' ) ) {
		include_once( YOURLS_USERDIR.'/maintenance.php' );
		die();
	}

	// https://www.youtube.com/watch?v=Xw-m4jEY-Ns
	$title   = yourls__( 'Service temporarily unavailable' );
	$message = yourls__( 'Our service is currently undergoing scheduled maintenance.' ) . "</p>\n<p>" .
	yourls__( 'Things should not last very long, thank you for your patience and please excuse the inconvenience' );
	yourls_die( $message, $title , 503 );

}

/**
 * Return current admin page, or null if not an admin page
 *
 * @return mixed string if admin page, null if not an admin page
 * @since 1.6
 */
function yourls_current_admin_page() {
	if( yourls_is_admin() ) {
		$current = substr( yourls_get_request(), 6 );
		if( $current === false )
			$current = 'index.php'; // if current page is http://sho.rt/admin/ instead of http://sho.rt/admin/index.php

		return $current;
	}
	return null;
}

/**
 * Check if a URL protocol is allowed
 *
 * Checks a URL against a list of whitelisted protocols. Protocols must be defined with
 * their complete scheme name, ie 'stuff:' or 'stuff://' (for instance, 'mailto:' is a valid
 * protocol, 'mailto://' isn't, and 'http:' with no double slashed isn't either
 *
 * @since 1.6
 * @see yourls_get_protocol()
 *
 * @param string $url URL to be check
 * @param array $protocols Optional. Array of protocols, defaults to global $yourls_allowedprotocols
 * @return boolean true if protocol allowed, false otherwise
 */
function yourls_is_allowed_protocol( $url, $protocols = array() ) {
	if( ! $protocols ) {
		global $yourls_allowedprotocols;
		$protocols = $yourls_allowedprotocols;
	}

	$protocol = yourls_get_protocol( $url );
	return yourls_apply_filter( 'is_allowed_protocol', in_array( $protocol, $protocols ), $url, $protocols );
}

/**
 * Get protocol from a URL (eg mailto:, http:// ...)
 *
 * What we liberally call a "protocol" in YOURLS is the scheme name + colon + double slashes if present of a URI. Examples:
 * "something://blah" -> "something://"
 * "something:blah"   -> "something:"
 * "something:/blah"  -> "something:"
 *
 * Unit Tests for this function are located in tests/format/urls.php
 *
 * @since 1.6
 *
 * @param string $url URL to be check
 * @return string Protocol, with slash slash if applicable. Empty string if no protocol
 */
function yourls_get_protocol( $url ) {
	preg_match( '!^[a-zA-Z][a-zA-Z0-9\+\.-]+:(//)?!', $url, $matches );
	/*
	http://en.wikipedia.org/wiki/URI_scheme#Generic_syntax
	The scheme name consists of a sequence of characters beginning with a letter and followed by any
	combination of letters, digits, plus ("+"), period ("."), or hyphen ("-"). Although schemes are
	case-insensitive, the canonical form is lowercase and documents that specify schemes must do so
	with lowercase letters. It is followed by a colon (":").
	*/
	$protocol = ( isset( $matches[0] ) ? $matches[0] : '' );
	return yourls_apply_filter( 'get_protocol', $protocol, $url );
}

/**
 * Get relative URL (eg 'abc' from 'http://sho.rt/abc')
 *
 * Treat indifferently http & https. If a URL isn't relative to the YOURLS install, return it as is
 * or return empty string if $strict is true
 *
 * @since 1.6
 * @param string $url URL to relativize
 * @param bool $strict if true and if URL isn't relative to YOURLS install, return empty string
 * @return string URL
 */
function yourls_get_relative_url( $url, $strict = true ) {
	$url = yourls_sanitize_url( $url );

	// Remove protocols to make it easier
	$noproto_url  = str_replace( 'https:', 'http:', $url );
	$noproto_site = str_replace( 'https:', 'http:', yourls_get_yourls_site() );

	// Trim URL from YOURLS root URL : if no modification made, URL wasn't relative
	$_url = str_replace( $noproto_site . '/', '', $noproto_url );
	if( $_url == $noproto_url )
		$_url = ( $strict ? '' : $url );

	return yourls_apply_filter( 'get_relative_url', $_url, $url );
}

/**
 * Marks a function as deprecated and informs when it has been used. Stolen from WP.
 *
 * There is a hook deprecated_function that will be called that can be used
 * to get the backtrace up to what file and function called the deprecated
 * function.
 *
 * The current behavior is to trigger a user error if YOURLS_DEBUG is true.
 *
 * This function is to be used in every function that is deprecated.
 *
 * @since 1.6
 * @uses yourls_do_action() Calls 'deprecated_function' and passes the function name, what to use instead,
 *   and the version the function was deprecated in.
 * @uses yourls_apply_filter() Calls 'deprecated_function_trigger_error' and expects boolean value of true to do
 *   trigger or false to not trigger error.
 *
 * @param string $function The function that was called
 * @param string $version The version of WordPress that deprecated the function
 * @param string $replacement Optional. The function that should have been called
 */
function yourls_deprecated_function( $function, $version, $replacement = null ) {

	yourls_do_action( 'deprecated_function', $function, $replacement, $version );

	// Allow plugin to filter the output error trigger
	if ( yourls_get_debug_mode() && yourls_apply_filter( 'deprecated_function_trigger_error', true ) ) {
		if ( ! is_null( $replacement ) )
			trigger_error( sprintf( yourls__('%1$s is <strong>deprecated</strong> since version %2$s! Use %3$s instead.'), $function, $version, $replacement ) );
		else
			trigger_error( sprintf( yourls__('%1$s is <strong>deprecated</strong> since version %2$s with no alternative available.'), $function, $version ) );
	}
}

/**
 * Return the value if not an empty string
 *
 * Used with array_filter(), to remove empty keys but not keys with value 0 or false
 *
 * @since 1.6
 * @param mixed $val Value to test against ''
 * @return bool True if not an empty string
 */
function yourls_return_if_not_empty_string( $val ) {
	return( $val !== '' );
}

/**
 * Explode a URL in an array of ( 'protocol' , 'slashes if any', 'rest of the URL' )
 *
 * Some hosts trip up when a query string contains 'http://' - see http://git.io/j1FlJg
 * The idea is that instead of passing the whole URL to a bookmarklet, eg index.php?u=http://blah.com,
 * we pass it by pieces to fool the server, eg index.php?proto=http:&slashes=//&rest=blah.com
 *
 * Known limitation: this won't work if the rest of the URL itself contains 'http://', for example
 * if rest = blah.com/file.php?url=http://foo.com
 *
 * Sample returns:
 *
 *   with 'mailto:jsmith@example.com?subject=hey' :
 *   array( 'protocol' => 'mailto:', 'slashes' => '', 'rest' => 'jsmith@example.com?subject=hey' )
 *
 *   with 'http://example.com/blah.html' :
 *   array( 'protocol' => 'http:', 'slashes' => '//', 'rest' => 'example.com/blah.html' )
 *
 * @since 1.7
 * @param string $url URL to be parsed
 * @param array $array Optional, array of key names to be used in returned array
 * @return mixed false if no protocol found, array of ('protocol' , 'slashes', 'rest') otherwise
 */
function yourls_get_protocol_slashes_and_rest( $url, $array = array( 'protocol', 'slashes', 'rest' ) ) {
	$proto = yourls_get_protocol( $url );

	if( !$proto or count( $array ) != 3 )
		return false;

	list( $null, $rest ) = explode( $proto, $url, 2 );

	list( $proto, $slashes ) = explode( ':', $proto );

	return array( $array[0] => $proto . ':', $array[1] => $slashes, $array[2] => $rest );
}

/**
 * Set URL scheme (to HTTP or HTTPS)
 *
 * @since 1.7.1
 * @param string $url URL
 * @param string $scheme scheme, either 'http' or 'https'
 * @return string URL with chosen scheme
 */
function yourls_set_url_scheme( $url, $scheme = false ) {
    if( $scheme != 'http' && $scheme != 'https' ) {
        return $url;
    }
    return preg_replace( '!^[a-zA-Z0-9\+\.-]+://!', $scheme . '://', $url );
}

/**
 * Tell if there is a new YOURLS version
 *
 * This function checks, if needed, if there's a new version of YOURLS and, if applicable, display
 * an update notice.
 *
 * @since 1.7.3
 */
function yourls_tell_if_new_version() {
    $check = yourls_maybe_check_core_version();
    yourls_debug_log( 'Check for new version: ' . ($check ? 'yes' : 'no') );
    yourls_new_core_version_notice();
}
