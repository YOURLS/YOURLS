<?php
/*
Plugin Name: Random ShortURLs
Plugin URI: https://yourls.org/
Description: Assign random keywords to shorturls, like bitly (sho.rt/hJudjK)
Version: 1.2
Author: Ozh
Author URI: https://ozh.org/
*/

/* Release History:
*
* 1.0 Initial release
* 1.1 Added: don't increment sequential keyword counter & save one SQL query
* Fixed: plugin now complies to character set defined in config.php
* 1.2 Adopted as YOURLS core plugin under a new name
*/

global $ozh_random_shorturl;

/*
* CONFIG: EDIT THIS
*/

/* Length of random keyword */
$ozh_random_shorturl['length'] = 5;

/*
* DO NOT EDIT FARTHER
*/

// Generate a random keyword
yourls_add_filter( 'random_shorturl', 'ozh_random_shorturl' );
function ozh_random_shorturl() {
        global $ozh_random_shorturl;
        $possible = yourls_get_shorturl_charset() ;
        $str='';
        while (strlen($str) < $ozh_random_shorturl['length']) {
                $str .= substr($possible, rand(0,strlen($possible)),1);
        }
        return $str;
}

// Don't increment sequential keyword tracker
yourls_add_filter( 'get_next_decimal', 'ozh_random_shorturl_next_decimal' );
function ozh_random_shorturl_next_decimal( $next ) {
        return ( $next - 1 );
}

// Refuse to activate if old Random Keywords plugin is active
yourls_add_action( 'activated_random-shorturls', 'ozh_random_shorturl_conflict_preventer' );
function ozh_random_shorturl_conflict_preventer() {
        if yourls_is_active_plugin( 'random-keywords' ) {
                echo 'You cannot activate the plugin "Random ShortURLs" unless plugin "Random Keywords" is deactivated first.';
        }
}