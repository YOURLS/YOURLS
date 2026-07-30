<?php
/*
 * Public "forgot password" request page.
 * Requires the "Modern Auth & Landing Page" plugin (user/plugins/modern-auth) to be activated,
 * which is what actually processes the POST and sends the reset email.
 */

require_once( dirname( __FILE__ ) . '/includes/load-yourls.php' );

if ( yourls_is_API() ) {
    die();
}

$sent = isset( $_GET['sent'] );

yourls_html_head( 'forgot-password', yourls__( 'Reset your password' ) );
yourls_html_logo();
?>
<link rel="stylesheet" href="<?php echo yourls_esc_attr( yourls_site_url( false ) . '/user/plugins/modern-auth/assets/modern.css' ); ?>" type="text/css" media="screen" />
<main role="main">
    <div id="login">
        <h1><?php yourls_e( 'Reset your password' ); ?></h1>
        <?php if ( $sent ) : ?>
            <p class="modern-auth-success"><?php yourls_e( 'If that email is registered, a reset link has been sent. Check your inbox.' ); ?></p>
        <?php else : ?>
            <p><?php yourls_e( 'Enter the email you registered with and we\'ll send you a link to reset your password.' ); ?></p>
            <form method="post" action="">
                <p>
                    <label for="email"><?php yourls_e( 'Email' ); ?></label><br />
                    <input type="email" id="email" name="email" class="text" autocomplete="email" required />
                </p>
                <p style="text-align: right;">
                    <?php yourls_nonce_field( 'modern_auth_forgot_password' ); ?>
                    <input type="hidden" name="modern_auth_forgot_password" value="1" />
                    <input type="submit" value="<?php echo yourls_esc_attr__( 'Send reset link' ); ?>" class="button" />
                </p>
            </form>
        <?php endif; ?>
        <p class="modern-auth-register-link">
            <a href="<?php echo yourls_esc_attr( yourls_site_url( false ) . '/admin/' ); ?>"><?php yourls_e( 'Back to login' ); ?></a>
        </p>
    </div>
</main>
<?php
yourls_html_footer();
