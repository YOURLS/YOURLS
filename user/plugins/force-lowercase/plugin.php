<?php
/*
Plugin Name: Force Lowercase
Plugin URI: http://yourls.org/
Description: Force lowercase so http://sho.rt/ABC == http://sho.rt/abc
Version: 1.0
Author: Ozh
Author URI: http://ozh.org/
*/


/*********************************************************************************
 * DISCLAIMER                                                                    *
 * This is stupid. The web is case sensitive and http://bit.ly/BLAH is different *
 * from http://bit.ly/blah. Deal with it. More about this: see                   *
 * http://www.w3.org/TR/WD-html40-970708/htmlweb.html                            *
 *                                                                               *
 * This said, lots of users are pestering me for that kind of plugin, so there   *
 * it is. Have fun breaking the web! :)                                          *
 *********************************************************************************/

// Redirection: http://sho.rt/ABC first converted to http://sho.rt/abc
yourls_add_filter( 'get_request', 'ozh_break_the_web_lowercase' );
function ozh_break_the_web_lowercase( $keyword ){
	return strtolower( $keyword );
}

// Short URL creation: custom keyword 'ABC' converted to 'abc'
yourls_add_action( 'add_new_link_custom_keyword', 'ozh_break_the_web_add_filter' );
function ozh_break_the_web_add_filter() {
	yourls_add_filter( 'get_shorturl_charset', 'ozh_break_the_web_add_uppercase' );
	yourls_add_filter( 'custom_keyword', 'ozh_break_the_web_lowercase' );
}
function ozh_break_the_web_add_uppercase( $charset ) {
	return $charset . strtoupper( $charset );
}

