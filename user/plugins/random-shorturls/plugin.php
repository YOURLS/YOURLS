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
* Now configured via YOURLS options instead of editing plugin file
*/

// Generate a random keyword
yourls_add_filter( 'random_shorturl', 'ozh_random_shorturl' );
function ozh_random_shorturl() {
        $possible = yourls_get_shorturl_charset() ;
        $str='';
        while( strlen( $str ) < yourls_get_option( 'random_shorturls_length', 5 ) ) {
                $str .= substr($possible, rand( 0, strlen( $possible ) - 1 ), 1 );
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

// Plugin settings page etc.
yourls_add_action( 'plugins_loaded', 'ozh_random_shorturl_add_settings' );
function ozh_random_shorturl_add_settings() {
        yourls_register_plugin_page( 'random_shorturl_settings', 'Random ShortURLs Settings', 'ozh_random_shorturl_settings_page' );
}

function ozh_random_shorturl_settings_page() {
        // Check if form was submitted
        if( isset( $_POST['random_length'] ) ) {
                // If so, verify nonce
                yourls_verify_nonce( 'random_shorturl_settings' );
                // and process submission if nonce is valid
                ozh_random_shorturl_settings_update();
        }

        $random_length = yourls_get_option('random_shorturls_length');
        $nonce = yourls_create_nonce( 'random_shorturl_settings' );

        echo <<<HTML
                <main>
                        <h2>Random ShortURLs Settings</h2>
                        <form method="post">
                        <input type="hidden" name="nonce" value="$nonce" />
                        <p>
                                <label>Random Keyword Length</label>
                                <input type="number" name="random_length" min="1" max="128" value="$random_length" />
                        </p>
                        <p><input type="submit" value="Save" class="button" /></p>
                        </form>
                </main>
HTML;
}

function ozh_random_shorturl_settings_update() {
        $random_length = $_POST['random_length'];

        if( $random_length ) {
                if( is_numeric( $random_length ) ) {
                        yourls_update_option( 'random_shorturls_length', intval( $random_length ) );
                } else {
                        echo "Error: Length given was not a number.";
                }
        } else {
                echo "Error: No length value given.";
        }
}
