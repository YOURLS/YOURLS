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

// Start YOURLS
require_once( dirname( __FILE__ ) . '/includes/load-yourls.php' );

// Get request in YOURLS base (eg in 'http://sho.rt/yourls/abcd' get 'abdc')
$request = yourls_get_request();

// Make valid regexp pattern from authorized charset in keywords
$pattern = yourls_make_regexp_pattern( yourls_get_shorturl_charset() );

// Now load required template and exit

yourls_do_action( 'pre_load_template', $request );

// At this point, $request is not sanitized. Sanitize in loaded template.

// Redirection:
if( preg_match( "@^([$pattern]+)/?$@", $request, $matches ) ) {
	$keyword = isset( $matches[1] ) ? $matches[1] : '';
	$keyword = yourls_sanitize_keyword( $keyword );
	yourls_do_action( 'load_template_go', $keyword );
	require_once( YOURLS_ABSPATH.'/yourls-go.php' );
	exit;
}

// Stats:
if( preg_match( "@^([$pattern]+)\+(all)?/?$@", $request, $matches ) ) {
	$keyword = isset( $matches[1] ) ? $matches[1] : '';
	$keyword = yourls_sanitize_keyword( $keyword );
	$aggregate = isset( $matches[2] ) ? (bool)$matches[2] && yourls_allow_duplicate_longurls() : false;
	yourls_do_action( 'load_template_infos', $keyword );
	require_once( YOURLS_ABSPATH.'/yourls-infos.php' );
	exit;
}

// Prefix-n-Shorten sends to bookmarklet (doesn't work on Windows)
if( preg_match( "@^[a-zA-Z]+://.+@", $request, $matches ) ) {
	$url = yourls_sanitize_url( $matches[0] );
	if( $parse = yourls_get_protocol_slashes_and_rest( $url, array( 'up', 'us', 'ur' ) ) ) {
		yourls_do_action( 'load_template_redirect_admin', $url );
		$parse = array_map( 'rawurlencode', $parse );
		// Redirect to /admin/index.php?up=<url protocol>&us=<url slashes>&ur=<url rest>
		yourls_redirect( yourls_add_query_arg( $parse , yourls_admin_url( 'index.php' ) ), 302 );
		exit;
	}
}

// Past this point this is a request the loader could not understand
yourls_do_action( 'loader_failed', $request );
yourls_redirect( YOURLS_SITE, 302 );
exit;
