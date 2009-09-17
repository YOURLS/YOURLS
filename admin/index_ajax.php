<?php
// Require Files
require_once( dirname(dirname(__FILE__)).'/includes/load-yourls.php' );
yourls_maybe_require_auth();

// This file will output a JSON string
header('Content-type: application/json');

// Pick action
switch( stripslashes($_REQUEST['mode']) ) {

	case 'add':
		$return = yourls_add_new_link( $_REQUEST['url'], $_REQUEST['keyword'] );
		echo yourls_json_encode($return);
		break;
		
	case 'edit_display':
		$row = yourls_table_edit_row ( $_REQUEST['keyword'] );
		echo yourls_json_encode( array('html' => $row) );
		break;

	case 'edit_save':
		$return = yourls_edit_link( $_REQUEST['url'], $_REQUEST['keyword'], $_REQUEST['newkeyword'] );
		echo yourls_json_encode($return);
		break;
		
	case 'delete':
		$query = yourls_delete_link_by_keyword( $_REQUEST['keyword'] );
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