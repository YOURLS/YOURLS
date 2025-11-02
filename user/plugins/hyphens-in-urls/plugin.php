<?php
/**
 * Plugin Name: Allow Hyphens in Short URLs
 * Plugin URI: http://yourls.org/
 * Description: Allow hyphens in short URLs (like <tt>http://sho.rt/hello-world</tt>)
 * Version: 1.1
 * Author: Ozh
 * Author URI: http://ozh.org/
 */

/** Release History:
 *
 * 1.0 Initial release
 * 1.1 Modified: Make random keywords hyphen free
 */

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

// Add hyphen to the allowed character set
yourls_add_filter( 'get_shorturl_charset', 'ozh_hyphen_in_charset' );
// Unless we are crafting a random keyword
yourls_add_action('add_new_link_create_keyword', function() {yourls_remove_filter('get_shorturl_charset', 'ozh_hyphen_in_charset');});

function ozh_hyphen_in_charset( $in ) {
    return $in.'-';
}
