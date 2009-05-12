<?php
### Require Files
require_once( dirname(__FILE__).'/includes/config.php' );
if (defined('YOURLS_PRIVATE') && YOURLS_PRIVATE == true)
	require_once 'includes/auth.php';

$db = yourls_db_connect();
$return = yourls_add_new_link( $_REQUEST['url'], $_REQUEST['keyword'], $db );

switch ( $_REQUEST['format'] ) {
	case 'json':
		header('Content-type: application/json');
		echo yourls_json_encode($return);
		break;
	
	case 'xml':
		header('Content-type: application/xml');
		echo yourls_xml_encode($return);
		break;
		
	case 'simple':
	default:
		echo $return['shorturl'];
		break;
} 

die();