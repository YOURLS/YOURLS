<?php
/*
 * Public self-service registration page.
 * Requires the "Modern Auth & Landing Page" plugin (user/plugins/modern-auth) to be activated,
 * which is what actually processes the POST and creates the account.
 */

require_once( dirname( __FILE__ ) . '/includes/load-yourls.php' );

if ( yourls_is_API() ) {
    die();
}

$error  = $GLOBALS['modern_auth_register_error']  ?? '';
$values = $GLOBALS['modern_auth_register_values']  ?? [ 'username' => '', 'email' => '' ];

yourls_html_head( 'register', yourls__( 'Create an account' ) );
yourls_html_logo();
?>
<link rel="stylesheet" href="<?php echo yourls_esc_attr( yourls_site_url( false ) . '/user/plugins/modern-auth/assets/modern.css' ); ?>" type="text/css" media="screen" />
<main role="main">
    <div id="login">
        <h2 class="modern-auth-title"><?php yourls_e( 'Create an account' ); ?></h2>
        <form method="post" action="">
            <?php if ( $error ) : ?>
                <p id="error-message" class="error"><?php echo yourls_esc_html( $error ); ?></p>
            <?php endif; ?>
            <p>
                <label for="username"><?php yourls_e( 'Username' ); ?></label><br />
                <input type="text" id="username" name="username" class="text" autocomplete="username"
                       value="<?php echo yourls_esc_attr( $values['username'] ); ?>" required minlength="3" maxlength="50" />
            </p>
            <p>
                <label for="email"><?php yourls_e( 'Email' ); ?></label><br />
                <input type="email" id="email" name="email" class="text" autocomplete="email"
                       value="<?php echo yourls_esc_attr( $values['email'] ); ?>" required />
            </p>
            <p>
                <label for="password"><?php yourls_e( 'Password' ); ?></label><br />
                <input type="password" id="password" name="password" class="text" autocomplete="new-password" required minlength="10" />
            </p>
            <p style="text-align: right;">
                <?php yourls_nonce_field( 'modern_auth_register' ); ?>
                <input type="hidden" name="modern_auth_register" value="1" />
                <input type="submit" id="submit" value="<?php echo yourls_esc_attr__( 'Create account' ); ?>" class="button" />
            </p>
        </form>
        <p class="modern-auth-register-link">
            <a href="<?php echo yourls_esc_attr( yourls_site_url( false ) . '/admin/' ); ?>"><?php yourls_e( 'Already have an account? Log in' ); ?></a>
        </p>
    </div>
</main>
<?php
yourls_html_footer();
