<?php
/*
Plugin Name: Ozh' PLC-WP-Twitter Bridge
Plugin URI: http://planetozh.com/
Description: Create short URL for Posts with P.L.C. (such as http://ozh.in/) and tweet it
Author: Ozh
Author URI: http://planetozh.com/
*/

/*********************** EDIT THIS **********************/

// Plugin behavior
define( 'WPyourls_DO_POSTS', true ); // generate short url & tweet when new post
define( 'WPyourls_DO_PAGES', false ); // generate short url & tweet when new page

// Twitter settings
define( 'WPyourls_TWITTER_LOGIN', 'login' ); // twitter id
define( 'WPyourls_TWITTER_PWD', 'password' ); // twitter password
define( 'WPyourls_TWITTER_MSG', 'New blog post: %T %U'); // new tweet. Keep template short! Will replace %T and %U with post title & short URL

// PLC location
define( 'WPyourls_yourls_INCLUDES_DIR', '/home/planetozh/ozh.in/includes/' ); // trailing slash plz

/********************* DO NOT EDIT *********************/

global $wp_ozh_plc;
add_action('new_to_publish', 'wp_ozh_yourls_newpost');
add_action('draft_to_publish', 'wp_ozh_yourls_newpost');
add_action('pending_to_publish', 'wp_ozh_yourls_newpost');
add_action('future_to_publish', 'wp_ozh_yourls_newpost');
add_action('admin_init', 'wp_ozh_yourls_init' );
if (is_admin()) {
	//require_once(dirname(__FILE__).'/inc/options.php');
	//add_action('admin_menu', 'wp_ozh_yourls_add_page');
}
	
// Function called when new post. Passing post id.
// Everything will break if PLC files not found.
function wp_ozh_yourls_newpost( $post ) {
	global $wp_ozh_plc;
	$post_id = $post->ID;
	$post = get_post($post_id);

	if (  ( $post->post_type == 'post' && !WPyourls_DO_POSTS) || ( $post->post_type == 'page' && !WPyourls_DO_PAGES) )
		return;
		
	$title = get_the_title($post_id);
	$url = get_permalink ($post_id);
	$short = wp_ozh_yourls_get_new_short_url( $post_id, $url );
	
	// Tweet title + short URL (only once, don't tweet on edit)
	if ( !post_custom( 'yourls_tweeted' ) ) {
		require_once( dirname(__FILE__) . '/inc/twitter.php' );
		$tweet = wp_ozh_yourls_maketweet( $short, $title );
		if ( wp_ozh_yourls_tweet_it(WPyourls_TWITTER_LOGIN, WPyourls_TWITTER_PWD, $tweet) ) {
			update_post_meta($post_id, 'yourls_tweeted', 1);
		}
	}
}

// Get or create the short URL for a post. Return string(url)
function wp_ozh_yourls_geturl( $id ) {
	$short = post_custom( 'yourls_shorturl' );
	if (!$short) {
		// short URL never was not created before, let's get it now
		$short = wp_ozh_yourls_get_new_short_url( $id );
	}
	
	return $short;
}

// Template tag: echo short URL for current post
function wp_ozh_yourls_url() {
	global $id;
	$short = wp_ozh_yourls_geturl( $id );
	if ($short)
		echo "<a href=\"$short\" rel=\"alternate shorter\" rel=\"nofollow\" title=\"short URL\">$short</a>";
}

// Template tag: echo short URL alternate link in <head> for current post. See http://revcanonical.appspot.com/ && http://shorturl.appjet.net/
function wp_ozh_yourls_head_linkrel() {
	//if ( (is_single() or is_page()) )

	global $id;
	$short = wp_ozh_yourls_geturl( $id );
	if ($short)
		echo "<link rel=\"alternate short shorter shorturl\" href=\"$short\" />\n";
}


// The WP-PLC bridge function: get short URL of a WP post. Returns string(url)
function wp_ozh_yourls_get_new_short_url( $post_id, $url = '' ) {
	global $yourls_reserved_URL;
	require_once(WPyourls_yourls_INCLUDES_DIR . 'config.php');
	
	if (!$url)
		$url = get_permalink ($post_id);

	// Get/make new URL
	$yourls_db = new wpdb(yourls_DB_USER, yourls_DB_PASS, yourls_DB_NAME, yourls_DB_HOST);
	$yourls_result = yourls_add_new_link($url, '', $yourls_db);
	// Short URL is: $yourls_result['shorturl']
	
	// Store short URL in a custom field
	update_post_meta($post_id, 'yourls_shorturl', $yourls_result['shorturl']);

	return $yourls_result['shorturl'];
}

// Parse the tweet template and make a 140 char string
function wp_ozh_yourls_maketweet( $url, $title ) {
	// Replace %U with short url
	$tweet = str_replace('%U', $url, WPyourls_TWITTER_MSG);
	// Now replace %T with as many chars as possible to keep under 140
	$maxlen = 140 - ( strlen( $tweet ) - 2); // 2 = "%T"
	if (strlen($title) > $maxlen) {
		$title = substr($title, 0, ($maxlen - 3)) . '...';
	}
	
	$tweet = str_replace('%T', $title, $tweet);
	return $tweet;
}

// Init plugin options
function wp_ozh_yourls_init(){
	global $wp_ozh_plc;
	register_setting( 'wp_ozh_yourls_options', 'ozh_plc', 'wp_ozh_yourls_sanitize' );
	$wp_ozh_plc = get_option('ozh_plc');
}


?>