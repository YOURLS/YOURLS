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

	/* Main Table Widths */
	#main_table_head_shorturl { width: 130px; }
	#main_table_head_longurl  { width:  auto; }
	#main_table_head_date     { width:  80px; }
	#main_table_head_ip       { width: 100px; }
	#main_table_head_clicks   { width:  45px; }
	#main_table_head_username { width:  auto; }
	#main_table_head_actions  { width:  auto; }

	/* Input field widths for URL Entry */
    input.text      {       font-size: 1.2em;       }
    #add-keyword    {       width: 200px;   }
    #add-button     {       height: 40px; font-size: 1.2em}


	/*********************************\
	|* ^^^ CUSTOM CSS GOES ABOVE ^^^ *|
	\*********************************/
</style>
<?php }