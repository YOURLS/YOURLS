<?php
// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

$login_url    = yourls_site_url( false ) . '/admin/';
$register_url = yourls_site_url( false ) . '/register.php';
$site_name    = parse_url( yourls_get_yourls_site(), PHP_URL_HOST );

$shorten_result = $GLOBALS['modern_auth_landing_shorten_result'] ?? null;
$shorten_error  = $GLOBALS['modern_auth_landing_shorten_error']  ?? '';
$shorten_values = $GLOBALS['modern_auth_landing_shorten_values'] ?? [ 'url' => '', 'keyword' => '' ];
$nonce          = yourls_create_nonce( 'landing_shorten' );
?><!DOCTYPE html>
<html <?php yourls_html_language_attributes(); ?>>
<head>
    <meta charset="utf-8" />
    <title><?php echo yourls_esc_html( $site_name ); ?> &mdash; Your Own URL Shortener</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="<?php echo yourls_esc_attr( yourls_plugin_url( __DIR__ ) . '/assets/modern.css' ); ?>" type="text/css" media="screen" />
</head>
<body class="modern-landing modern-space-bg">
    <div class="landing-wrap">
        <header class="landing-header">
            <a href="<?php echo yourls_esc_attr( yourls_site_url( false ) . '/' ); ?>" class="landing-brand">
                <svg class="landing-logo-icon" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <defs>
                        <linearGradient id="landingLogoGradient" x1="0" y1="0" x2="32" y2="32" gradientUnits="userSpaceOnUse">
                            <stop offset="0%" stop-color="#8b5cf6" />
                            <stop offset="55%" stop-color="#ec4899" />
                            <stop offset="100%" stop-color="#22d3ee" />
                        </linearGradient>
                    </defs>
                    <rect x="2" y="10" width="16" height="12" rx="6" transform="rotate(-20 10 16)" stroke="url(#landingLogoGradient)" stroke-width="3" />
                    <rect x="14" y="10" width="16" height="12" rx="6" transform="rotate(-20 22 16)" stroke="url(#landingLogoGradient)" stroke-width="3" />
                </svg>
                <span class="modern-gradient-text"><?php echo yourls_esc_html( $site_name ); ?></span>
            </a>
            <nav>
                <a href="<?php echo yourls_esc_attr( $login_url ); ?>" class="landing-nav-link">Log in</a>
                <a href="<?php echo yourls_esc_attr( $register_url ); ?>" class="landing-btn landing-btn-ghost">Sign up</a>
            </nav>
        </header>

        <main class="landing-hero">
            <h1 class="modern-gradient-text">Shorten links.<br />Track everything.<br />Own your data.</h1>
            <p class="landing-tagline">A fast, private URL shortener that runs on your own server &mdash; no third party ever sees your links or your stats.</p>

            <form method="post" action="" class="landing-shorten-form">
                <div class="landing-shorten-row">
                    <input type="url" name="url" placeholder="Paste a long link&hellip;" required
                           value="<?php echo yourls_esc_attr( $shorten_values['url'] ); ?>" />
                    <input type="text" name="keyword" placeholder="custom-keyword (optional)"
                           value="<?php echo yourls_esc_attr( $shorten_values['keyword'] ); ?>" />
                    <input type="hidden" name="modern_auth_landing_shorten" value="1" />
                    <input type="hidden" name="nonce" value="<?php echo yourls_esc_attr( $nonce ); ?>" />
                    <button type="submit" class="landing-btn landing-btn-primary">Shorten</button>
                </div>
                <?php if ( $shorten_error ) : ?>
                    <p class="landing-shorten-message landing-shorten-error"><?php echo yourls_esc_html( $shorten_error ); ?></p>
                <?php endif; ?>
                <?php if ( $shorten_result ) : ?>
                    <p class="landing-shorten-message landing-shorten-success">
                        <a href="<?php echo yourls_esc_attr( $shorten_result ); ?>" target="_blank" rel="noopener"><?php echo yourls_esc_html( $shorten_result ); ?></a>
                    </p>
                <?php endif; ?>
            </form>

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
