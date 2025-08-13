<?php
/*
Plugin Name: YOURLS Custom CSS Injection
Plugin URI: https://github.com/seandrickson/YOURLS-Custom-CSS
Description: Add custom CSS to your YOURLS admin area. Some (very) opinionated CSS has already been added. Feel free to edit the CSS in this plugin.
Version: 1.0
Author: Sean Hendrickson
Author URI: https://github.com/seandrickson
*/

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();


// Add the CSS to <head>
yourls_add_action( 'html_head', 'my_custom_css' );
function my_custom_css() { ?>
<style type="text/css">
	/*********************************\
	|* vvv CUSTOM CSS GOES BELOW vvv *|
	\*********************************/

	/* Break long URLs in tables */
	td { word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; }

	/* Do not wrap these elements */
	.plugin_author, .actions, .url { white-space: nowrap; }

	/* Make all tables a fixed size */
	table { table-layout: fixed; }

	/* Stat Tables Fixes */
	.tab table { width: 100%; }
	#stat_tab_location td:first-child { width: 340px; }

	/* Main Table Widths */
	#main_table_head_shorturl { width: 130px; }
	#main_table_head_longurl  { width:  auto; }
	#main_table_head_date     { width:  80px; }
	#main_table_head_ip       { width: 100px; }
	#main_table_head_clicks   { width:  45px; }
	#main_table_head_actions  { width: 111px; }

	/* Plugins Table Widths */
	.plugins #main_table th             { width: 150px; }
	.plugins #main_table th+th          { width:  50px; }
	.plugins #main_table th+th+th       { width:  auto; }
	.plugins #main_table th+th+th+th    { width: 150px; }
	.plugins #main_table th+th+th+th+th { width:  80px; }

	/*********************************\
	|* ^^^ CUSTOM CSS GOES ABOVE ^^^ *|
	\*********************************/
</style>
<?php }