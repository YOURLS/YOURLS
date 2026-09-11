<?php
/*
Plugin Name: Dark Mode
Plugin URI: https://github.com/YOURLS/YOURLS
Description: Dark theme for the admin interface, following the OS setting via <code>prefers-color-scheme</code>.
Version: 1.0
Author: YOURLS
Author URI: https://yourls.org/
*/

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

/**
 * Load the dark theme stylesheet.
 *
 * 'html_head' fires after all the core stylesheets, so these rules win at equal
 * specificity without !important (except where core JS writes inline styles).
 */
yourls_add_action( 'html_head', 'darkmode_add_css' );
function darkmode_add_css() {
    $url = yourls_plugin_url( __DIR__ ) . '/dark.css';
    echo '<link rel="stylesheet" href="' . yourls_esc_url( $url ) . '?v=1.0" type="text/css" media="screen" />' . "\n";
}

/**
 * Make the Google charts on the stats pages blend into whichever theme is
 * active. The colour scheme is a client-side setting, so the chart background
 * is made transparent here and the labels are recoloured in dark.css.
 */
foreach ( array( 'stats_line_options', 'stats_pie_options', 'stats_countries_map_options' ) as $darkmode_filter ) {
    yourls_add_filter( $darkmode_filter, 'darkmode_chart_options' );
}
function darkmode_chart_options( $options ) {
    $options['backgroundColor'] = 'transparent'; // yourls_google_viz_code() adds the JS quotes
    return $options;
}
