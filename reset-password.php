<?php
/*
 * Public "set a new password" page, reached via the link emailed by forgot-password.php.
 * Requires the "Modern Auth & Landing Page" plugin (user/plugins/modern-auth) to be activated,
 * which is what actually validates the token and updates the password.
 */

require_once( dirname( __FILE__ ) . '/includes/load-yourls.php' );

if ( yourls_is_API() ) {
    die();
}

$error = $GLOBALS['modern_auth_reset_error'] ?? '';
$token = $GLOBALS['modern_auth_reset_token'] ?? ( isset( $_GET['token'] ) ? (string) $_GET['token'] : '' );

// If we're showing the form fresh (not re-displaying after a failed submit), validate the
// token up front so an expired/unknown link shows a clear message instead of a form that
// will only fail after the user fills it in.
if ( !$error && empty( $_POST['modern_auth_reset_password'] ) && !modern_auth_get_user_by_reset_token( $token ) ) {
    $error = yourls__( 'This reset link is invalid or has expired.' );
    $token = '';
}

yourls_html_head( 'reset-password', yourls__( 'Set a new password' ) );
yourls_html_logo();
?>
<link rel="stylesheet" href="<?php echo yourls_esc_attr( yourls_site_url( false ) . '/user/plugins/modern-auth/assets/modern.css' ); ?>" type="text/css" media="screen" />
<main role="main">
    <div id="login">
        <h1><?php yourls_e( 'Set a new password' ); ?></h1>
        <?php if ( $error ) : ?>
            <p id="error-message" class="error"><?php echo yourls_esc_html( $error ); ?></p>
        <?php endif; ?>
        <?php if ( $token ) : ?>
            <form method="post" action="">
                <p>
                    <label for="password"><?php yourls_e( 'New password' ); ?></label><br />
                    <input type="password" id="password" name="password" class="text" autocomplete="new-password" required minlength="10" />
                </p>
                <p style="text-align: right;">
                    <?php yourls_nonce_field( 'modern_auth_reset_password' ); ?>
                    <input type="hidden" name="token" value="<?php echo yourls_esc_attr( $token ); ?>" />
                    <input type="hidden" name="modern_auth_reset_password" value="1" />
                    <input type="submit" value="<?php echo yourls_esc_attr__( 'Update password' ); ?>" class="button" />
                </p>
            </form>
        <?php else : ?>
            <p class="modern-auth-register-link">
                <a href="<?php echo yourls_esc_attr( yourls_site_url( false ) . '/forgot-password.php' ); ?>"><?php yourls_e( 'Request a new reset link' ); ?></a>
            </p>
        <?php endif; ?>
        <p class="modern-auth-register-link">
            <a href="<?php echo yourls_esc_attr( yourls_site_url( false ) . '/admin/' ); ?>"><?php yourls_e( 'Back to login' ); ?></a>
        </p>
    </div>
</main>
<?php
yourls_html_footer();
