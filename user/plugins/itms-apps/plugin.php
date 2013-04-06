<?php
/*
Plugin Name: Install iPhone Apps
Plugin URI: http://yourls.org/
Description: Support for itms-services URL scheme for linking to iOS Enterprise App Installation Manifest
Version: 1.0
Author: Suculent
Author URI: http://www.github.com/suculent/
*/

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

// Hook our custom function into the 'pre_redirect' event
yourls_add_action( 'pre_redirect', 'suculent_itms_apps' );

// Our custom function that will be triggered when the event occurs
function suculent_itms_apps( $args ) {
	$url = $args[0];
	$evil = 'http://itms-services://';
	$good = 'itms-services://';
	
	if (strpos($url, 'http://itms-services://') !== FALSE) {
		
			// Fix the problem and redirect
			$itmsurl = str_replace($evil, $good, $url);
			header('Location: '.$itmsurl);

	      // Now die so the normal flow of event is interrupted
	      die();
	}
}