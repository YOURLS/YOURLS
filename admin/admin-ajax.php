<?php
define( 'YOURLS_ADMIN', true );
define( 'YOURLS_AJAX', true );
require_once( dirname( __DIR__ ) .'/includes/load-yourls.php' );
yourls_maybe_require_auth();

// This file will output a JSON string
yourls_content_type_header( 'application/json' );
yourls_no_cache_headers();
yourls_no_frame_header();

if( !isset( $_REQUEST['action'] ) )
    die();

// Pick action
$action = $_REQUEST['action'];
switch( $action ) {

    case 'add':
        yourls_verify_nonce( 'add_url', $_REQUEST['nonce'], false, 'omg error' );
        if ( function_exists( 'yourls_current_user_can' ) && !yourls_current_user_can( 'create_link' ) ) {
            yourls_status_header( 403 );
            echo json_encode( [ 'status' => 'fail', 'message' => yourls__( 'Forbidden' ) ] );
            die();
        }
        $return = yourls_add_new_link( $_REQUEST['url'], $_REQUEST['keyword'], '', $_REQUEST['rowid'] ?? 1, $_REQUEST['notes'] ?? '' );
        echo json_encode($return);
        break;

    case 'edit_display':
        yourls_verify_nonce( 'edit-link_'.$_REQUEST['id'], $_REQUEST['nonce'], false, 'omg error' );
        if ( function_exists( 'yourls_current_user_can' ) && !yourls_current_user_can( 'edit_link', [ 'keyword' => $_REQUEST['keyword'] ?? '' ] ) ) {
            yourls_status_header( 403 );
            echo json_encode( [ 'status' => 'fail', 'message' => yourls__( 'Forbidden' ) ] );
            die();
        }
        $row = yourls_table_edit_row ( $_REQUEST['keyword'], $_REQUEST['id'] );
        echo json_encode( array('html' => $row) );
        break;

    case 'edit_save':
        yourls_verify_nonce( 'edit-save_'.$_REQUEST['id'], $_REQUEST['nonce'], false, 'omg error' );
        if ( function_exists( 'yourls_current_user_can' ) && !yourls_current_user_can( 'edit_link', [ 'keyword' => $_REQUEST['keyword'] ?? '' ] ) ) {
            yourls_status_header( 403 );
            echo json_encode( [ 'status' => 'fail', 'message' => yourls__( 'Forbidden' ) ] );
            die();
        }
        $return = yourls_edit_link( $_REQUEST['url'], $_REQUEST['keyword'], $_REQUEST['newkeyword'], $_REQUEST['title'], $_REQUEST['notes'] ?? null );
        echo json_encode($return);
        break;

    case 'delete':
        yourls_verify_nonce( 'delete-link_'.$_REQUEST['id'], $_REQUEST['nonce'], false, 'omg error' );
        if ( function_exists( 'yourls_current_user_can' ) && !yourls_current_user_can( 'delete_link', [ 'keyword' => $_REQUEST['keyword'] ?? '' ] ) ) {
            yourls_status_header( 403 );
            echo json_encode( [ 'status' => 'fail', 'message' => yourls__( 'Forbidden' ) ] );
            die();
        }
        $query = yourls_delete_link_by_keyword( $_REQUEST['keyword'] );
        echo json_encode(array('success'=>$query));
        break;

    default:
        yourls_do_action( 'yourls_ajax_'.$action );

}

die();
