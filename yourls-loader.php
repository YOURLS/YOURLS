<?php
// Handle inexistent root favicon requests and exit
if ( '/favicon.ico' == $_SERVER['REQUEST_URI'] ) {
	header( 'Content-Type: image/gif' );
	echo base64_decode( "R0lGODlhEAAQAJECAAAAzFZWzP///wAAACH5BAEAAAIALAAAAAAQABAAAAIplI+py+0PUQAgSGoNQFt0LWTVOE6GuX1H6onTVHaW2tEHnJ1YxPc+UwAAOw==" );
	exit;
}

// Handle inexistent root robots.txt requests and exit
if ( '/robots.txt' == $_SERVER['REQUEST_URI'] ) {
	header( 'Content-Type: text/plain; charset=utf-8' );
	echo "User-agent: *\n";
	echo "Disallow:\n";
	exit;
}

// Load YOURLS
require_once __DIR__ . '/includes/load-yourls.php';

// Get request in YOURLS base (eg in 'http://sho.rt/yourls/abcd' get 'abdc')
// At this point, $request is NOT sanitized.
$request = yourls_get_request();

// Now load required template and exit
yourls_do_action( 'pre_load_template', $request );

// Let's look at the request : what we want to catch here is "anything", or "anything+" / "anything+all" (stat page)
preg_match( "@^(.+?)(\+(all)?)?/?$@", $request, $matches );
$keyword   = isset($matches[1]) ? $matches[1] : null; // 'anything' whatever the request is (keyword, bookmarklet URL...)
$stats     = isset($matches[2]) ? $matches[2] : null; // null, or '+' if request is 'anything+', '+all' if request is 'anything+all'
$stats_all = isset($matches[3]) ? $matches[3] : null; // null, or 'all' if request is 'anything+all'

// if request has a scheme (eg scheme://uri) : "Prefix-n-Shorten" sends to bookmarklet (doesn't work on Windows)
if ( yourls_get_protocol($keyword) ) {
	$url = yourls_sanitize_url_safe($keyword);
	$parse = yourls_get_protocol_slashes_and_rest( $url, [ 'up', 'us', 'ur' ] );
    yourls_do_action( 'load_template_redirect_admin', $url );
    yourls_do_action( 'pre_redirect_bookmarklet', $url );

    // Redirect to /admin/index.php?up=<url protocol>&us=<url slashes>&ur=<url rest>
    yourls_redirect( yourls_add_query_arg( $parse , yourls_admin_url( 'index.php' ) ), 302 );
    exit;
}

// if request is an existing short URL keyword ('abc') or stat page ('abc+') or an existing page :
if ( yourls_keyword_is_taken($keyword) or yourls_is_page($keyword) ) {

    // we have a short URL or a page
    if( $keyword && !$stats ) {
        yourls_do_action( 'load_template_go', $keyword );
        require_once( YOURLS_ABSPATH.'/yourls-go.php' );
        exit;
    }

    // we have a stat page
    if( $keyword && $stats ) {
        $aggregate = $stats_all && yourls_allow_duplicate_longurls();
        yourls_do_action( 'load_template_infos', $keyword );
        require_once( YOURLS_ABSPATH.'/yourls-infos.php' );
        exit;
    }

}

// Past this point this is a request the loader could not understand : not a valid shorturl, not a bookmarklet
yourls_do_action( 'redirect_keyword_not_found', $keyword );
yourls_do_action( 'loader_failed', $request );
yourls_redirect( YOURLS_SITE, 302 );
exit;
