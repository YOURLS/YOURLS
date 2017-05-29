<?php
/*
 * YOURLS
 * Functions for the API
 *
 * Note about translation : this file should NOT be translation ready
 * API messages and returns are supposed to be programmatically tested, so default English is expected
 *
 */

/**
 * API function wrapper: Shorten a URL
 *
 * @since 1.6
 * @return array Result of API call
 */
function yourls_api_action_shorturl() {
	$url = ( isset( $_REQUEST['url'] ) ? $_REQUEST['url'] : '' );
	$keyword = ( isset( $_REQUEST['keyword'] ) ? $_REQUEST['keyword'] : '' );
	$title = ( isset( $_REQUEST['title'] ) ? $_REQUEST['title'] : '' );
	$return = yourls_add_new_link( $url, $keyword, $title );
	$return['simple'] = ( isset( $return['shorturl'] ) ? $return['shorturl'] : '' ); // This one will be used in case output mode is 'simple'
	unset( $return['html'] ); // in API mode, no need for our internal HTML output
	return yourls_apply_filter( 'api_result_shorturl', $return );
}

/**
 * API function wrapper: Stats about links (XX top, bottom, last, rand)
 *
 * @since 1.6
 * @return array Result of API call
 */
function yourls_api_action_stats() {
	$filter = ( isset( $_REQUEST['filter'] ) ? $_REQUEST['filter'] : '' );
	$limit = ( isset( $_REQUEST['limit'] ) ? $_REQUEST['limit'] : '' );
	$start = ( isset( $_REQUEST['start'] ) ? $_REQUEST['start'] : '' );
	return yourls_apply_filter( 'api_result_stats', yourls_api_stats( $filter, $limit, $start ) );
}

/**
 * API function wrapper: Just the global counts of shorturls and clicks
 *
 * @since 1.6
 * @return array Result of API call
 */
function yourls_api_action_db_stats() {
	return yourls_apply_filter( 'api_result_db_stats', yourls_api_db_stats() );
}

/**
 * API function wrapper: Stats for a shorturl
 *
 * @since 1.6
 * @return array Result of API call
 */
function yourls_api_action_url_stats() {
	$shorturl = ( isset( $_REQUEST['shorturl'] ) ? $_REQUEST['shorturl'] : '' );
	return yourls_apply_filter( 'api_result_url_stats', yourls_api_url_stats( $shorturl ) );
}

/**
 * API function wrapper: Expand a short link
 *
 * @since 1.6
 * @return array Result of API call
 */
function yourls_api_action_expand() {
	$shorturl = ( isset( $_REQUEST['shorturl'] ) ? $_REQUEST['shorturl'] : '' );
	return yourls_apply_filter( 'api_result_expand', yourls_api_expand( $shorturl ) );
}

/**
 * API function wrapper: return version numbers
 *
 * @since 1.6
 * @return array Result of API call
 */
function yourls_api_action_version() {
	$return['version'] = $return['simple'] = YOURLS_VERSION;
	if( isset( $_REQUEST['db'] ) && $_REQUEST['db'] == 1 )
		$return['db_version'] = YOURLS_DB_VERSION;
	return yourls_apply_filter( 'api_result_version', $return );
}

/**
 * Output and return API result
 *
 * This function will echo (or only return if asked) an array as JSON, JSONP or XML. If the array has a
 * 'simple' key, it can also output that key as unformatted text if expected output mode is 'simple'
 *
 * Most likely, script should not do anything after outputting this
 *
 * @since 1.6
 *
 * @param  string $mode          Expected output mode ('json', 'jsonp', 'xml', 'simple')
 * @param  array  $output        Array of things to output
 * @param  bool   $send_headers  Optional, default true: Whether a headers (status, content type) should be sent or not
 * @param  bool   $echo          Optional, default true: Whether the output should be outputted or just returned
 * @return string                API output, as an XML / JSON / JSONP / raw text string
 */ 
function yourls_api_output( $mode, $output, $send_headers = true, $echo = true ) {
	if( isset( $output['simple'] ) ) {
		$simple = $output['simple'];
		unset( $output['simple'] );
	}
	
	yourls_do_action( 'pre_api_output', $mode, $output, $send_headers, $echo );
	
    if( $send_headers ) {
        if( isset( $output['statusCode'] ) ) {
            $code = $output['statusCode'];
        } elseif ( isset( $output['errorCode'] ) ) {
            $code = $output['errorCode'];
        } else {
            $code = 200;
        }
        yourls_status_header( $code );
    }
	
    $result = '';
    
	switch ( $mode ) {
		case 'jsonp':
            if( $send_headers )
                yourls_content_type_header( 'application/javascript' );
            
            $callback = isset( $output['callback'] ) ? $output['callback'] : '';
			$result =  $callback . '(' . json_encode( $output ) . ')';
			break;
	
		case 'json':
            if( $send_headers )
                yourls_content_type_header( 'application/json' );
            
			$result = json_encode( $output );
			break;
		
		case 'xml':
            if( $send_headers )
                yourls_content_type_header( 'application/xml' );
            
			$result = yourls_xml_encode( $output );
			break;
			
		case 'simple':
		default:
            if( $send_headers )
                yourls_content_type_header( 'text/plain' );
            
			$result = isset( $simple ) ? $simple : '';
			break;
	}

    if( $echo ) {
        echo $result;
    }
    
	yourls_do_action( 'api_output', $mode, $output, $send_headers, $echo );
	
    return $result;
}

/**
 * Return array for API stat requests
 *
 */
function yourls_api_stats( $filter = 'top', $limit = 10, $start = 0 ) {
	$return = yourls_get_stats( $filter, $limit, $start );
	$return['simple']  = 'Need either XML or JSON format for stats';
	$return['message'] = 'success';
	return yourls_apply_filter( 'api_stats', $return, $filter, $limit, $start );
}

/**
 * Return array for counts of shorturls and clicks
 *
 */
function yourls_api_db_stats() {
	$return = array(
		'db-stats'   => yourls_get_db_stats(),
		'statusCode' => 200,
		'simple'     => 'Need either XML or JSON format for stats',
		'message'    => 'success',
	);
		
	return yourls_apply_filter( 'api_db_stats', $return );
}

/**
 * Return array for API stat requests
 *
 */
function yourls_api_url_stats( $shorturl ) {
	$keyword = str_replace( YOURLS_SITE . '/' , '', $shorturl ); // accept either 'http://ozh.in/abc' or 'abc'
	$keyword = yourls_sanitize_string( $keyword );

	$return = yourls_get_link_stats( $keyword );
	$return['simple']  = 'Need either XML or JSON format for stats';
	return yourls_apply_filter( 'api_url_stats', $return, $shorturl );
}

/**
 * Expand short url to long url
 *
 */
function yourls_api_expand( $shorturl ) {
	$keyword = str_replace( YOURLS_SITE . '/' , '', $shorturl ); // accept either 'http://ozh.in/abc' or 'abc'
	$keyword = yourls_sanitize_string( $keyword );
	
	$longurl = yourls_get_keyword_longurl( $keyword );
	
	if( $longurl ) {
		$return = array(
			'keyword'   => $keyword,
			'shorturl'  => YOURLS_SITE . "/$keyword",
			'longurl'   => $longurl,
            'title'     => yourls_get_keyword_title( $keyword ),
			'simple'    => $longurl,
			'message'   => 'success',
			'statusCode' => 200,
		);
	} else {
		$return = array(
			'keyword'   => $keyword,
			'simple'    => 'not found',
			'message'   => 'Error: short URL not found',
			'errorCode' => 404,
		);
	}
	
	return yourls_apply_filter( 'api_expand', $return, $shorturl );
}
