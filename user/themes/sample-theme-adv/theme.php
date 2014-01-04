<?php
/* Function file for the theme
 */

// Is there things to display? If so, let's add our stuff
yourls_add_action( 'init_theme', 'sample_theme_init' );
function sample_theme_init() {
	yourls_add_filter( 'template_content', 'sample_theme_template' );
	yourls_add_filter( 'html_footer_text', 'sample_theme_footer' );
	sample_theme_add_js();
	sample_theme_add_css();
}

// Add our custom script needed (it requires jQuery)
function sample_theme_add_js() {
	yourls_enqueue_script( 'sample_theme_transit', yourls_get_active_theme_url() . '/js/jquery.transit.js', 'jquery' );
}

// Add our custom CSS
function sample_theme_add_css() {
	yourls_enqueue_style( 'sample_theme_css', yourls_get_active_theme_url() . '/css/style.css' );
	yourls_enqueue_style( 'google_font', 'http://fonts.googleapis.com/css?family=Fascinate' );
}

// Modify the page structure
function sample_theme_template( $elements ) {

	// $elements is an array containing the page structure
	// See function yourls_template_content() in includes/functions-themes.php
	
	// Remove YOURLS' logo
	sample_theme_remove_from_array( $elements, 'yourls_html_logo' );

	// Remove YOURLS' menu
	sample_theme_remove_from_array( $elements, 'yourls_html_menu' );
	
	// Insert before everything (in first position of the template) our custom menu
	array_unshift( $elements['before'], 'sample_theme_menu' );
	
	// Replace box that contains global stats with a custom element
	sample_theme_replace_in_array( $elements, 'yourls_html_global_stats', 'sample_theme_global_stats' );
	
	// A filter must always return a value	
	// var_dump( $elements );
	return $elements;
}

// Custom box with global stats and a silly animation
function sample_theme_global_stats() {

	list( $total_urls, $total_clicks ) = array_values( yourls_get_db_stats() );

	echo <<<DIV
	<div id="sample_theme_stats_clicks">
		$total_clicks clicks
	</div>
	<div id="sample_theme_stats_urls">
		$total_urls urls
	</div>
	
	<script>
	function flip_clicks( deg ){
		$("#sample_theme_stats_clicks").transition({
				perspective: '360px',
				rotateY: deg + 'deg'
		});
		setTimeout(function(){ flip_clicks( Math.floor((Math.random()*160)-80) ) }, Math.floor((Math.random()*1000)+100) );
	};
	function flip_urls( deg ){
		$("#sample_theme_stats_urls").transition({
				perspective: '360px',
				rotateY: deg + 'deg'
		});
		setTimeout(function(){ flip_urls( Math.floor((Math.random()*160)-80) ) }, Math.floor((Math.random()*1000)+100) );
	};
	flip_clicks();
	flip_urls();
	</script>
	
DIV;
}

// A custom menu
function sample_theme_menu() {
	// Some very interesting links
	$intranet = 'http://intranet.corp/';
	$yourls   = yourls_admin_url( );
	$themes   = yourls_admin_url( 'themes' );
	
	// The menu
	echo <<<MENU
	<div id="custom_menu" class="col col-lg-8 col-push-2">
	    <ul>
		    <li><a href="$intranet">Intranet</a></li>
		    <li><a href="$yourls">Short URLS</a></li>
		    <li><a href="$themes">Themes</a></li>
	    </ul>
	</div>
	<div class="clearfix"></div>
MENU;
}

// Simple filter example : hack the footer
function sample_theme_footer() {
	return '<p style="text-align:center;">YOURLS theming is fun! This is a modified footer.</p>';
}

// Helper unction to remove an element, based on its value, from a multidimensional array
function sample_theme_remove_from_array( &$array, $remove ) { 
	foreach( $array as $key => &$value ) { 
		if( is_array( $value ) ) { 
			sample_theme_remove_from_array( $value, $remove ); 
		} else {
			if( $remove == $value ) {
				unset( $array[ $key ] );
			}
		}
	}
}

// Helper function to replace an element, based on its value, by another one, inside a multidimensional array
function sample_theme_replace_in_array( &$array, $replace, $with ) { 
	foreach( $array as $key => &$value ) { 
		if( is_array( $value ) ) { 
			sample_theme_replace_in_array( $value, $replace, $with ); 
		} else {
			if( $replace == $value ) {
				$array[ $key ] = $with;
			}
		}
	}
}
