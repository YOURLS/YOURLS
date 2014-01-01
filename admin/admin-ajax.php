<?php
define( 'YOURLS_ADMIN', true );
define( 'YOURLS_AJAX', true );
require_once( dirname( dirname( __FILE__ ) ) .'/includes/load-yourls.php' );
yourls_maybe_require_auth();

// This file will output a JSON string
yourls_content_type_header( 'application/json' );

if( !isset( $_REQUEST['action'] ) )
	die();

// Pick action
$action = $_REQUEST['action'];
switch( $action ) {

	case 'add':
		yourls_verify_nonce( 'add_url', $_REQUEST['nonce'], false, 'omg error' );
		$return = yourls_add_new_link( $_REQUEST['url'], $_REQUEST['keyword'] );
		echo json_encode($return);
		break;
		
	case 'edit_display':
		yourls_verify_nonce( 'edit-link_'.$_REQUEST['id'], $_REQUEST['nonce'], false, 'omg error' );
		$row = yourls_table_edit_row ( $_REQUEST['keyword'] );
		echo json_encode( array('html' => $row) );
		break;

	case 'edit_save':
		yourls_verify_nonce( 'edit-save_'.$_REQUEST['id'], $_REQUEST['nonce'], false, 'omg error' );
		$return = yourls_edit_link( $_REQUEST['url'], $_REQUEST['keyword'], $_REQUEST['newkeyword'], $_REQUEST['title'] );
		echo json_encode($return);
		break;
		
	case 'delete':
		yourls_verify_nonce( 'delete-link_'.$_REQUEST['id'], $_REQUEST['nonce'], false, 'omg error' );
		$query = yourls_delete_link_by_keyword( $_REQUEST['keyword'] );
		echo json_encode(array('success'=>$query));
		break;
		
	case 'logout':
		// unused for the moment
		yourls_logout();
		break;
		
	default:
		yourls_do_action( 'yourls_ajax_'.$action );

}

die();
