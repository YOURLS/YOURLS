<?php
/*
Plugin Name: Sample Admin Page
Plugin URI: http://yourls.org/
Description: A example of a plugin administration page to save user defined option
Version: 1.0
Author: Ozh
Author URI: http://ozh.org/
*/

// Register our plugin admin page
yourls_add_action( 'plugins_loaded', 'ozh_yourls_samplepage_add_page' );
function ozh_yourls_samplepage_add_page() {
	yourls_register_plugin_page( 'sample_page', 'Sample Admin Page', 'ozh_yourls_samplepage_do_page' );
	// parameters: page slug, page title, and function that will display the page itself
}

// Display admin page
function ozh_yourls_samplepage_do_page() {

	// Check if a form was submitted
	if( isset( $_POST['test_option'] ) )
		ozh_yourls_samplepage_update_option();

	// Get value from database
	$test_option = yourls_get_option( 'test_option' );

	echo <<<HTML
		<h2>Sample Plugin Administration Page</h2>
		<p>This plugin stores an integer in the option database</p>
		<form method="post">
		<p><label for="test_option">Enter an integer</label> <input type="text" id="test_option" name="test_option" value="$test_option" /></p>
		<p><input type="submit" value="Update value" /></p>
		</form>
HTML;
}

// Update option in database
function ozh_yourls_samplepage_update_option() {
	$in = $_POST['test_option'];
	
	if( $in ) {
		// Validate test_option. ALWAYS validate and sanitize user input.
		// Here, we want an integer
		$in = intval( $in);
		
		// Update value in database
		yourls_update_option( 'test_option', $in );
	}
}