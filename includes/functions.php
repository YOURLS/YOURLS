<?php
/*
 * YOURLS
 * Function library
 */

/**
 * Determine the allowed character set in short URLs
 *
 */
function yourls_get_shorturl_charset() {
	static $charset = null;
	if( $charset !== null )
		return $charset;

    if( defined('YOURLS_URL_CONVERT') && in_array( YOURLS_URL_CONVERT, array( 62, 64 ) ) ) {
        $charset = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    } else {
        // defined to 36, or wrongly defined
        $charset = '0123456789abcdefghijklmnopqrstuvwxyz';
    }

	$charset = yourls_apply_filter( 'get_shorturl_charset', $charset );
	return $charset;
}

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
 * Is a URL a short URL? Accept either 'http://sho.rt/abc' or 'abc'
 *
 */
function yourls_is_shorturl( $shorturl ) {
	// TODO: make sure this function evolves with the feature set.

	$is_short = false;

	// Is $shorturl a URL (http://sho.rt/abc) or a keyword (abc) ?
	if( yourls_get_protocol( $shorturl ) ) {
		$keyword = yourls_get_relative_url( $shorturl );
	} else {
		$keyword = $shorturl;
	}

	// Check if it's a valid && used keyword
	if( $keyword && $keyword == yourls_sanitize_string( $keyword ) && yourls_keyword_is_taken( $keyword ) ) {
		$is_short = true;
	}

	return yourls_apply_filter( 'is_shorturl', $is_short, $shorturl );
}

/**
 * Check to see if a given keyword is reserved (ie reserved URL or an existing page). Returns bool
 *
 */
function yourls_keyword_is_reserved( $keyword ) {
	global $yourls_reserved_URL;
	$keyword = yourls_sanitize_keyword( $keyword );
	$reserved = false;

	if ( in_array( $keyword, $yourls_reserved_URL)
		or file_exists( YOURLS_ABSPATH ."/pages/$keyword.php" )
		or is_dir( YOURLS_ABSPATH ."/$keyword" )
	)
		$reserved = true;

	return yourls_apply_filter( 'keyword_is_reserved', $reserved, $keyword );
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
 */
function yourls_get_next_decimal() {
	return yourls_apply_filter( 'get_next_decimal', (int)yourls_get_option( 'next_id' ) );
}

/**
 * Update id for next link with no custom keyword
 *
 */
function yourls_update_next_decimal( $int = '' ) {
	$int = ( $int == '' ) ? yourls_get_next_decimal() + 1 : (int)$int ;
	$update = yourls_update_option( 'next_id', $int );
	yourls_do_action( 'update_next_decimal', $int, $update );
	return $update;
}

/**
 * Delete a link in the DB
 *
 */
function yourls_delete_link_by_keyword( $keyword ) {
	// Allow plugins to short-circuit the whole function
	$pre = yourls_apply_filter( 'shunt_delete_link_by_keyword', null, $keyword );
	if ( null !== $pre )
		return $pre;

	global $ydb;

	$table = YOURLS_DB_TABLE_URL;
    $keyword = yourls_sanitize_string($keyword);
    $delete = $ydb->fetchAffected("DELETE FROM `$table` WHERE `keyword` = :keyword", array('keyword' => $keyword));
	yourls_do_action( 'delete_link', $keyword, $delete );
	return $delete;
}

/**
 * SQL query to insert a new link in the DB. Returns boolean for success or failure of the inserting
 *
 */
function yourls_insert_link_in_db( $url, $keyword, $title = '' ) {
	global $ydb;

    $url       = yourls_sanitize_url($url);
    $keyword   = yourls_sanitize_keyword($keyword);
    $title     = yourls_sanitize_title($title);
    $timestamp = date('Y-m-d H:i:s');
    $ip        = yourls_get_IP();

    $table = YOURLS_DB_TABLE_URL;
    $binds = array(
        'keyword'   => $keyword,
        'url'       => $url,
        'title'     => $title,
        'timestamp' => $timestamp,
        'ip'        => $ip,
    );
    $insert = $ydb->fetchAffected("INSERT INTO `$table` (`keyword`, `url`, `title`, `timestamp`, `ip`, `clicks`) VALUES(:keyword, :url, :title, :timestamp, :ip, 0);", $binds);

	yourls_do_action( 'insert_link', (bool)$insert, $url, $keyword, $title, $timestamp, $ip );

	return (bool)$insert;
}

/**
 * Check if a long URL already exists in the DB. Return NULL (doesn't exist) or an object with URL informations.
 *
 * @since 1.5.1
 * @param  string $url  URL to check if already shortened
 * @return mixed        NULL if does not already exist in DB, or object with URL information as properties (eg keyword, url, title, ...)
 */
function yourls_url_exists( $url ) {
	// Allow plugins to short-circuit the whole function
	$pre = yourls_apply_filter( 'shunt_url_exists', false, $url );
	if ( false !== $pre )
		return $pre;

	global $ydb;
	$table = YOURLS_DB_TABLE_URL;
    $url   = yourls_sanitize_url($url);
	$url_exists = $ydb->fetchObject("SELECT * FROM `$table` WHERE `url` = :url", array('url'=>$url));

    if ($url_exists === false) {
        $url_exists = NULL;
    }

	return yourls_apply_filter( 'url_exists', $url_exists, $url );
}

/**
 * Add a new link in the DB, either with custom keyword, or find one
 *
 */
function yourls_add_new_link( $url, $keyword = '', $title = '' ) {
	// Allow plugins to short-circuit the whole function
	$pre = yourls_apply_filter( 'shunt_add_new_link', false, $url, $keyword, $title );
	if ( false !== $pre )
		return $pre;

	$url = yourls_encodeURI( $url );
	$url = yourls_sanitize_url( $url );
	if ( !$url || $url == 'http://' || $url == 'https://' ) {
		$return['status']    = 'fail';
		$return['code']      = 'error:nourl';
		$return['message']   = yourls__( 'Missing or malformed URL' );
		$return['errorCode'] = '400';
		return yourls_apply_filter( 'add_new_link_fail_nourl', $return, $url, $keyword, $title );
	}

	// Prevent DB flood
	$ip = yourls_get_IP();
	yourls_check_IP_flood( $ip );

	// Prevent internal redirection loops: cannot shorten a shortened URL
	if( yourls_get_relative_url( $url ) ) {
		if( yourls_is_shorturl( $url ) ) {
			$return['status']    = 'fail';
			$return['code']      = 'error:noloop';
			$return['message']   = yourls__( 'URL is a short URL' );
			$return['errorCode'] = '400';
			return yourls_apply_filter( 'add_new_link_fail_noloop', $return, $url, $keyword, $title );
		}
	}

	yourls_do_action( 'pre_add_new_link', $url, $keyword, $title );

	$strip_url = stripslashes( $url );
	$return = array();

	// duplicates allowed or new URL => store it
	if( yourls_allow_duplicate_longurls() || !( $url_exists = yourls_url_exists( $url ) ) ) {

		if( isset( $title ) && !empty( $title ) ) {
			$title = yourls_sanitize_title( $title );
		} else {
			$title = yourls_get_remote_title( $url );
		}
		$title = yourls_apply_filter( 'add_new_title', $title, $url, $keyword );

		// Custom keyword provided
		if ( $keyword ) {

			yourls_do_action( 'add_new_link_custom_keyword', $url, $keyword, $title );

			$keyword = yourls_sanitize_string( $keyword );
			$keyword = yourls_apply_filter( 'custom_keyword', $keyword, $url, $title );
			if ( !yourls_keyword_is_free( $keyword ) ) {
				// This shorturl either reserved or taken already
				$return['status']  = 'fail';
				$return['code']    = 'error:keyword';
				$return['message'] = yourls_s( 'Short URL %s already exists in database or is reserved', $keyword );
			} else {
				// all clear, store !
				yourls_insert_link_in_db( $url, $keyword, $title );
				$return['url']      = array('keyword' => $keyword, 'url' => $strip_url, 'title' => $title, 'date' => date('Y-m-d H:i:s'), 'ip' => $ip );
				$return['status']   = 'success';
				$return['message']  = /* //translators: eg "http://someurl/ added to DB" */ yourls_s( '%s added to database', yourls_trim_long_string( $strip_url ) );
				$return['title']    = $title;
				$return['html']     = yourls_table_add_row( $keyword, $url, $title, $ip, 0, time() );
				$return['shorturl'] = YOURLS_SITE .'/'. $keyword;
			}

		// Create random keyword
		} else {

			yourls_do_action( 'add_new_link_create_keyword', $url, $keyword, $title );

			$timestamp = date( 'Y-m-d H:i:s' );
			$id = yourls_get_next_decimal();
			$ok = false;
			do {
				$keyword = yourls_int2string( $id );
				$keyword = yourls_apply_filter( 'random_keyword', $keyword, $url, $title );
				if ( yourls_keyword_is_free($keyword) ) {
					if (yourls_insert_link_in_db( $url, $keyword, $title )){
						// everything ok, populate needed vars
						$return['url']      = array('keyword' => $keyword, 'url' => $strip_url, 'title' => $title, 'date' => $timestamp, 'ip' => $ip );
						$return['status']   = 'success';
						$return['message']  = /* //translators: eg "http://someurl/ added to DB" */ yourls_s( '%s added to database', yourls_trim_long_string( $strip_url ) );
						$return['title']    = $title;
						$return['html']     = yourls_table_add_row( $keyword, $url, $title, $ip, 0, time() );
						$return['shorturl'] = YOURLS_SITE .'/'. $keyword;
					} else {
						// database error, couldnt store result
						$return['status']   = 'fail';
						$return['code']     = 'error:db';
						$return['message']  = yourls_s( 'Error saving url to database' );
					}
					$ok = true;
				}
				$id++;
			} while ( !$ok );
			@yourls_update_next_decimal( $id );
		}

	// URL was already stored
	} else {

		yourls_do_action( 'add_new_link_already_stored', $url, $keyword, $title );

		$return['status']   = 'fail';
		$return['code']     = 'error:url';
		$return['url']      = array( 'keyword' => $url_exists->keyword, 'url' => $strip_url, 'title' => $url_exists->title, 'date' => $url_exists->timestamp, 'ip' => $url_exists->ip, 'clicks' => $url_exists->clicks );
		$return['message']  = /* //translators: eg "http://someurl/ already exists" */ yourls_s( '%s already exists in database', yourls_trim_long_string( $strip_url ) );
		$return['title']    = $url_exists->title;
		$return['shorturl'] = YOURLS_SITE .'/'. $url_exists->keyword;
	}

	yourls_do_action( 'post_add_new_link', $url, $keyword, $title, $return );

	$return['statusCode'] = 200; // regardless of result, this is still a valid request
	return yourls_apply_filter( 'add_new_link', $return, $url, $keyword, $title );
}


/**
 * Edit a link
 *
 */
function yourls_edit_link( $url, $keyword, $newkeyword='', $title='' ) {
	// Allow plugins to short-circuit the whole function
	$pre = yourls_apply_filter( 'shunt_edit_link', null, $keyword, $url, $keyword, $newkeyword, $title );
	if ( null !== $pre )
		return $pre;

	global $ydb;

	$table = YOURLS_DB_TABLE_URL;
	$url = yourls_sanitize_url($url);
	$keyword = yourls_sanitize_string($keyword);
	$title = yourls_sanitize_title($title);
	$newkeyword = yourls_sanitize_string($newkeyword);
	$strip_url = stripslashes( $url );
	$strip_title = stripslashes( $title );

    $old_url = $ydb->fetchValue("SELECT `url` FROM `$table` WHERE `keyword` = :keyword", array('keyword' => $keyword));

	// Check if new URL is not here already
	if ( $old_url != $url && !yourls_allow_duplicate_longurls() ) {
		$new_url_already_there = intval($ydb->fetchValue("SELECT COUNT(keyword) FROM `$table` WHERE `url` = :url;", array('url' => $url)));
	} else {
		$new_url_already_there = false;
	}

	// Check if the new keyword is not here already
	if ( $newkeyword != $keyword ) {
		$keyword_is_ok = yourls_keyword_is_free( $newkeyword );
	} else {
		$keyword_is_ok = true;
	}

	yourls_do_action( 'pre_edit_link', $url, $keyword, $newkeyword, $new_url_already_there, $keyword_is_ok );

	// All clear, update
	if ( ( !$new_url_already_there || yourls_allow_duplicate_longurls() ) && $keyword_is_ok ) {
            $sql   = "UPDATE `$table` SET `url` = :url, `keyword` = :newkeyword, `title` = :title WHERE `keyword` = :keyword";
            $binds = array('url' => $url, 'newkeyword' => $newkeyword, 'title' => $title, 'keyword' => $keyword);
			$update_url = $ydb->fetchAffected($sql, $binds);
		if( $update_url ) {
			$return['url']     = array( 'keyword' => $newkeyword, 'shorturl' => YOURLS_SITE.'/'.$newkeyword, 'url' => $strip_url, 'display_url' => yourls_trim_long_string( $strip_url ), 'title' => $strip_title, 'display_title' => yourls_trim_long_string( $strip_title ) );
			$return['status']  = 'success';
			$return['message'] = yourls__( 'Link updated in database' );
		} else {
			$return['status']  = 'fail';
			$return['message'] = /* //translators: "Error updating http://someurl/ (Shorturl: http://sho.rt/blah)" */ yourls_s( 'Error updating %s (Short URL: %s)', yourls_trim_long_string( $strip_url ), $keyword ) ;
		}

	// Nope
	} else {
		$return['status']  = 'fail';
		$return['message'] = yourls__( 'URL or keyword already exists in database' );
	}

	return yourls_apply_filter( 'edit_link', $return, $url, $keyword, $newkeyword, $title, $new_url_already_there, $keyword_is_ok );
}

/**
 * Update a title link (no checks for duplicates etc..)
 *
 */
function yourls_edit_link_title( $keyword, $title ) {
	// Allow plugins to short-circuit the whole function
	$pre = yourls_apply_filter( 'shunt_edit_link_title', null, $keyword, $title );
	if ( null !== $pre )
		return $pre;

	global $ydb;

	$keyword = yourls_sanitize_keyword( $keyword );
	$title = yourls_sanitize_title( $title );

	$table = YOURLS_DB_TABLE_URL;
	$update = $ydb->fetchAffected("UPDATE `$table` SET `title` = :title WHERE `keyword` = :keyword;", array('title' => $title, 'keyword' => $keyword));

	return $update;
}


/**
 * Check if keyword id is free (ie not already taken, and not reserved). Return bool.
 *
 */
function yourls_keyword_is_free( $keyword ) {
	$free = true;
	if ( yourls_keyword_is_reserved( $keyword ) or yourls_keyword_is_taken( $keyword ) )
		$free = false;

	return yourls_apply_filter( 'keyword_is_free', $free, $keyword );
}

/**
 * Check if a keyword is taken (ie there is already a short URL with this id). Return bool.
 *
 */
function yourls_keyword_is_taken( $keyword ) {

	// Allow plugins to short-circuit the whole function
	$pre = yourls_apply_filter( 'shunt_keyword_is_taken', false, $keyword );
	if ( false !== $pre )
		return $pre;

	global $ydb;
    $keyword = yourls_sanitize_keyword($keyword);
	$taken = false;
	$table = YOURLS_DB_TABLE_URL;

	$already_exists = $ydb->fetchValue("SELECT COUNT(`keyword`) FROM `$table` WHERE `keyword` = :keyword;", array('keyword' => $keyword));
	if ( $already_exists )
		$taken = true;

	return yourls_apply_filter( 'keyword_is_taken', $taken, $keyword );
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
 * Return array of all information associated with keyword. Returns false if keyword not found. Set optional $use_cache to false to force fetching from DB
 *
 * @since 1.4
 * @param  string $keyword    Short URL keyword
 * @param  bool   $use_cache  Default true, set to false to force fetching from DB
 * @return false|object       false if not found, object with URL properties if found
 */
function yourls_get_keyword_infos( $keyword, $use_cache = true ) {
	global $ydb;
	$keyword = yourls_sanitize_string( $keyword );

	yourls_do_action( 'pre_get_keyword', $keyword, $use_cache );

	if( $ydb->has_infos($keyword) && $use_cache === true ) {
		return yourls_apply_filter( 'get_keyword_infos', $ydb->get_infos($keyword), $keyword );
	}

	yourls_do_action( 'get_keyword_not_cached', $keyword );

	$table = YOURLS_DB_TABLE_URL;
	$infos = $ydb->fetchObject("SELECT * FROM `$table` WHERE `keyword` = :keyword", array('keyword' => $keyword));

	if( $infos ) {
		$infos = (array)$infos;
		$ydb->set_infos($keyword, $infos);
	} else {
        // is NULL if not found
        $infos = false;
		$ydb->set_infos($keyword, false);
	}

	return yourls_apply_filter( 'get_keyword_infos', $infos, $keyword );
}

/**
 * Return (string) selected information associated with a keyword. Optional $notfound = string default message if nothing found
 *
 */
function yourls_get_keyword_info( $keyword, $field, $notfound = false ) {

	// Allow plugins to short-circuit the whole function
	$pre = yourls_apply_filter( 'shunt_get_keyword_info', false, $keyword, $field, $notfound );
	if ( false !== $pre )
		return $pre;

	$keyword = yourls_sanitize_string( $keyword );
	$infos = yourls_get_keyword_infos( $keyword );

	$return = $notfound;
	if ( isset( $infos[ $field ] ) && $infos[ $field ] !== false )
		$return = $infos[ $field ];

	return yourls_apply_filter( 'get_keyword_info', $return, $keyword, $field, $notfound );
}

/**
 * Return title associated with keyword. Optional $notfound = string default message if nothing found
 *
 */
function yourls_get_keyword_title( $keyword, $notfound = false ) {
	return yourls_get_keyword_info( $keyword, 'title', $notfound );
}

/**
 * Return long URL associated with keyword. Optional $notfound = string default message if nothing found
 *
 */
function yourls_get_keyword_longurl( $keyword, $notfound = false ) {
	return yourls_get_keyword_info( $keyword, 'url', $notfound );
}

/**
 * Return number of clicks on a keyword. Optional $notfound = string default message if nothing found
 *
 */
function yourls_get_keyword_clicks( $keyword, $notfound = false ) {
	return yourls_get_keyword_info( $keyword, 'clicks', $notfound );
}

/**
 * Return IP that added a keyword. Optional $notfound = string default message if nothing found
 *
 */
function yourls_get_keyword_IP( $keyword, $notfound = false ) {
	return yourls_get_keyword_info( $keyword, 'ip', $notfound );
}

/**
 * Return timestamp associated with a keyword. Optional $notfound = string default message if nothing found
 *
 */
function yourls_get_keyword_timestamp( $keyword, $notfound = false ) {
	return yourls_get_keyword_info( $keyword, 'timestamp', $notfound );
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
				'shorturl' => YOURLS_SITE .'/'. $res->keyword,
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
 * Return array of stats. (string)$filter is 'bottom', 'last', 'rand' or 'top'. (int)$limit is the number of links to return
 *
 */
function yourls_get_link_stats( $shorturl ) {
	global $ydb;

	$table_url = YOURLS_DB_TABLE_URL;
	$shorturl  = yourls_sanitize_keyword( $shorturl );

    $res = $ydb->fetchObject("SELECT * FROM `$table_url` WHERE `keyword` = :keyword", array('keyword' => $shorturl));
	$return = array();

	if( !$res ) {
		// non existent link
		$return = array(
			'statusCode' => 404,
			'message'    => 'Error: short URL not found',
		);
	} else {
		$return = array(
			'statusCode' => 200,
			'message'    => 'success',
			'link'       => array(
				'shorturl' => YOURLS_SITE .'/'. $res->keyword,
				'url'      => $res->url,
				'title'    => $res->title,
				'timestamp'=> $res->timestamp,
				'ip'       => $res->ip,
				'clicks'   => $res->clicks,
			)
		);
	}

	return yourls_apply_filter( 'get_link_stats', $return, $shorturl );
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

	return yourls_apply_filter( 'get_user_agent', substr( $ua, 0, 254 ) );
}

/**
 * Redirect to another page
 *
 */
function yourls_redirect( $location, $code = 301 ) {
	yourls_do_action( 'pre_redirect', $location, $code );
	$location = yourls_apply_filter( 'redirect_location', $location, $code );
	$code     = yourls_apply_filter( 'redirect_code', $code, $location );
	// Redirect, either properly if possible, or via Javascript otherwise
	if( !headers_sent() ) {
		yourls_status_header( $code );
		header( "Location: $location" );
	} else {
		yourls_redirect_javascript( $location );
	}
	die();
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
 * Converts an IP to a 2 letter country code, using GeoIP database if available in includes/geo/
 *
 * @since 1.4
 * @param string $ip IP or, if empty string, will be current user IP
 * @param string $defaut Default string to return if IP doesn't resolve to a country (malformed, private IP...)
 * @return string 2 letter country code (eg 'US') or $default
 */
function yourls_geo_ip_to_countrycode( $ip = '', $default = '' ) {
	// Allow plugins to short-circuit the Geo IP API
	$location = yourls_apply_filter( 'shunt_geo_ip_to_countrycode', false, $ip, $default ); // at this point $ip can be '', check if your plugin hooks in here
	if ( false !== $location )
		return $location;

	if ( $ip == '' )
		$ip = yourls_get_IP();

    // Allow plugins to stick to YOURLS internals but provide another DB
    $db = yourls_apply_filter('geo_ip_path_to_db', YOURLS_INC.'/geo/GeoLite2-Country.mmdb');
    if (!is_readable($db)) {
        return $default;
    }

    $reader = new \GeoIp2\Database\Reader($db);
    try {
        $record = $reader->country($ip);
        $location = $record->country->isoCode; // eg 'US'
    } catch (\Exception $e) {
        /*
        Unused for now, Exception and $e->getMessage() can be one of :

        - Exception: \GeoIp2\Exception\AddressNotFoundException
          When: valid IP not found
          Error message: "The address 10.0.0.30 is not in the database"

        - Exception: \InvalidArgumentException
          When: IP is not valid, or DB not readable
          Error message: "The value "10.0.0.300" is not a valid IP address", "The file "/path/to/GeoLite2-Country.mmdb" does not exist or is not readable"

        - Exception: \MaxMind\Db\Reader\InvalidDatabaseException
          When: DB is readable but is corrupt or invalid
          Error message: "The MaxMind DB file's search tree is corrupt"

        - or obviously \Exception for any other error (?)
        */
        $location = $default;
    }

    return yourls_apply_filter( 'geo_ip_to_countrycode', $location, $ip, $default );
}

/**
 * Converts a 2 letter country code to long name (ie AU -> Australia)
 *
 * This associative array is the one used by MaxMind internal functions, it may differ from other lists (eg "A1" does not universally stand for "Anon proxy")
 *
 * @since 1.4
 * @param string $code 2 letter country code, eg 'FR'
 * @return string Country long name (eg 'France') or an empty string if not found
 */
function yourls_geo_countrycode_to_countryname( $code ) {
	// Allow plugins to short-circuit the function
	$country = yourls_apply_filter( 'shunt_geo_countrycode_to_countryname', false, $code );
	if ( false !== $country )
		return $country;

    // Weeeeeeeeeeee
    $countries = array(
        'A1' => 'Anonymous Proxy', 'A2' => 'Satellite Provider', 'AD' => 'Andorra', 'AE' => 'United Arab Emirates', 'AF' => 'Afghanistan',
        'AG' => 'Antigua and Barbuda', 'AI' => 'Anguilla', 'AL' => 'Albania', 'AM' => 'Armenia', 'AO' => 'Angola',
        'AP' => 'Asia/Pacific Region', 'AQ' => 'Antarctica', 'AR' => 'Argentina', 'AS' => 'American Samoa', 'AT' => 'Austria',
        'AU' => 'Australia', 'AW' => 'Aruba', 'AX' => 'Aland Islands', 'AZ' => 'Azerbaijan', 'BA' => 'Bosnia and Herzegovina',
        'BB' => 'Barbados', 'BD' => 'Bangladesh', 'BE' => 'Belgium', 'BF' => 'Burkina Faso', 'BG' => 'Bulgaria',
        'BH' => 'Bahrain', 'BI' => 'Burundi', 'BJ' => 'Benin', 'BL' => 'Saint Barthelemy', 'BM' => 'Bermuda',
        'BN' => 'Brunei Darussalam', 'BO' => 'Bolivia', 'BQ' => 'Bonaire, Saint Eustatius and Saba', 'BR' => 'Brazil', 'BS' => 'Bahamas',
        'BT' => 'Bhutan', 'BV' => 'Bouvet Island', 'BW' => 'Botswana', 'BY' => 'Belarus', 'BZ' => 'Belize',
        'CA' => 'Canada', 'CC' => 'Cocos (Keeling) Islands', 'CD' => 'Congo, The Democratic Republic of the', 'CF' => 'Central African Republic', 'CG' => 'Congo',
        'CH' => 'Switzerland', 'CI' => 'Cote D\'Ivoire', 'CK' => 'Cook Islands', 'CL' => 'Chile', 'CM' => 'Cameroon',
        'CN' => 'China', 'CO' => 'Colombia', 'CR' => 'Costa Rica', 'CU' => 'Cuba', 'CV' => 'Cape Verde',
        'CW' => 'Curacao', 'CX' => 'Christmas Island', 'CY' => 'Cyprus', 'CZ' => 'Czech Republic', 'DE' => 'Germany',
        'DJ' => 'Djibouti', 'DK' => 'Denmark', 'DM' => 'Dominica', 'DO' => 'Dominican Republic', 'DZ' => 'Algeria',
        'EC' => 'Ecuador', 'EE' => 'Estonia', 'EG' => 'Egypt', 'EH' => 'Western Sahara', 'ER' => 'Eritrea',
        'ES' => 'Spain', 'ET' => 'Ethiopia', 'EU' => 'Europe', 'FI' => 'Finland', 'FJ' => 'Fiji',
        'FK' => 'Falkland Islands (Malvinas)', 'FM' => 'Micronesia, Federated States of', 'FO' => 'Faroe Islands', 'FR' => 'France', 'GA' => 'Gabon',
        'GB' => 'United Kingdom', 'GD' => 'Grenada', 'GE' => 'Georgia', 'GF' => 'French Guiana', 'GG' => 'Guernsey',
        'GH' => 'Ghana', 'GI' => 'Gibraltar', 'GL' => 'Greenland', 'GM' => 'Gambia', 'GN' => 'Guinea',
        'GP' => 'Guadeloupe', 'GQ' => 'Equatorial Guinea', 'GR' => 'Greece', 'GS' => 'South Georgia and the South Sandwich Islands', 'GT' => 'Guatemala',
        'GU' => 'Guam', 'GW' => 'Guinea-Bissau', 'GY' => 'Guyana', 'HK' => 'Hong Kong', 'HM' => 'Heard Island and McDonald Islands',
        'HN' => 'Honduras', 'HR' => 'Croatia', 'HT' => 'Haiti', 'HU' => 'Hungary', 'ID' => 'Indonesia',
        'IE' => 'Ireland', 'IL' => 'Israel', 'IM' => 'Isle of Man', 'IN' => 'India', 'IO' => 'British Indian Ocean Territory',
        'IQ' => 'Iraq', 'IR' => 'Iran, Islamic Republic of', 'IS' => 'Iceland', 'IT' => 'Italy', 'JE' => 'Jersey',
        'JM' => 'Jamaica', 'JO' => 'Jordan', 'JP' => 'Japan', 'KE' => 'Kenya', 'KG' => 'Kyrgyzstan',
        'KH' => 'Cambodia', 'KI' => 'Kiribati', 'KM' => 'Comoros', 'KN' => 'Saint Kitts and Nevis', 'KP' => 'Korea, Democratic People\'s Republic of',
        'KR' => 'Korea, Republic of', 'KW' => 'Kuwait', 'KY' => 'Cayman Islands', 'KZ' => 'Kazakhstan', 'LA' => 'Lao People\'s Democratic Republic',
        'LB' => 'Lebanon', 'LC' => 'Saint Lucia', 'LI' => 'Liechtenstein', 'LK' => 'Sri Lanka', 'LR' => 'Liberia',
        'LS' => 'Lesotho', 'LT' => 'Lithuania', 'LU' => 'Luxembourg', 'LV' => 'Latvia', 'LY' => 'Libya',
        'MA' => 'Morocco', 'MC' => 'Monaco', 'MD' => 'Moldova, Republic of', 'ME' => 'Montenegro', 'MF' => 'Saint Martin',
        'MG' => 'Madagascar', 'MH' => 'Marshall Islands', 'MK' => 'Macedonia', 'ML' => 'Mali', 'MM' => 'Myanmar',
        'MN' => 'Mongolia', 'MO' => 'Macau', 'MP' => 'Northern Mariana Islands', 'MQ' => 'Martinique', 'MR' => 'Mauritania',
        'MS' => 'Montserrat', 'MT' => 'Malta', 'MU' => 'Mauritius', 'MV' => 'Maldives', 'MW' => 'Malawi',
        'MX' => 'Mexico', 'MY' => 'Malaysia', 'MZ' => 'Mozambique', 'NA' => 'Namibia', 'NC' => 'New Caledonia',
        'NE' => 'Niger', 'NF' => 'Norfolk Island', 'NG' => 'Nigeria', 'NI' => 'Nicaragua', 'NL' => 'Netherlands',
        'NO' => 'Norway', 'NP' => 'Nepal', 'NR' => 'Nauru', 'NU' => 'Niue', 'NZ' => 'New Zealand',
        'O1' => 'Other', 'OM' => 'Oman', 'PA' => 'Panama', 'PE' => 'Peru', 'PF' => 'French Polynesia',
        'PG' => 'Papua New Guinea', 'PH' => 'Philippines', 'PK' => 'Pakistan', 'PL' => 'Poland', 'PM' => 'Saint Pierre and Miquelon',
        'PN' => 'Pitcairn Islands', 'PR' => 'Puerto Rico', 'PS' => 'Palestinian Territory', 'PT' => 'Portugal', 'PW' => 'Palau',
        'PY' => 'Paraguay', 'QA' => 'Qatar', 'RE' => 'Reunion', 'RO' => 'Romania', 'RS' => 'Serbia',
        'RU' => 'Russian Federation', 'RW' => 'Rwanda', 'SA' => 'Saudi Arabia', 'SB' => 'Solomon Islands', 'SC' => 'Seychelles',
        'SD' => 'Sudan', 'SE' => 'Sweden', 'SG' => 'Singapore', 'SH' => 'Saint Helena', 'SI' => 'Slovenia',
        'SJ' => 'Svalbard and Jan Mayen', 'SK' => 'Slovakia', 'SL' => 'Sierra Leone', 'SM' => 'San Marino', 'SN' => 'Senegal',
        'SO' => 'Somalia', 'SR' => 'Suriname', 'SS' => 'South Sudan', 'ST' => 'Sao Tome and Principe', 'SV' => 'El Salvador',
        'SX' => 'Sint Maarten (Dutch part)', 'SY' => 'Syrian Arab Republic', 'SZ' => 'Swaziland', 'TC' => 'Turks and Caicos Islands', 'TD' => 'Chad',
        'TF' => 'French Southern Territories', 'TG' => 'Togo', 'TH' => 'Thailand', 'TJ' => 'Tajikistan', 'TK' => 'Tokelau',
        'TL' => 'Timor-Leste', 'TM' => 'Turkmenistan', 'TN' => 'Tunisia', 'TO' => 'Tonga', 'TR' => 'Turkey',
        'TT' => 'Trinidad and Tobago', 'TV' => 'Tuvalu', 'TW' => 'Taiwan', 'TZ' => 'Tanzania, United Republic of', 'UA' => 'Ukraine',
        'UG' => 'Uganda', 'UM' => 'United States Minor Outlying Islands', 'US' => 'United States', 'UY' => 'Uruguay', 'UZ' => 'Uzbekistan',
        'VA' => 'Holy See (Vatican City State)', 'VC' => 'Saint Vincent and the Grenadines', 'VE' => 'Venezuela', 'VG' => 'Virgin Islands, British', 'VI' => 'Virgin Islands, U.S.',
        'VN' => 'Vietnam', 'VU' => 'Vanuatu', 'WF' => 'Wallis and Futuna', 'WS' => 'Samoa', 'YE' => 'Yemen',
        'YT' => 'Mayotte', 'ZA' => 'South Africa', 'ZM' => 'Zambia', 'ZW' => 'Zimbabwe',
    );

    $code = strtoupper($code);
    if(array_key_exists($code, $countries)) {
        $name = $countries[$code];
    } else {
        $name = '';
    }

    return yourls_apply_filter( 'geo_countrycode_to_countryname', $name );
}

/**
 * Return flag URL from 2 letter country code
 *
 */
function yourls_geo_get_flag( $code ) {
	if( file_exists( YOURLS_INC.'/geo/flags/flag_'.strtolower($code).'.gif' ) ) {
		$img = yourls_match_current_protocol( YOURLS_SITE.'/includes/geo/flags/flag_'.( strtolower( $code ) ).'.gif' );
	} else {
		$img = false;
	}
	return yourls_apply_filter( 'geo_get_flag', $img, $code );
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
 * Read an option from DB (or from cache if available). Return value or $default if not found
 *
 * Pretty much stolen from WordPress
 *
 * @since 1.4
 * @param string $option_name Option name. Expected to not be SQL-escaped.
 * @param mixed $default Optional value to return if option doesn't exist. Default false.
 * @return mixed Value set for the option.
 */
function yourls_get_option( $option_name, $default = false ) {
	// Allow plugins to short-circuit options
	$pre = yourls_apply_filter( 'shunt_option_'.$option_name, false );
	if ( false !== $pre )
		return $pre;

	global $ydb;
    $option = new \YOURLS\Database\Options($ydb);
    $value  = $option->get($option_name, $default);

    return yourls_apply_filter( 'get_option_'.$option_name, $value );
}

/**
 * Read all options from DB at once
 *
 * The goal is to read all options at once and then populate array $ydb->option, to prevent further
 * SQL queries if we need to read an option value later.
 * It's also a simple check whether YOURLS is installed or not (no option = assuming not installed) after
 * a check for DB server reachability has been performed
 *
 * @since 1.4
 */
function yourls_get_all_options() {
	// Allow plugins to short-circuit all options. (Note: regular plugins are loaded after all options)
	$pre = yourls_apply_filter( 'shunt_all_options', false );
	if ( false !== $pre )
		return $pre;

	global $ydb;
    $options = new \YOURLS\Database\Options($ydb);

    if ($options->get_all_options() === false) {
		// Zero option found but no unexpected error so far: YOURLS isn't installed
        yourls_set_installed(false);
        return;
    }

	yourls_set_installed(true);
}

/**
 * Update (add if doesn't exist) an option to DB
 *
 * Pretty much stolen from WordPress
 *
 * @since 1.4
 * @param string $option_name Option name. Expected to not be SQL-escaped.
 * @param mixed $newvalue Option value. Must be serializable if non-scalar. Expected to not be SQL-escaped.
 * @return bool False if value was not updated, true otherwise.
 */
function yourls_update_option( $option_name, $newvalue ) {
	global $ydb;

    $option = new \YOURLS\Database\Options($ydb);
    $update = $option->update($option_name, $newvalue);

    return $update;
}

/**
 * Add an option to the DB
 *
 * Pretty much stolen from WordPress
 *
 * @since 1.4
 * @param string $name Name of option to add. Expected to not be SQL-escaped.
 * @param mixed $value Optional option value. Must be serializable if non-scalar. Expected to not be SQL-escaped.
 * @return bool False if option was not added and true otherwise.
 */
function yourls_add_option( $name, $value = '' ) {
	global $ydb;

    $option = new \YOURLS\Database\Options($ydb);
    $add    = $option->add($name, $value);

    return $add;
}


/**
 * Delete an option from the DB
 *
 * Pretty much stolen from WordPress
 *
 * @since 1.4
 * @param string $name Option name to delete. Expected to not be SQL-escaped.
 * @return bool True, if option is successfully deleted. False on failure.
 */
function yourls_delete_option( $name ) {
	global $ydb;

    $option = new \YOURLS\Database\Options($ydb);
    $delete = $option->delete($name);

    return $delete;
}


/**
 * Serialize data if needed. Stolen from WordPress
 *
 * @since 1.4
 * @param mixed $data Data that might be serialized.
 * @return mixed A scalar data
 */
function yourls_maybe_serialize( $data ) {
	if ( is_array( $data ) || is_object( $data ) )
		return serialize( $data );

	if ( yourls_is_serialized( $data, false ) )
		return serialize( $data );

	return $data;
}

/**
 * Check value to find if it was serialized. Stolen from WordPress
 *
 * @since 1.4
 * @param mixed $data Value to check to see if was serialized.
 * @param bool $strict Optional. Whether to be strict about the end of the string. Defaults true.
 * @return bool False if not serialized and true if it was.
 */
function yourls_is_serialized( $data, $strict = true ) {
	// if it isn't a string, it isn't serialized
	if ( ! is_string( $data ) )
		return false;
	$data = trim( $data );
	 if ( 'N;' == $data )
		return true;
	$length = strlen( $data );
	if ( $length < 4 )
		return false;
	if ( ':' !== $data[1] )
		return false;
	if ( $strict ) {
		$lastc = $data[ $length - 1 ];
		if ( ';' !== $lastc && '}' !== $lastc )
			return false;
	} else {
		$semicolon = strpos( $data, ';' );
		$brace	 = strpos( $data, '}' );
		// Either ; or } must exist.
		if ( false === $semicolon && false === $brace )
			return false;
		// But neither must be in the first X characters.
		if ( false !== $semicolon && $semicolon < 3 )
			return false;
		if ( false !== $brace && $brace < 4 )
			return false;
	}
	$token = $data[0];
	switch ( $token ) {
		case 's' :
			if ( $strict ) {
				if ( '"' !== $data[ $length - 2 ] )
					return false;
			} elseif ( false === strpos( $data, '"' ) ) {
				return false;
			}
			// or else fall through
		case 'a' :
		case 'O' :
			return (bool) preg_match( "/^{$token}:[0-9]+:/s", $data );
		case 'b' :
		case 'i' :
		case 'd' :
			$end = $strict ? '$' : '';
			return (bool) preg_match( "/^{$token}:[0-9.E-]+;$end/", $data );
	}
	return false;
}

/**
 * Unserialize value only if it was serialized. Stolen from WP
 *
 * @since 1.4
 * @param string $original Maybe unserialized original, if is needed.
 * @return mixed Unserialized data can be any type.
 */
function yourls_maybe_unserialize( $original ) {
	if ( yourls_is_serialized( $original ) ) // don't attempt to unserialize data that wasn't serialized going in
		return @unserialize( $original );
	return $original;
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
 * Show login form if required
 *
 */
function yourls_maybe_require_auth() {
	if( yourls_is_private() ) {
		yourls_do_action( 'require_auth' );
		require_once( YOURLS_INC.'/auth.php' );
	} else {
		yourls_do_action( 'require_no_auth' );
	}
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
 * Return array of keywords that redirect to the submitted long URL
 *
 * @since 1.7
 * @param string $longurl long url
 * @param string $order Optional SORT order (can be 'ASC' or 'DESC')
 * @return array array of keywords
 */
function yourls_get_longurl_keywords( $longurl, $order = 'ASC' ) {
	global $ydb;
	$longurl = yourls_sanitize_url($longurl);
	$table   = YOURLS_DB_TABLE_URL;
    $sql     = "SELECT `keyword` FROM `$table` WHERE `url` = :url";

    if (in_array($order, array('ASC','DESC'))) {
        $sql .= " ORDER BY `keyword` ".$order;
    }

    return yourls_apply_filter( 'get_longurl_keywords', $ydb->fetchCol($sql, array('url'=>$longurl)), $longurl );
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
 * Return salted string
 *
 */
function yourls_salt( $string ) {
	$salt = defined('YOURLS_COOKIEKEY') ? YOURLS_COOKIEKEY : md5(__FILE__) ;
	return yourls_apply_filter( 'yourls_salt', md5 ($string . $salt), $string );
}

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
 * Return a time-dependent string for nonce creation
 *
 */
function yourls_tick() {
	return ceil( time() / YOURLS_NONCE_LIFE );
}


/**
 * Create a time limited, action limited and user limited token
 *
 */
function yourls_create_nonce( $action, $user = false ) {
	if( false == $user )
		$user = defined( 'YOURLS_USER' ) ? YOURLS_USER : '-1';
	$tick = yourls_tick();
	$nonce = substr( yourls_salt($tick . $action . $user), 0, 10 );
	// Allow plugins to alter the nonce
	return yourls_apply_filter( 'create_nonce', $nonce, $action, $user );
}

/**
 * Create a nonce field for inclusion into a form
 *
 */
function yourls_nonce_field( $action, $name = 'nonce', $user = false, $echo = true ) {
	$field = '<input type="hidden" id="'.$name.'" name="'.$name.'" value="'.yourls_create_nonce( $action, $user ).'" />';
	if( $echo )
		echo $field."\n";
	return $field;
}

/**
 * Add a nonce to a URL. If URL omitted, adds nonce to current URL
 *
 */
function yourls_nonce_url( $action, $url = false, $name = 'nonce', $user = false ) {
	$nonce = yourls_create_nonce( $action, $user );
	return yourls_add_query_arg( $name, $nonce, $url );
}

/**
 * Check validity of a nonce (ie time span, user and action match).
 *
 * Returns true if valid, dies otherwise (yourls_die() or die($return) if defined)
 * if $nonce is false or unspecified, it will use $_REQUEST['nonce']
 *
 */
function yourls_verify_nonce( $action, $nonce = false, $user = false, $return = '' ) {
	// get user
	if( false == $user )
		$user = defined( 'YOURLS_USER' ) ? YOURLS_USER : '-1';

	// get current nonce value
	if( false == $nonce && isset( $_REQUEST['nonce'] ) )
		$nonce = $_REQUEST['nonce'];

	// Allow plugins to short-circuit the rest of the function
	$valid = yourls_apply_filter( 'verify_nonce', false, $action, $nonce, $user, $return );
	if ($valid) {
		return true;
	}

	// what nonce should be
	$valid = yourls_create_nonce( $action, $user );

	if( $nonce == $valid ) {
		return true;
	} else {
		if( $return )
			die( $return );
		yourls_die( yourls__( 'Unauthorized action or expired link' ), yourls__( 'Error' ), 403 );
	}
}

/**
 * Converts keyword into short link (prepend with YOURLS base URL)
 *
 */
function yourls_link( $keyword = '' ) {
	$link = YOURLS_SITE . '/' . yourls_sanitize_keyword( $keyword );
	return yourls_apply_filter( 'yourls_link', $link, $keyword );
}

/**
 * Converts keyword into stat link (prepend with YOURLS base URL, append +)
 *
 */
function yourls_statlink( $keyword = '' ) {
	$link = YOURLS_SITE . '/' . yourls_sanitize_keyword( $keyword ) . '+';
	if( yourls_is_ssl() )
        $link = yourls_set_url_scheme( $link, 'https' );
	return yourls_apply_filter( 'yourls_statlink', $link, $keyword );
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
 * Return admin link, with SSL preference if applicable.
 *
 */
function yourls_admin_url( $page = '' ) {
	$admin = YOURLS_SITE . '/admin/' . $page;
	if( yourls_is_ssl() or yourls_needs_ssl() ) {
        $admin = yourls_set_url_scheme( $admin, 'https' );
    }
	return yourls_apply_filter( 'admin_url', $admin, $page );
}

/**
 * Return YOURLS_SITE or URL under YOURLS setup, with SSL preference
 *
 */
function yourls_site_url( $echo = true, $url = '' ) {
	$url = yourls_get_relative_url( $url );
	$url = trim( YOURLS_SITE . '/' . $url, '/' );

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
 * it is the current page requested.
 * For testing purposes, parameters can be passed.
 *
 * @since 1.5
 * @param string $yourls_site   Optional, YOURLS installation URL (default to constant YOURLS_SITE)
 * @param string $uri           Optional, page requested (default to $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] eg 'sho.rt/yourls/abcd' )
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
        $yourls_site = YOURLS_SITE;
    }
    if (false === $uri) {
        $uri = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    }

    // Even though the config sample states YOURLS_SITE should be set without trailing slash...
    $yourls_site = rtrim($yourls_site,'/');

    // Ignore protocol & www. prefix
	$root = str_replace( array( 'https://www.', 'http://www.', 'https://', 'http://'  ), '', $yourls_site );
	// Case insensitive comparison of the YOURLS root with the requested URL, to match http://Sho.rt/blah, http://sho.rt/blah, http://www.Sho.rt/blah ...
	$request = preg_replace( "!(?:www\.)?$root/!i", '', $uri, 1 );

	// Unless request looks like a full URL (ie request is a simple keyword) strip query string
	if( !preg_match( "@^[a-zA-Z]+://.+@", $request ) ) {
		$request = current( explode( '?', $request ) );
	}

	return yourls_apply_filter( 'get_request', $request );
}

/**
 * Change protocol to match current scheme used (http or https)
 *
 */
function yourls_match_current_protocol( $url, $normal = 'http://', $ssl = 'https://' ) {
	if( yourls_is_ssl() )
		$url = str_replace( $normal, $ssl, $url );
	return yourls_apply_filter( 'match_current_protocol', $url );
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
 * Shutdown function, runs just before PHP shuts down execution. Stolen from WP
 *
 */
function yourls_shutdown() {
	yourls_do_action( 'shutdown' );
}

/**
 * Auto detect custom favicon in /user directory, fallback to YOURLS favicon, and echo/return its URL
 *
 */
function yourls_favicon( $echo = true ) {
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
		$favicon = yourls_site_url( false ) . '/images/favicon.gif';
	}

	if( $echo ) {
		echo $favicon;
    }
	return $favicon;
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
	$noproto_site = str_replace( 'https:', 'http:', YOURLS_SITE );

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
	if ( YOURLS_DEBUG && yourls_apply_filter( 'deprecated_function_trigger_error', true ) ) {
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
 * Returns true.
 *
 * Useful for returning true to filters easily.
 *
 * @since 1.7.1
 * @return bool True.
 */
function yourls_return_true() {
    return true;
}

/**
 * Returns false.
 *
 * Useful for returning false to filters easily.
 *
 * @since 1.7.1
 * @return bool False.
 */
function yourls_return_false() {
    return false;
}

/**
 * Returns 0.
 *
 * Useful for returning 0 to filters easily.
 *
 * @since 1.7.1
 * @return int 0.
 */
function yourls_return_zero() {
    return 0;
}

/**
 * Returns an empty array.
 *
 * Useful for returning an empty array to filters easily.
 *
 * @since 1.7.1
 * @return array Empty array.
 */
function yourls_return_empty_array() {
    return array();
}

/**
 * Returns null.
 *
 * Useful for returning null to filters easily.
 *
 * @since 1.7.1
 * @return null Null value.
 */
function yourls_return_null() {
    return null;
}

/**
 * Returns an empty string.
 *
 * Useful for returning an empty string to filters easily.
 *
 * @since 1.7.1
 * @return string Empty string.
 */
function yourls_return_empty_string() {
    return '';
}

/**
 * Add a message to the debug log
 *
 * When in debug mode ( YOURLS_DEBUG == true ) the debug log is echoed in yourls_html_footer()
 * Log messages are appended to $ydb->debug_log array, which is instanciated within class ezSQLcore_YOURLS
 *
 * @since 1.7
 * @param string $msg Message to add to the debug log
 * @return string The message itself
 */
function yourls_debug_log( $msg ) {
	global $ydb;
    $ydb->getProfiler()->log($msg);
	return $msg;
}

/**
 * Get the debug log
 *
 * @since  1.7.3
 * @return array
 */
function yourls_get_debug_log() {
	global $ydb;

    // Check if we have a profiler registered (will not be the case if the DB hasn't been properly connected to)
    if ($ydb->getProfiler()) {
        return $ydb->getProfiler()->get_log();
    }

    return array();
}

/**
 * Debug mode toggle
 *
 * @since 1.7.3
 * @param bool $bool  Debug on or off
 */
function yourls_debug_mode($bool) {
    global $ydb;
    $bool = (bool)$bool;

    // log queries if true
    $ydb->getProfiler()->setActive($bool);

    // report notices if true
    if ($bool === true) {
        error_reporting(-1);
    } else {
        error_reporting(E_ERROR | E_PARSE);
    }
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

