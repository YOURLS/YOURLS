<?php

/**
 * The theme API, which allows designing and customizing the interface.
 *
 * Several functions used by themes are shared with plugins: see functions-plugins.php
 * 
 * @author Leo Colombaro
 * @since 1.7
 */

/**
 * Define default page structure (ie callable functions to render a page)
 *
 * Page structure is the following: the 'before' part, the 'main' part and the 'after' part,
 * for instance:
 * - 'before' elements: sidebar, logo, title, ...
 * - 'main' elements: the main content of the page: plugin list, short URL list, plugin sub page...
 * - 'after' elements: footer, ...
 * The 'before' and 'after' elements can be modified with filter 'template_content'
 * 
 * @since 1.7
 */
function yourls_set_template_content() {
	global $ydb;
	
	// Page structure
	$elements = array (
		'before' => array(
			'yourls_sidebar_start',
			'yourls_html_logo',
			'yourls_html_global_stats',
			'yourls_html_menu',
			'yourls_html_footer',
			'yourls_sidebar_end',
			'yourls_wrapper_start',   // themes should probably not remove this
		),
		'after' => array(
			'yourls_wrapper_end',     // themes should probably not remove this
		)
	);
	
	$ydb->template = yourls_apply_filter( 'set_template_content', $elements );
}

/**
 * Remove an element (ie callable function) from the page template, or replace it with another one
 *
 * @since 1.7
 * @param string $function      Callable function to remove from the template
 * @param string $replace_with  Optional, callable function to replace with
 * @param string $where         Optional, only remove/replace $function in $where part ('before' or 'after')
 */
function yourls_remove_from_template( $function, $replace_with = null, $where = null ) {
	global $ydb;
	
	if( $where ) {
		yourls_remove_from_array_deep( $ydb->template[ $where ], $function, $replace_with );
	} else {
		yourls_remove_from_array_deep( $ydb->template, $function, $replace_with );
	}
}

/**
 * Helper function: remove an element, based on its value, from a multidimensional array
 *
 * @since 1.7
 * @param string $remove        element to remove from the array
 * @param string $replace_with  Optional, element to replace with
 * @return unknown
 */
function yourls_remove_from_array_deep( &$array, $remove, $replace_with = null ) { 
	foreach( $array as $key => &$value ) {
		if( is_array( $value ) ) { 
			yourls_remove_from_array_deep( $value, $remove, $replace_with );
		} else {
			if( $remove == $value ) {
				if( $replace_with ) {
					$array[ $key ] = $replace_with;
				} else {
					unset( $array[ $key ] );
				}
			}
		}
	}
}


/**
 * Draw page with HTML functions in requested order
 * 
 * @since 1.7
 * @param string $template_part what template part (eg 'before' or 'after' the page main content)
 */
function yourls_template_content( $template_part ) {
	global $ydb;

	// Collect additional optional arguments, for instance the page context ('admin', 'plugins'...)
	$args = func_get_args();
	array_shift( $args ); // remove first element which is $template_part
	
	// Allow theming!
	$elements = yourls_apply_filter( 'template_content', $ydb->template, $template_part, $args );
	
	// 'Draw' page. Each template function is passed all arguments passed to yourls_template_content()
	foreach( (array) $elements[ $template_part ] as $element ) {
		if( is_callable( $element ) ) {
			call_user_func_array( $element, $args );
		} else {
			yourls_add_notice( yourls_s( 'Undefined template function <code>%s</code>', $element ), 'error' ); //@TODO notice style
		}
	}
	
	if( $template_part == 'after' );
		yourls_html_ending();
}

/**
 * Set list of core assets (arrays of handle => filename)
 *
 * Register the list of core assets and their handle. These assets are then
 * enqueueable as needed.
 *
 * @since 1.7
 * @return array   arrays of core assets
 */
function yourls_core_assets() {
	return array(
		'js'  => array(
			// 'handle' => 'file basename without extension'
			'jquery'    => 'jquery',
			'clipboard' => 'ZeroClipboard',
		),
		'css' => array(
			'style'     => 'style',		
		),
	);
}

/**
 * Process and output asset queue (CSS or JS files)
 *
 * @since 1.7
 */
function yourls_output_asset_queue() {
	global $ydb;
	
	// Filter the asset list before echoing links
	$assets = yourls_apply_filter( 'html_assets_queue', $ydb->assets );
	
	$core = yourls_core_assets();
	
	// Include assets
	foreach( $assets as $type => $files ) {
		foreach( $files as $name => $src ) {
			// If no src provided, assume it's a core asset
			if( !$src ) {
				if( isset( $core[ $type ][ $name ] ) ) {
					// @TODO: allow inclusion of non minified scripts or CSS for debugging
					// Something like: $min = ( defined and true ( 'YOURLS_SCRIPT_DEBUG' ) ? '' : 'min' );
					$src = yourls_site_url( false ) . "/assets/$type/" . $core[ $type ][ $name ] . ".min.$type?v=" . YOURLS_VERSION;
				}
			}
			
			$src = yourls_sanitize_url( $src );
			
			// Output asset HTML tag
			switch( $type ) {
				case 'css':
					echo '<link rel="stylesheet" href="' . $src . '" type="text/css" media="screen">' . "\n";
					break;
				
				case 'js':
					echo '<script src="' . $src . '" type="text/javascript"></script>' . "\n";
					break;
				
				default:
					yourls_add_notice( yourls__( 'You can only enqueue "css" or "js" files' ) ); 
			}
		}
	}
}

/**
 * Dequeue an asset (remove it from the queue of needed assets)
 *
 * @since 1.7
 * @param $string $name  name of the asset
 * @param $string $type  type of asset ('css' or 'js')
 * @return bool          true if asset dequeued, false if unfound
 */
function yourls_dequeue_asset( $name, $type ) {
	// Check file type
	if( !in_array( $type, array( 'css', 'js' ) ) ) {
		return false;
	}
	
	global $ydb;
	if( yourls_is_asset_queued( $name, $type ) ) {
		unset( $ydb->assets[ $type ][ $name ] );
		return true;
	}
	return false;
}

/**
 * Enqueue an asset (add it to the list of needed assets)
 *
 * @since 1.7
 * @param string $name  name of the asset
 * @param string $src   source (full URL) of the asset. If ommitted, assumed it's a core asset
 * @param string $type  type of asset ('css' or 'js')
 * @param mixed  $deps  dependencies required first - a string or an array of strings
 * @return bool         false on error, true otherwise
 */
function yourls_enqueue_asset( $name, $type, $src = '', $deps = array() ) {
	// Check file type
	if( !in_array( $type, array( 'css', 'js' ) ) ) {
		yourls_add_notice( yourls__( 'You can only enqueue "css" or "js" files' ) );
		return false;
	}
	
	// Already in queue?
	if( yourls_is_asset_queued( $name, $type ) )
		return false;
		
	// Are there any (core) dependencies needed first?
	if( $deps ) {
		foreach( (array)$deps as $dep ) {
			yourls_enqueue_asset( $dep, $type );
		}
	}
	
	global $ydb;
	$ydb->assets[ $type ][ $name ] = $src;
	return true;
}

/**
 * Enqueue a stylesheet
 *
 * Wrapper function for yourls_enqueue_asset()
 *
 * @since 1.7
 * @see yourls_enqueue_asset()
 * @param string $name  name of the asset
 * @param string $src   source (full URL) of the asset. If ommitted, assumed it's a core asset
 * @param mixed  $deps  dependencies required first - a string or an array of strings
 * @return bool         false on error, true otherwise
 */
function yourls_enqueue_style( $name, $src = '', $deps = array() ) {
	return yourls_enqueue_asset( $name, 'css', $src, $deps  );
}

/**
 * Enqueue a script
 *
 * Wrapper function for yourls_enqueue_asset()
 *
 * @since 1.7
 * @see yourls_enqueue_asset()
 * @param string $name  name of the asset
 * @param string $src   source (full URL) of the asset. If ommitted, assumed it's a core asset
 * @param mixed  $deps  dependencies required first - a string or an array of strings
 * @return bool         false on error, true otherwise
 */
function yourls_enqueue_script( $name, $src = '', $deps = array() ) {
	return yourls_enqueue_asset( $name, 'js', $src, $deps );
}

/**
 * Dequeue a stylesheet
 *
 * Wrapper function for yourls_dequeue_asset()
 *
 * @since 1.7
 * @see yourls_dequeue_asset()
 * @param string $name  name of the asset
 * @return bool         false on error, true otherwise
 */
function yourls_dequeue_style( $name ) {
	return yourls_dequeue_asset( $name, 'css' );
}

/**
 * Dequeue a script
 *
 * Wrapper function for yourls_dequeue_asset()
 *
 * @since 1.7
 * @see yourls_dequeue_asset()
 * @param string $name  name of the asset
 * @return bool         false on error, true otherwise
 */
function yourls_dequeue_script( $name ) {
	return yourls_dequeue_asset( $name, 'js' );
}

/**
 * Check if an asset is queued
 *
 * @since 1.7
 * @param string $name  name of the asset
 * @param string $type  type of the asset ('css' or 'js')
 * @return bool         true if the asset is in the queue, false otherwise
 */
function yourls_is_asset_queued( $name, $type ) {
	global $ydb;
	return( property_exists( $ydb, 'assets' ) && isset( $ydb->assets[ $type ][ $name ] ) );
}

/**
 * Check if a script is queued
 *
 * Wrapper function for yourls_is_asset_queued()
 *
 * @since 1.7
 * @param string $name  name of the script
 * @return bool         true if the script is in the queue, false otherwise
 */
function yourls_is_script_queued( $name ) {
	return yourls_is_asset_queued( $name, 'js' );
}

/**
 * Check if a stylesheet is queued
 *
 * Wrapper function for yourls_is_asset_queued()
 *
 * @since 1.7
 * @param string $name  name of the stylesheet
 * @return bool         true if the stylesheet is in the queue, false otherwise
 */
function yourls_is_style_queued( $name ) {
	return yourls_is_asset_queued( $name, 'css' );
}

/**
 * List themes in /user/themes
 *
 * @since 1.7
 * @global object $ydb Storage of mostly everything YOURLS needs to know
 * @return array Array of [/themedir/theme.css]=>array('Name'=>'Leo', 'Title'=>'My Theme', ... )
 */
function yourls_get_themes() {
	return yourls_get_plugins( 'themes' );
}

/**
 * Init theme API and load active theme if any
 *
 * @since 1.7
 */
function yourls_init_theme() {
	yourls_do_action( 'pre_init_theme' );

	// Enqueue default asset files - $ydb->assets will keep a list of needed CSS and JS
	// Asset src are defined in yourls_core_assets()
	yourls_enqueue_style(  'style' );
	yourls_enqueue_style(  'fonts-yourls-temp' );
	yourls_enqueue_script( 'jquery' );
	
	// Set default template structure
	yourls_set_template_content();
	
	// Don't load theme when installing or updating.
	if( yourls_is_installing() OR yourls_is_upgrading() )
		return;
	
	// Load theme if applicable
	yourls_load_active_theme();
}

/**
 * Check if there is an active theme and attempt to load it
 *
 * @since 1.7
 * @return mixed  true if active theme loaded, false if no active theme, error message if problem
 */
function yourls_load_active_theme() {

	yourls_do_action( 'pre_load_active_theme' );

	// is there an active theme ?
	$active_theme = yourls_get_active_theme();
	if( defined( 'YOURLS_DEBUG' ) && YOURLS_DEBUG == true ) {
		global $ydb;
		$ydb->debug_log[] = 'Theme: ' . $active_theme;
	}
	if( !$active_theme ) {
		yourls_do_action( 'load_active_theme_empty' );
		return false;
	}
	
	// Try to load the active theme
	$load = yourls_load_theme( $active_theme );
	if( $load === true ) {
		yourls_do_action( 'load_active_theme' );
		return true;
	}
	
	// There was a problem : deactivate theme and report error
	yourls_activate_theme( 'default' );
	yourls_add_notice( $load );
	/*yourls_add_notice( yourls_s( 'Deactivated theme: %s' ), $active_theme );*/
	return $load;
}

/**
 * Attempt to load a theme
 *
 * @since 1.7
 * @param string $theme   theme directory inside YOURLS_THEMEDIR
 * @return mixed          true, or an error message
 */
function yourls_load_theme( $theme ) {
	$theme_php     = yourls_get_theme_dir( $theme ) . '/theme.php';
	$theme_css     = yourls_get_theme_dir( $theme ) . '/theme.css';
	$theme_css_url = yourls_get_theme_url( $theme ) . '/theme.css';

	if( !is_readable( $theme_css ) )
		return yourls_s( 'Cannot find <code>theme.css</code> in <code>%s</code>', $theme );

	// attempt activation of the theme's function file if there is one
	if( is_readable( $theme_php ) ) {
		ob_start();
		include( $theme_php );
		if ( ob_get_length() > 0 ) {
			// there was some output: error
			$output = ob_get_clean();
			return yourls_s( 'Theme generated unexpected output. Error was: <br/><pre>%s</pre>', $output );
		}
	}

	// Enqueue theme.css
	yourls_enqueue_style( $theme, $theme_css_url );
	
	// Success !
	yourls_do_action( 'theme_loaded' );
	return true;
}

/**
 * Activate a theme
 *
 * @since 1.7
 * @param string $theme   theme directory inside YOURLS_THEMEDIR
 * @return mixed          true, or an error message
 */
function yourls_activate_theme( $theme ) {
	if ( $theme == 'default' ) {
		yourls_update_option( 'active_theme', '' );
		yourls_do_action( 'activated_theme', $theme );
		yourls_do_action( 'activated_' . $theme );
		return true;
	}
		
	$theme_php = yourls_get_theme_dir( $theme ) . '/theme.php';
	$theme_css = yourls_get_theme_dir( $theme ) . '/theme.css';

	// Check if the theme has a theme.css
	if( !is_readable( $theme_css ) )
		return yourls_s( 'Cannot find <code>theme.css</code> in <code>%s</code>', $theme );

	// Validate theme.php file if exists
	if( is_readable( $theme_php ) && !yourls_validate_plugin_file( $theme_php ) )
		return yourls_s( 'Not a valid <code>theme.php</code> file in <code>%s</code>', $theme );
		
	// Check that it's not activated already
	if( $theme == yourls_get_active_theme() )
		return yourls__( 'Theme already activated' );
		
	// Attempt to load the theme
	$load = yourls_load_theme( $theme );
	
	if( $load === true ) {
		// so far, so good
		yourls_update_option( 'active_theme', $theme );
		yourls_do_action( 'activated_theme', $theme );
		yourls_do_action( 'activated_' . $theme );
		return true;
	} else {
		// oops.
		yourls_add_notice( $load );
		return $load;
	}
}

/**
 * Get active theme
 *
 * @since 1.7
 * @return string name of theme directory, or empty string if no theme
 */
function yourls_get_active_theme() {
	global $ydb;
	if( !property_exists( $ydb, 'theme' ) || !isset( $ydb->theme ) ) {
		$ydb->theme = ( yourls_get_option( 'active_theme' ) ? yourls_get_option( 'active_theme' ) : '' );
		// Update option to save one query on next page load
		yourls_update_option( 'active_theme', $ydb->theme );
	}
	return yourls_apply_filter( 'get_active_theme', $ydb->theme );
}

/**
 * Return the base directory of a given theme
 *
 * @since 1.7
 * @param string $theme  theme (its directory)
 * @return string        sanitized physical path
 */
function yourls_get_theme_dir( $theme ) {
	return yourls_sanitize_filename( YOURLS_THEMEDIR . "/$theme" );
}

/**
 * Return the base URL of a given theme
 *
 * @since 1.7
 * @param string $theme  theme (its directory)
 * @return string        sanitized URL
 */
function yourls_get_theme_url( $theme ) {
	return yourls_sanitize_url( YOURLS_THEMEURL . "/$theme" );
}

/**
 * Return the base directory of the active theme, if any
 *
 * @since 1.7
 * @return string        sanitized physical path, or an empty string
 */
function yourls_get_active_theme_dir( ) {
	return ( yourls_get_active_theme() ? yourls_get_theme_dir( yourls_get_active_theme() ) : '' );
}

/**
 * Return the base URL of the active theme, if any
 *
 * @since 1.7
 * @return string        sanitized URL,  or an empty string
 */
function yourls_get_active_theme_url( ) {
	return ( yourls_get_active_theme() ? yourls_get_theme_url( yourls_get_active_theme() ) : '' );
}



/**
 * Callback function: Sort themes 
 *
 * @link http://php.net/uasort
 *
 * @since 1.7
 * @param array $plugin_a
 * @param array $plugin_b
 * @return int 0, 1 or -1, see uasort()
 */
function yourls_themes_sort_callback( $theme_a, $theme_b ) {
	$orderby = yourls_apply_filters( 'themes_sort_callback', 'Theme Name' );
	$order   = yourls_apply_filters( 'themes_sort_callback', 'ASC' );

	$a = $theme_a[$orderby];
	$b = $theme_b[$orderby];

	if ( $a == $b )
		return 0;

	if ( 'DESC' == $order )
		return ( $a < $b ) ? 1 : -1;
	else
		return ( $a < $b ) ? -1 : 1;		
}

/**
 * Get theme screenshot
 *
 * Search in a given directory for a file named screenshot.(png|jpg|gif)
 *
 * @since 1.7
 * @param string $theme_dir Theme directory to search
 * @return string screenshot filename, empty string if not found
 */
function yourls_get_theme_screenshot( $theme_dir ) {
	$screenshot = '';
	
	// search for screenshot.(gif|jpg|png)
	foreach( array( 'png', 'jpg', 'gif' ) as $ext ) {
		if( file_exists( yourls_get_theme_dir( $theme_dir ) . '/screenshot.' . $ext ) ) {
			$screenshot = yourls_get_theme_url( $theme_dir ) . '/screenshot.' . $ext;
			break;
		}
	}
	
	return $screenshot;	
}