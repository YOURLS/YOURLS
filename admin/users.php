<?php
define( 'YOURLS_ADMIN', true );
require_once( dirname( __DIR__ ) . '/includes/load-yourls.php' );
yourls_maybe_require_auth();

if ( !yourls_current_user_can( 'manage_users' ) ) {
    yourls_die( yourls__( 'You are not authorised to access this page.' ), yourls__( 'Forbidden' ), 403 );
}

$action  = $_REQUEST['action'] ?? 'list';
$user_id = isset( $_REQUEST['id'] ) ? (int) $_REQUEST['id'] : 0;
$flash   = [];

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
    yourls_verify_nonce( 'users_form' );
    try {
        // Field names are intentionally prefixed with `user_` so they don't
        // collide with the `username` / `password` reserved by yourls auth:
        // yourls_is_valid_user() inspects $_REQUEST['username']/['password']
        // and treats any request carrying both as a login attempt, which
        // routes the nonce check to 'admin_login' instead of 'users_form'.
        $username  = trim( (string) ( $_POST['user_username']     ?? '' ) );
        $role      = (string) ( $_POST['role']                    ?? 'editor' );
        $password  = (string) ( $_POST['user_password']           ?? '' );
        $confirm   = (string) ( $_POST['user_password_confirm']   ?? '' );
        $is_active = isset( $_POST['is_active'] );

        if ( $action === 'create' ) {
            if ( $password !== $confirm ) {
                throw new \InvalidArgumentException( yourls__( 'Passwords do not match' ) );
            }
            yourls_create_user( $username, $password, $role, $is_active );
            $flash  = [ 'tone' => 'success', 'message' => yourls_s( 'User %s created', $username ) ];
            $action = 'list';
        } elseif ( $action === 'update' && $user_id > 0 ) {
            if ( $password !== '' && $password !== $confirm ) {
                throw new \InvalidArgumentException( yourls__( 'Passwords do not match' ) );
            }
            $fields = [ 'role' => $role, 'is_active' => $is_active ];
            if ( $password !== '' ) {
                $fields['password'] = $password;
            }
            if ( $username !== '' ) {
                $fields['username'] = $username;
            }
            yourls_update_user( $user_id, $fields );
            $flash  = [ 'tone' => 'success', 'message' => yourls__( 'User updated' ) ];
            $action = 'list';
        } elseif ( $action === 'delete' && $user_id > 0 ) {
            yourls_delete_user( $user_id );
            $flash  = [ 'tone' => 'success', 'message' => yourls__( 'User deleted' ) ];
            $action = 'list';
        } elseif ( $action === 'rotate_key' && $user_id > 0 ) {
            yourls_rotate_user_api_key( $user_id );
            $flash  = [ 'tone' => 'success', 'message' => yourls__( 'API key rotated' ) ];
            $action = 'list';
        }
    } catch ( \Throwable $e ) {
        $flash = [ 'tone' => 'danger', 'message' => $e->getMessage() ];
    }
}

$current_user_id = yourls_current_user_id();
$users           = yourls_list_users();

$view_data = [
    'users'           => $users,
    'flash'           => $flash,
    'action'          => $action,
    'editing_user'    => null,
    'current_user_id' => $current_user_id,
    'nonce'           => yourls_create_nonce( 'users_form' ),
];

if ( $action === 'edit' || $action === 'new' ) {
    if ( $action === 'edit' && $user_id > 0 ) {
        foreach ( $users as $u ) {
            if ( (int) $u['user_id'] === $user_id ) {
                $view_data['editing_user'] = $u;
                break;
            }
        }
    }
    echo yourls_ui_view( 'admin.users.form', $view_data );
} else {
    echo yourls_ui_view( 'admin.users.index', $view_data );
}
