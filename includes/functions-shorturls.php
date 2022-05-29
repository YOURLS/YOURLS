<?php
/*
 * Functions relative to short URLs: adding, editing, etc
 * (either proper short URLs ("http://sho.rt/abc") or "keywords" (the "abc" part)
 */


/**
 * Add a new link in the DB, either with custom keyword, or find one
 *
 * The return array will contain at least the following keys:
 *    status: string, 'success' or 'fail'
 *    message: string, a descriptive localized message of what happened in any case
 *    code: string, a short descriptivish and untranslated message describing what happened
 *    errorCode: string, a HTTP status code
 *    statusCode: string, a HTTP status code
 * Depending on the operation, it will contain any of the following keys:
 *    url: array, the short URL creation information, with keys: 'keyword', 'url', 'title', 'date', 'ip', 'clicks'
 *    title: string, the URL title
 *    shorturl: string, the proper short URL in full (eg 'http://sho.rt/abc')
 *    html: string, the HTML part used by the ajax to update the page display if any
 *
 * For compatibility with early consumers and third parties, when people asked for various data and data formats
 * before the internal API was really structured, the return array now collects several redundant information.
 *
 * @param  string $url      URL to shorten
 * @param  string $keyword  optional "keyword"
 * @param  string $title    option title
 * @return array            array with error/success state and short URL information
 */
function yourls_add_new_link( $url, $keyword = '', $title = '' ) {
    // Allow plugins to short-circuit the whole function
    $pre = yourls_apply_filter( 'shunt_add_new_link', false, $url, $keyword, $title );
    if ( false !== $pre ) {
        return $pre;
    }

    /**
     * The result array.
     */
    $return = [
        // Always present :
        'status' => '',
        'code'   => '',
        'message' => '',
        'errorCode' => '',
        'statusCode' => '',
    ];

    // Sanitize URL
    $url = yourls_sanitize_url( $url );
    if ( !$url || $url == 'http://' || $url == 'https://' ) {
        $return['status']    = 'fail';
        $return['code']      = 'error:nourl';
        $return['message']   = yourls__( 'Missing or malformed URL' );
        $return['errorCode'] = $return['statusCode'] = '400'; // 400 Bad Request

        return yourls_apply_filter( 'add_new_link_fail_nourl', $return, $url, $keyword, $title );
    }

    // Prevent DB flood
    $ip = yourls_get_IP();
    yourls_check_IP_flood( $ip );

    // Prevent internal redirection loops: cannot shorten a shortened URL
    if (yourls_is_shorturl($url)) {
        $return['status']    = 'fail';
        $return['code']      = 'error:noloop';
        $return['message']   = yourls__( 'URL is a short URL' );
        $return['errorCode'] = $return['statusCode'] = '400'; // 400 Bad Request
        return yourls_apply_filter( 'add_new_link_fail_noloop', $return, $url, $keyword, $title );
    }

    yourls_do_action( 'pre_add_new_link', $url, $keyword, $title );

    // Check if URL was already stored and we don't accept duplicates
    if ( !yourls_allow_duplicate_longurls() && ($url_exists = yourls_long_url_exists( $url )) ) {
        yourls_do_action( 'add_new_link_already_stored', $url, $keyword, $title );

        $return['status']   = 'fail';
        $return['code']     = 'error:url';
        $return['url']      = array( 'keyword' => $url_exists->keyword, 'url' => $url, 'title' => $url_exists->title, 'date' => $url_exists->timestamp, 'ip' => $url_exists->ip, 'clicks' => $url_exists->clicks );
        $return['message']  = /* //translators: eg "http://someurl/ already exists (short URL: sho.rt/abc)" */ yourls_s('%s already exists in database (short URL: %s)',
            yourls_trim_long_string($url), preg_replace('!https?://!', '',  yourls_get_yourls_site()) . '/'. $url_exists->keyword );
        $return['title']    = $url_exists->title;
        $return['shorturl'] = yourls_link($url_exists->keyword);

        return yourls_apply_filter( 'add_new_link_already_stored_filter', $return, $url, $keyword, $title );
    }

    // Sanitize provided title, or fetch one
    if( isset( $title ) && !empty( $title ) ) {
        $title = yourls_sanitize_title( $title );
    } else {
        $title = yourls_get_remote_title( $url );
    }
    $title = yourls_apply_filter( 'add_new_title', $title, $url, $keyword );

    // Custom keyword provided : sanitize and make sure it's free
    if ($keyword) {
        yourls_do_action( 'add_new_link_custom_keyword', $url, $keyword, $title );

        $keyword = yourls_sanitize_keyword( $keyword, true );
        $keyword = yourls_apply_filter( 'custom_keyword', $keyword, $url, $title );

        if ( !yourls_keyword_is_free( $keyword ) ) {
            // This shorturl either reserved or taken already
            $return['status']  = 'fail';
            $return['code']    = 'error:keyword';
            $return['message'] = yourls_s( 'Short URL %s already exists in database or is reserved', $keyword );
            $return['errorCode'] = $return['statusCode'] = '400'; // 400 Bad Request

            return yourls_apply_filter( 'add_new_link_keyword_exists', $return, $url, $keyword, $title );
        }

        // Create random keyword
    } else {
        yourls_do_action( 'add_new_link_create_keyword', $url, $keyword, $title );

        $id = yourls_get_next_decimal();

        do {
            $keyword = yourls_int2string( $id );
            $keyword = yourls_apply_filter( 'random_keyword', $keyword, $url, $title );
            $id++;
        } while ( !yourls_keyword_is_free($keyword) );

        yourls_update_next_decimal($id);
    }

    // We should be all set now. Store the short URL !

    $timestamp = date( 'Y-m-d H:i:s' );

    try {
        if (yourls_insert_link_in_db( $url, $keyword, $title )){
            // everything ok, populate needed vars
            $return['url']      = array('keyword' => $keyword, 'url' => $url, 'title' => $title, 'date' => $timestamp, 'ip' => $ip );
            $return['status']   = 'success';
            $return['message']  = /* //translators: eg "http://someurl/ added to DB" */ yourls_s( '%s added to database', yourls_trim_long_string( $url ) );
            $return['title']    = $title;
            $return['html']     = yourls_table_add_row( $keyword, $url, $title, $ip, 0, time() );
            $return['shorturl'] = yourls_link($keyword);
            $return['statusCode'] = 200; // 200 OK
        } else {
            // unknown database error, couldn't store result
            $return['status']   = 'fail';
            $return['code']     = 'error:db';
            $return['message']  = yourls_s( 'Error saving url to database' );
            $return['errorCode'] = $return['statusCode'] = '500'; // 500 Internal Server Error
        }
    } catch (Exception $e) {
        // Keyword supposed to be free but the INSERT caused an exception: most likely we're facing a
        // concurrency problem. See Issue 2538.
        $return['status']  = 'fail';
        $return['code']    = 'error:concurrency';
        $return['message'] = $e->getMessage();
        $return['errorCode'] = $return['statusCode'] = '503'; // 503 Service Unavailable
    }

    yourls_do_action( 'post_add_new_link', $url, $keyword, $title, $return );

    return yourls_apply_filter( 'add_new_link', $return, $url, $keyword, $title );
}
/**
 * Determine the allowed character set in short URLs
 *
 * @return string    Acceptable charset for short URLS keywords
 */
function yourls_get_shorturl_charset() {
    if ( defined( 'YOURLS_URL_CONVERT' ) && in_array( YOURLS_URL_CONVERT, [ 62, 64 ] ) ) {
        $charset = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    }
    else {
        // defined to 36, or wrongly defined
        $charset = '0123456789abcdefghijklmnopqrstuvwxyz';
    }

    return yourls_apply_filter( 'get_shorturl_charset', $charset );
}

/**
 * Is a URL a short URL? Accept either 'http://sho.rt/abc' or 'abc'
 *
 * @param  string $shorturl   short URL
 * @return bool               true if registered short URL, false otherwise
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
    if( $keyword && $keyword == yourls_sanitize_keyword( $keyword ) && yourls_keyword_is_taken( $keyword ) ) {
        $is_short = true;
    }

    return yourls_apply_filter( 'is_shorturl', $is_short, $shorturl );
}

/**
 * Check to see if a given keyword is reserved (ie reserved URL or an existing page). Returns bool
 *
 * @param  string $keyword   Short URL keyword
 * @return bool              True if keyword reserved, false if free to be used
 */
function yourls_keyword_is_reserved( $keyword ) {
    global $yourls_reserved_URL;
    $keyword = yourls_sanitize_keyword( $keyword );
    $reserved = false;

    if ( in_array( $keyword, $yourls_reserved_URL)
        or yourls_is_page($keyword)
        or is_dir( YOURLS_ABSPATH ."/$keyword" )
    )
        $reserved = true;

    return yourls_apply_filter( 'keyword_is_reserved', $reserved, $keyword );
}

/**
 * Delete a link in the DB
 *
 * @param  string $keyword   Short URL keyword
 * @return int               Number of links deleted
 */
function yourls_delete_link_by_keyword( $keyword ) {
    // Allow plugins to short-circuit the whole function
    $pre = yourls_apply_filter( 'shunt_delete_link_by_keyword', null, $keyword );
    if ( null !== $pre ) {
        return $pre;
    }

    $table = YOURLS_DB_TABLE_URL;
    $keyword = yourls_sanitize_keyword($keyword);
    $delete = yourls_get_db()->fetchAffected("DELETE FROM `$table` WHERE `keyword` = :keyword", array('keyword' => $keyword));
    yourls_do_action( 'delete_link', $keyword, $delete );
    return $delete;
}

/**
 * SQL query to insert a new link in the DB. Returns boolean for success or failure of the inserting
 *
 * @param string $url
 * @param string $keyword
 * @param string $title
 * @return bool true if insert succeeded, false if failed
 */
function yourls_insert_link_in_db($url, $keyword, $title = '' ) {
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
    $insert = yourls_get_db()->fetchAffected("INSERT INTO `$table` (`keyword`, `url`, `title`, `timestamp`, `ip`, `clicks`) VALUES(:keyword, :url, :title, :timestamp, :ip, 0);", $binds);

    yourls_do_action( 'insert_link', (bool)$insert, $url, $keyword, $title, $timestamp, $ip );

    return (bool)$insert;
}

/**
 * Check if a long URL already exists in the DB. Return NULL (doesn't exist) or an object with URL informations.
 *
 * This function supersedes function yourls_url_exists(), deprecated in 1.7.10, with a better naming.
 *
 * @since 1.7.10
 * @param  string $url  URL to check if already shortened
 * @return mixed        NULL if does not already exist in DB, or object with URL information as properties (eg keyword, url, title, ...)
 */
function yourls_long_url_exists( $url ) {
    // Allow plugins to short-circuit the whole function
    $pre = yourls_apply_filter( 'shunt_url_exists', false, $url );
    if ( false !== $pre ) {
        return $pre;
    }

    $table = YOURLS_DB_TABLE_URL;
    $url   = yourls_sanitize_url($url);
    $url_exists = yourls_get_db()->fetchObject("SELECT * FROM `$table` WHERE `url` = :url", array('url'=>$url));

    if ($url_exists === false) {
        $url_exists = NULL;
    }

    return yourls_apply_filter( 'url_exists', $url_exists, $url );
}

/**
 * Edit a link
 *
 * @param string $url
 * @param string $keyword
 * @param string $newkeyword
 * @param string $title
 * @return array Result of the edit and link information if successful
 */
function yourls_edit_link($url, $keyword, $newkeyword='', $title='' ) {
    // Allow plugins to short-circuit the whole function
    $pre = yourls_apply_filter( 'shunt_edit_link', null, $keyword, $url, $keyword, $newkeyword, $title );
    if ( null !== $pre )
        return $pre;

    $ydb = yourls_get_db();

    $table = YOURLS_DB_TABLE_URL;
    $url = yourls_sanitize_url($url);
    $keyword = yourls_sanitize_keyword($keyword);
    $title = yourls_sanitize_title($title);
    $newkeyword = yourls_sanitize_keyword($newkeyword, true);

    if(!$url OR !$newkeyword) {
        $return['status']  = 'fail';
        $return['message'] = yourls__( 'Long URL or Short URL cannot be blank' );
        return yourls_apply_filter( 'edit_link', $return, $url, $keyword, $newkeyword, $title );
    }

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
            $return['url']     = array( 'keyword'       => $newkeyword,
                                        'shorturl'      => yourls_link($newkeyword),
                                        'url'           => yourls_esc_url($url),
                                        'display_url'   => yourls_esc_html(yourls_trim_long_string($url)),
                                        'title'         => yourls_esc_attr($title),
                                        'display_title' => yourls_esc_html(yourls_trim_long_string( $title ))
                                );
            $return['status']  = 'success';
            $return['message'] = yourls__( 'Link updated in database' );
        } else {
            $return['status']  = 'fail';
            $return['message'] = /* //translators: "Error updating http://someurl/ (Shorturl: http://sho.rt/blah)" */ yourls_s( 'Error updating %s (Short URL: %s)', yourls_esc_html(yourls_trim_long_string($url)), $keyword ) ;
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
 * @param string $keyword
 * @param string $title
 * @return int number of rows updated
 */
function yourls_edit_link_title( $keyword, $title ) {
    // Allow plugins to short-circuit the whole function
    $pre = yourls_apply_filter( 'shunt_edit_link_title', null, $keyword, $title );
    if ( null !== $pre ) {
        return $pre;
    }

    $keyword = yourls_sanitize_keyword( $keyword );
    $title = yourls_sanitize_title( $title );

    $table = YOURLS_DB_TABLE_URL;
    $update = yourls_get_db()->fetchAffected("UPDATE `$table` SET `title` = :title WHERE `keyword` = :keyword;", array('title' => $title, 'keyword' => $keyword));

    return $update;
}

/**
 * Check if keyword id is free (ie not already taken, and not reserved). Return bool.
 *
 * @param  string $keyword    short URL keyword
 * @return bool               true if keyword is taken (ie there is a short URL for it), false otherwise
 */
function yourls_keyword_is_free( $keyword  ) {
    $free = true;
    if ( yourls_keyword_is_reserved( $keyword ) or yourls_keyword_is_taken( $keyword, false ) ) {
        $free = false;
    }

    return yourls_apply_filter( 'keyword_is_free', $free, $keyword );
}

/**
 * Check if a keyword matches a "page"
 *
 * @see https://docs.yourls.org/guide/extend/pages.html
 * @since 1.7.10
 * @param  string $keyword  Short URL $keyword
 * @return bool             true if is page, false otherwise
 */
function yourls_is_page($keyword) {
    return yourls_apply_filter( 'is_page', file_exists( YOURLS_PAGEDIR . "/$keyword.php" ) );
}

/**
 * Check if a keyword is taken (ie there is already a short URL with this id). Return bool.
 *
 */
/**
 * Check if a keyword is taken (ie there is already a short URL with this id). Return bool.
 *
 * @param  string $keyword    short URL keyword
 * @param  bool   $use_cache  optional, default true: do we want to use what is cached in memory, if any, or force a new SQL query
 * @return bool               true if keyword is taken (ie there is a short URL for it), false otherwise
 */
function yourls_keyword_is_taken( $keyword, $use_cache = true ) {
    // Allow plugins to short-circuit the whole function
    $pre = yourls_apply_filter( 'shunt_keyword_is_taken', false, $keyword );
    if ( false !== $pre ) {
        return $pre;
    }

    $taken = false;
    // To check if a keyword is already associated with a short URL, we fetch all info matching that keyword. This
    // will save a query in case of a redirection in yourls-go.php because info will be cached
    if ( yourls_get_keyword_infos($keyword, $use_cache) ) {
        $taken = true;
    }

    return yourls_apply_filter( 'keyword_is_taken', $taken, $keyword );
}

/**
 * Return array of all information associated with keyword. Returns false if keyword not found. Set optional $use_cache to false to force fetching from DB
 *
 * Sincere apologies to native English speakers, we are aware that the plural of 'info' is actually 'info', not 'infos'.
 * This function yourls_get_keyword_infos() returns all information, while function yourls_get_keyword_info() (no 's') return only
 * one information. Blame YOURLS contributors whose mother tongue is not English :)
 *
 * @since 1.4
 * @param  string $keyword    Short URL keyword
 * @param  bool   $use_cache  Default true, set to false to force fetching from DB
 * @return false|object       false if not found, object with URL properties if found
 */
function yourls_get_keyword_infos( $keyword, $use_cache = true ) {
    $ydb = yourls_get_db();
    $keyword = yourls_sanitize_keyword( $keyword );

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
 * Return information associated with a keyword (eg clicks, URL, title...). Optional $notfound = string default message if nothing found
 *
 * @param string $keyword          Short URL keyword
 * @param string $field            Field to return (eg 'url', 'title', 'ip', 'clicks', 'timestamp', 'keyword')
 * @param false|string $notfound   Optional string to return if keyword not found
 * @return mixed|string
 */
function yourls_get_keyword_info($keyword, $field, $notfound = false ) {

    // Allow plugins to short-circuit the whole function
    $pre = yourls_apply_filter( 'shunt_get_keyword_info', false, $keyword, $field, $notfound );
    if ( false !== $pre )
        return $pre;

    $keyword = yourls_sanitize_keyword( $keyword );
    $infos = yourls_get_keyword_infos( $keyword );

    $return = $notfound;
    if ( isset( $infos[ $field ] ) && $infos[ $field ] !== false )
        $return = $infos[ $field ];

    return yourls_apply_filter( 'get_keyword_info', $return, $keyword, $field, $notfound );
}

/**
 * Return title associated with keyword. Optional $notfound = string default message if nothing found
 *
 * @param string $keyword          Short URL keyword
 * @param false|string $notfound   Optional string to return if keyword not found
 * @return mixed|string
 */
function yourls_get_keyword_title( $keyword, $notfound = false ) {
    return yourls_get_keyword_info( $keyword, 'title', $notfound );
}

/**
 * Return long URL associated with keyword. Optional $notfound = string default message if nothing found
 *
 * @param string $keyword          Short URL keyword
 * @param false|string $notfound   Optional string to return if keyword not found
 * @return mixed|string
 */
function yourls_get_keyword_longurl( $keyword, $notfound = false ) {
    return yourls_get_keyword_info( $keyword, 'url', $notfound );
}

/**
 * Return number of clicks on a keyword. Optional $notfound = string default message if nothing found
 *
 * @param string $keyword          Short URL keyword
 * @param false|string $notfound   Optional string to return if keyword not found
 * @return mixed|string
 */
function yourls_get_keyword_clicks( $keyword, $notfound = false ) {
    return yourls_get_keyword_info( $keyword, 'clicks', $notfound );
}

/**
 * Return IP that added a keyword. Optional $notfound = string default message if nothing found
 *
 * @param string $keyword          Short URL keyword
 * @param false|string $notfound   Optional string to return if keyword not found
 * @return mixed|string
 */
function yourls_get_keyword_IP( $keyword, $notfound = false ) {
    return yourls_get_keyword_info( $keyword, 'ip', $notfound );
}

/**
 * Return timestamp associated with a keyword. Optional $notfound = string default message if nothing found
 *
 * @param string $keyword          Short URL keyword
 * @param false|string $notfound   Optional string to return if keyword not found
 * @return mixed|string
 */
function yourls_get_keyword_timestamp( $keyword, $notfound = false ) {
    return yourls_get_keyword_info( $keyword, 'timestamp', $notfound );
}

/**
 * Return array of stats for a given keyword
 *
 * This function supersedes function yourls_get_link_stats(), deprecated in 1.7.10, with a better naming.
 *
 * @since 1.7.10
 * @param  string $shorturl short URL keyword
 * @return array            stats
 */
function yourls_get_keyword_stats( $shorturl ) {
    $table_url = YOURLS_DB_TABLE_URL;
    $shorturl  = yourls_sanitize_keyword( $shorturl );

    $res = yourls_get_db()->fetchObject("SELECT * FROM `$table_url` WHERE `keyword` = :keyword", array('keyword' => $shorturl));

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
                'shorturl' => yourls_link($res->keyword),
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
 * Return array of keywords that redirect to the submitted long URL
 *
 * @since 1.7
 * @param string $longurl long url
 * @param string $order Optional SORT order (can be 'ASC' or 'DESC')
 * @return array array of keywords
 */
function yourls_get_longurl_keywords( $longurl, $order = 'ASC' ) {
    $longurl = yourls_sanitize_url($longurl);
    $table   = YOURLS_DB_TABLE_URL;
    $sql     = "SELECT `keyword` FROM `$table` WHERE `url` = :url";

    if (in_array($order, array('ASC','DESC'))) {
        $sql .= " ORDER BY `keyword` ".$order;
    }

    return yourls_apply_filter( 'get_longurl_keywords', yourls_get_db()->fetchCol($sql, array('url'=>$longurl)), $longurl );
}
