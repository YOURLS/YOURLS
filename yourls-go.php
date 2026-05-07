<?php
define( 'YOURLS_GO', true );
require_once( dirname( __FILE__ ) . '/includes/load-yourls.php' );

if ( !isset( $keyword ) ) {
    yourls_do_action( 'redirect_no_keyword' );
    yourls_redirect( YOURLS_SITE, 301 );
}

$keyword = yourls_sanitize_keyword( $keyword );

if ( yourls_is_page( $keyword ) ) {
    yourls_page( $keyword );
    return;
}

$url = yourls_get_keyword_longurl( $keyword );
if ( !$url ) {
    yourls_do_action( 'redirect_keyword_not_found', $keyword );
    yourls_redirect( YOURLS_SITE, 302 );
    exit();
}

$ua       = yourls_get_user_agent();
$accept   = $_SERVER['HTTP_ACCEPT'] ?? '';
$detector = new \YOURLS\Click\BotDetector( $ua, $accept );
$isBot    = (bool) yourls_apply_filter( 'click_is_bot', $detector->isBot(), $ua, $accept );
$useInter = defined( 'YOURLS_CLICK_INTERSTITIAL' ) ? (bool) YOURLS_CLICK_INTERSTITIAL : true;

if ( $isBot || !$useInter ) {
    yourls_do_action( 'redirect_shorturl', $url, $keyword );
    yourls_update_clicks( $keyword );
    yourls_robots_tag_header();
    if ( !headers_sent() ) {
        header( 'Location: ' . $url, true, 301 );
    }
    \YOURLS\Click\Connection::closeAndContinue();
    yourls_log_redirect( $keyword );
    return;
}

$click_uid = bin2hex( random_bytes( 8 ) );
yourls_do_action( 'redirect_shorturl', $url, $keyword );
yourls_update_clicks( $keyword );
yourls_robots_tag_header();

require dirname( __FILE__ ) . '/ui/templates/click-interstitial.php';
return;
