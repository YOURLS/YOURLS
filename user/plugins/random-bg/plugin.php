<?php
/*
Plugin Name: Random Backgrounds
Plugin URI: http://yourls.org/
Description: Pretty random background patterns
Version: 1.0
Author: Ozh
Author URI: http://ozh.org/
*/

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

// Add the inline style
yourls_add_action( 'html_head', 'ozh_yourls_randombg' );
function ozh_yourls_randombg() {
	$bg = glob( dirname( __FILE__ ).'/img/*png' );
	$url = yourls_plugin_url( dirname( __FILE__ ) );
	$rnd = yourls_plugin_url( $bg[ mt_rand( 0, count( $bg ) - 1 ) ] );
	echo <<<CSS
<style type="text/css">
		body {background:#e3f3ff url($rnd) repeat;}
	</style>

CSS;
}

