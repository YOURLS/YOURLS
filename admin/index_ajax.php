<?php
// Require Files
require_once( dirname(dirname(__FILE__)).'/includes/config.php' );
if (defined('YOURLS_PRIVATE') && YOURLS_PRIVATE == true)
	require_once '../includes/auth.php';

// This file will output a JSON string
//header('Content-type: application/json');

// Connect To Database
$db = yourls_db_connect();

// Pick action
switch( stripslashes($_REQUEST['mode']) ) {

	case 'add':
		$return = yourls_add_new_link( $_REQUEST['url'], $_REQUEST['keyword'], $db );
		echo yourls_json_encode($return);
		break;
		
	case 'edit_display':
		$row = yourls_table_edit_row ( $_REQUEST['id'], $db );
		echo yourls_json_encode( array('html' => $row) );
		break;

	case 'edit_save':
		$return = yourls_edit_link( $_REQUEST['url'], $_REQUEST['id'], $_REQUEST['newid'], $db );
		echo yourls_json_encode($return);
		break;
		
	case 'delete':
		$query = yourls_delete_link_by_id( $_REQUEST['id'], $db );
		echo yourls_json_encode(array('success'=>$query));
		break;
		
	case 'logout':
		// unused for the moment
		yourls_logout();
		break;
		
	default:
		die('Not implemented');

}
?>