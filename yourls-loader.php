<?php
// Handle inexistant favicon requests
if ( '/favicon.ico' == $_SERVER['REQUEST_URI'] ) {
	header('Content-Type: image/gif');
	echo base64_decode("R0lGODlhEAAQAJECAAAAzFZWzP///wAAACH5BAEAAAIALAAAAAAQABAAAAIplI+py+0PUQAgSGoNQFt0LWTVOE6GuX1H6onTVHaW2tEHnJ1YxPc+UwAAOw==");
	exit;
}

echo "<pre>";

// Start YOURLS
require_once( dirname(__FILE__).'/includes/load-yourls.php' );

// Load required template

// Get request in YOURLS base
$scheme = ( isset($_SERVER["HTTPS"]) ? 'https' : 'http' );
$request = str_replace( YOURLS_SITE.'/', '', $scheme . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );

// Make valid regexp pattern from authorized charset in keywords
$pattern = yourls_make_regexp_pattern( yourls_get_shorturl_charset() );

// Test server request and redirect accordingly
if( preg_match( "/^([$pattern]+)\/?$/", $request, $matches ) ) {
	// yourls-go.php?id=$1
}

if( preg_match( "/^([$pattern]+)\+\/?$/", $request, $matches ) ) {
	// yourls-infos.php?id=$1
}

if( preg_match( "/^([$pattern]+)\+all\/?$/", $request, $matches ) ) {
	// yourls-infos.php?id=$1&all=1
}
