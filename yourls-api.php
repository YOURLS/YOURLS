<?php
define('YOURLS_API', true);
require_once( dirname(__FILE__).'/includes/load-yourls.php' );
yourls_maybe_require_auth();

$action = ( isset( $_REQUEST['action'] ) ? $_REQUEST['action'] : null );

yourls_do_action( 'api', $action );
	
switch( $action ) {

	// Shorten a URL
	case 'shorturl':
		$url = ( isset( $_REQUEST['url'] ) ? $_REQUEST['url'] : '' );
		$keyword = ( isset( $_REQUEST['keyword'] ) ? $_REQUEST['keyword'] : '' );
		$title = ( isset( $_REQUEST['title'] ) ? $_REQUEST['title'] : '' );
		$return = yourls_add_new_link( $url, $keyword, $title );
		$return['simple'] = ( isset( $return['shorturl'] ) ? $return['shorturl'] : '' ); // This one will be used in case output mode is 'simple'
		$return['callback'] = ( isset( $_REQUEST['callback'] ) ? $_REQUEST['callback'] : '' );
		unset( $return['html'] ); // in API mode, no need for our internal HTML output
		break;
	
	// Stats about links (XX top, bottom, last, rand)
	case 'stats':
		$filter = ( isset( $_REQUEST['filter'] ) ? $_REQUEST['filter'] : '' );
		$limit = ( isset( $_REQUEST['limit'] ) ? $_REQUEST['limit'] : '' );
		$start = ( isset( $_REQUEST['start'] ) ? $_REQUEST['start'] : '' );
		$return = yourls_api_stats( $filter, $limit, $start );
		$return['callback'] = $_REQUEST['callback'];
		break;
	
	// Just the global counts of shorturls and clicks
	case "db-stats":
		$return = yourls_api_db_stats();
		$return['callback'] = $_REQUEST['callback'];
		break;

	// Stats for a shorturl
	case 'url-stats':
		$shorturl = ( isset( $_REQUEST['shorturl'] ) ? $_REQUEST['shorturl'] : '' );
		$return = yourls_api_url_stats( $shorturl );
		$return['callback'] = $_REQUEST['callback'];
		break;

	// Expand a short link
	case 'expand':
		$shorturl = ( isset( $_REQUEST['shorturl'] ) ? $_REQUEST['shorturl'] : '' );
		$return = yourls_api_expand( $shorturl );
		$return['callback'] = $_REQUEST['callback'];
		break;
	
	// Missing or incorrect action parameter
	default:
		$return = array(
			'errorCode' => 400,
			'message'   => 'Unknown or missing "action" parameter',
			'simple'    => 'Unknown or missing "action" parameter',
		);
		

}

$format = ( isset( $_REQUEST['format'] ) ? $_REQUEST['format'] : 'xml' );

yourls_api_output( $format, $return );

die();