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
        $row_id = (int) ( $_REQUEST['rowid'] ?? 1 ); // row_id starts from 1 unless passed in.
        $return = yourls_add_new_link( $_REQUEST['url'], $_REQUEST['keyword'], $_REQUEST['title'] ?? '', $row_id );
        if( ( $return['status'] ?? '' ) === 'success' && ( !empty( $_REQUEST['description'] ) || !empty( $_REQUEST['image'] ) ) ) {
            yourls_set_link_meta( $return['url']['keyword'], $_REQUEST['description'] ?? '', $_REQUEST['image'] ?? '' );
        }
        echo json_encode($return);
        break;

    case 'edit_display':
        yourls_verify_nonce( 'edit-link_'.$_REQUEST['id'], $_REQUEST['nonce'], false, 'omg error' );
        $row = yourls_table_edit_row ( $_REQUEST['keyword'], $_REQUEST['id'] );
        echo json_encode( array('html' => $row) );
        break;

    case 'edit_save':
        yourls_verify_nonce( 'edit-save_'.$_REQUEST['id'], $_REQUEST['nonce'], false, 'omg error' );
        $return = yourls_edit_link( $_REQUEST['url'], $_REQUEST['keyword'], $_REQUEST['newkeyword'], $_REQUEST['title'] );
        if( ( $return['status'] ?? '' ) === 'success' ) {
            $kw = $return['url']['keyword'];
            if( $kw !== yourls_sanitize_keyword( $_REQUEST['keyword'] ) ) {
                yourls_delete_link_meta( $_REQUEST['keyword'] ); // keyword changed: drop the old row
            }
            yourls_set_link_meta( $kw, $_REQUEST['description'] ?? '', $_REQUEST['image'] ?? '' );
        }
        echo json_encode($return);
        break;

    case 'delete':
        yourls_verify_nonce( 'delete-link_'.$_REQUEST['id'], $_REQUEST['nonce'], false, 'omg error' );
        $query = yourls_delete_link_by_keyword( $_REQUEST['keyword'] );
        echo json_encode(array('success'=>$query));
        break;

    default:
        yourls_do_action( 'yourls_ajax_'.$action );

}

die();
