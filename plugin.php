<?php
/*
Plugin Name: Random Keywords
Plugin URI: http://yourls.org/
Description: Assign random keywords to shorturls, like bitly (sho.rt/hJudjK)
Version: 1.1
Author: Ozh
Author URI: http://ozh.org/
*/

/* Release History:
*
* 1.0 Initial release
* 1.1 Added: don't increment sequential keyword counter & save one SQL query
* Fixed: plugin now complies to character set defined in config.php
*/

global $ozh_random_keyword;

/*
* CONFIG: EDIT THIS
*/

/* Length of random keyword */
$ozh_random_keyword['length'] = 5;

/*
* DO NOT EDIT FARTHER
*/

// Generate a random keyword
yourls_add_filter( 'random_keyword', 'ozh_random_keyword' );
function ozh_random_keyword() {
        global $ozh_random_keyword;
        return yourls_rnd_string( $ozh_random_keyword['length'] );
}

// Don't increment sequential keyword tracker
yourls_add_filter( 'get_next_decimal', 'ozh_random_keyword_next_decimal' );
function ozh_random_keyword_next_decimal( $next ) {
        return ( $next - 1 );
}
