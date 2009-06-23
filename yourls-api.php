<?php
define('YOURLS_API', true);
require_once( dirname(__FILE__).'/includes/config.php' );
if ( defined('YOURLS_PRIVATE') && YOURLS_PRIVATE == true )
	require_once( dirname(__FILE__).'/includes/auth.php' );

if ( !isset($_REQUEST['action']) )
	die( 'Missing parameter "action"' );

$db = yourls_db_connect();
	
switch( $_REQUEST['action'] ) {

	case 'shorturl':
		$return = yourls_add_new_link( $_REQUEST['url'], $_REQUEST['keyword'], $db );
		unset($return['html']); // in API mode, no need for our internal HTML output
		break;
	
	case 'stats':
		$return = yourls_api_stats( $_REQUEST['filter'], $_REQUEST['limit'], $db );
		break;
		
	default:
		die( 'Unknown "action" parameter' );

}

yourls_api_output( $_REQUEST['format'], $return );

die();