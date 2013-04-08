<?php
/*
Plugin Name: Allow Hyphens in Short URLs
Plugin URI: http://yourls.org/
Description: Allow hyphens in short URLs (like <tt>http://sho.rt/hello-world</tt>)
Version: 1.0
Author: Ozh
Author URI: http://ozh.org/
*/

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

yourls_add_filter( 'get_shorturl_charset', 'ozh_hyphen_in_charset' );
function ozh_hyphen_in_charset( $in ) {
	return $in.'-';
}


