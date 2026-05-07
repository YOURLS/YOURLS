<?php
/**
 * Variables expected in scope: $url (string), $keyword (string), $click_uid (string).
 * Output is intentionally minimal: <1KB before gzip.
 */
$safeUrl    = htmlspecialchars( $url, ENT_QUOTES | ENT_HTML5, 'UTF-8' );
$safeUid    = preg_match( '/^[a-f0-9]{16}$/', $click_uid ) ? $click_uid : str_repeat( '0', 16 );
$collectUrl = yourls_site_url( false ) . '/yourls-collect.php';

$html = '<!doctype html><meta charset="utf-8">'
    . '<meta http-equiv="refresh" content="0;url=' . $safeUrl . '">'
    . '<title>Redirecting…</title>'
    . '<script>'
    . '(function(u,k,c,e){'
    . 'try{var p={v:1,click_uid:c,keyword:k,'
    . 'screen:{w:screen.width,h:screen.height,dpr:devicePixelRatio||1},'
    . 'viewport:{w:innerWidth,h:innerHeight},'
    . 'tz:Intl.DateTimeFormat().resolvedOptions().timeZone||"",'
    . 'lang:navigator.language||"",'
    . 'connection:(navigator.connection&&navigator.connection.effectiveType)||"",'
    . 'client_referrer:document.referrer||"",'
    . 'nav_start:Date.now()};'
    . 'navigator.sendBeacon(e,JSON.stringify(p));'
    . '}catch(_){}'
    . 'location.replace(u);'
    . '})('
    . json_encode( $url ) . ','
    . json_encode( $keyword ) . ','
    . json_encode( $safeUid ) . ','
    . json_encode( $collectUrl )
    . ');'
    . '</script>'
    . '<noscript><a href="' . $safeUrl . '">Continue</a></noscript>';

echo yourls_apply_filter( 'click_interstitial_html', $html, $url, $keyword, $click_uid );
