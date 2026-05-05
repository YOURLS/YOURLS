<?php
define( 'YOURLS_ADMIN', true );
require_once( dirname( __DIR__ ) . '/includes/load-yourls.php' );
yourls_maybe_require_auth();

if ( !yourls_current_user_can( 'manage_own_profile' ) ) {
    yourls_die( yourls__( 'Login required' ), yourls__( 'Forbidden' ), 403 );
}

$me_id      = yourls_current_user_id();
$me_name    = defined( 'YOURLS_USER' ) ? YOURLS_USER : '';
$is_db_user = $me_id !== null;
$flash      = [];

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
    yourls_verify_nonce( 'profile_form' );
    try {
        $action = $_POST['action'] ?? '';
        if ( $action === 'change_password' ) {
            if ( !$is_db_user ) {
                throw new \RuntimeException( yourls__( 'Config-file users must edit user/config.php to change credentials.' ) );
            }
            $current = (string) ( $_POST['current_password'] ?? '' );
            $new     = (string) ( $_POST['password']         ?? '' );
            $confirm = (string) ( $_POST['password_confirm'] ?? '' );
            if ( !yourls_db_check_password( $me_name, $current ) ) {
                throw new \RuntimeException( yourls__( 'Current password is incorrect' ) );
            }
            if ( $new !== $confirm ) {
                throw new \InvalidArgumentException( yourls__( 'Passwords do not match' ) );
            }
            yourls_update_user( $me_id, [ 'password' => $new ] );
            $flash = [ 'tone' => 'success', 'message' => yourls__( 'Password changed' ) ];
        } elseif ( $action === 'rotate_key' ) {
            if ( !$is_db_user ) {
                throw new \RuntimeException( yourls__( 'Config-file users have no rotatable API key.' ) );
            }
            yourls_rotate_user_api_key( $me_id );
            $flash = [ 'tone' => 'success', 'message' => yourls__( 'API key rotated' ) ];
        }
    } catch ( \Throwable $e ) {
        $flash = [ 'tone' => 'danger', 'message' => $e->getMessage() ];
    }
}

$signature  = yourls_auth_signature( $me_name );
$sample_url = yourls_get_yourls_site() . '/yourls-api.php?signature=' . $signature . '&action=shorturl&url=https://example.com/';

echo yourls_ui_view( 'admin.profile', [
    'me_name'    => $me_name,
    'is_db_user' => $is_db_user,
    'signature'  => $signature,
    'sample_url' => $sample_url,
    'flash'      => $flash,
    'nonce'      => yourls_create_nonce( 'profile_form' ),
] );
