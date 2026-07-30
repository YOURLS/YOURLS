<?php
// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

$login_url    = yourls_site_url( false ) . '/admin/';
$register_url = yourls_site_url( false ) . '/register.php';
$site_name    = parse_url( yourls_get_yourls_site(), PHP_URL_HOST );
?><!DOCTYPE html>
<html <?php yourls_html_language_attributes(); ?>>
<head>
    <meta charset="utf-8" />
    <title><?php echo yourls_esc_html( $site_name ); ?> &mdash; Your Own URL Shortener</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="<?php echo yourls_esc_attr( yourls_plugin_url( __DIR__ ) . '/assets/modern.css' ); ?>" type="text/css" media="screen" />
</head>
<body class="modern-landing">
    <div class="landing-wrap">
        <header class="landing-header">
            <div class="landing-brand"><?php echo yourls_esc_html( $site_name ); ?></div>
            <nav>
                <a href="<?php echo yourls_esc_attr( $login_url ); ?>" class="landing-nav-link">Log in</a>
                <a href="<?php echo yourls_esc_attr( $register_url ); ?>" class="landing-btn landing-btn-ghost">Sign up</a>
            </nav>
        </header>

        <main class="landing-hero">
            <h1>Shorten links.<br />Track everything.<br />Own your data.</h1>
            <p class="landing-tagline">A fast, private URL shortener that runs on your own server &mdash; no third party ever sees your links or your stats.</p>
            <div class="landing-cta">
                <a href="<?php echo yourls_esc_attr( $register_url ); ?>" class="landing-btn landing-btn-primary">Create free account</a>
                <a href="<?php echo yourls_esc_attr( $login_url ); ?>" class="landing-btn landing-btn-secondary">Log in</a>
            </div>
        </main>

        <section class="landing-features">
            <div class="landing-feature">
                <h3>Custom short links</h3>
                <p>Pick your own keyword or let it auto-generate one.</p>
            </div>
            <div class="landing-feature">
                <h3>Click analytics</h3>
                <p>See clicks over time, referrers, and locations for every link.</p>
            </div>
            <div class="landing-feature">
                <h3>Self-hosted &amp; secure</h3>
                <p>Your links and data stay on your own server, always.</p>
            </div>
        </section>

        <footer class="landing-footer">
            <p>Powered by <a href="https://yourls.org">YOURLS</a></p>
        </footer>
    </div>
</body>
</html>
