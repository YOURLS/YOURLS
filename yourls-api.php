<?php
define('YOURLS_API', true);
require_once( dirname(__FILE__).'/includes/config.php' );
if ( defined('YOURLS_PRIVATE') && YOURLS_PRIVATE == true )
	require_once( dirname(__FILE__).'/includes/auth.php' );

if ( !isset($_REQUEST['action']) )
	die( 'Missing parameter "action"' );

$action = ( isset( $_REQUEST['action'] ) ? $_REQUEST['action'] : null );
	
switch( $action ) {

	case 'shorturl':
		$url = ( isset( $_REQUEST['url'] ) ? $_REQUEST['url'] : '' );
		$keyword = ( isset( $_REQUEST['keyword'] ) ? $_REQUEST['keyword'] : '' );
		$return = yourls_add_new_link( $url, $keyword );
		unset($return['html']); // in API mode, no need for our internal HTML output
		break;
	
	case 'stats':
		$filter = ( isset( $_REQUEST['filter'] ) ? $_REQUEST['filter'] : '' );
		$limit = ( isset( $_REQUEST['limit'] ) ? $_REQUEST['limit'] : '' );
		$return = yourls_api_stats( $filter, $limit );
		break;
		
	default:
		die( 'Unknown "action" parameter' );

}

$format = ( isset( $_REQUEST['format'] ) ? $_REQUEST['format'] : 'xml' );

yourls_api_output( $format, $return );

die();