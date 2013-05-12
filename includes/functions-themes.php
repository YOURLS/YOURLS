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
 * Draw page with HTML functions in requested order
 * 
 * Page structure is the following: the 'before' part, the 'main' part and the 'after' part,
 * for instance:
 * - 'before' elements: sidebar, logo, title, ...
 * - 'main' elements: the main content of the page: plugin list, short URL list, plugin sub page...
 * - 'after' elements: footer, ...
 * The 'before' and 'after' elements can be modified with filter 'html_template_content'
 * 
 * @since 1.7
 * @param string $template_part what template part (eg 'before' or 'after' the page main content)
 */
function yourls_html_template_content( $template_part ) {
	// Collect additional optional arguments, for instance the page context ('admin', 'plugins'...)
	$args = func_get_args();
	
	// Page structure
	$elements = array (
		'before' => array(
			'yourls_sidebar_start',
			'yourls_html_logo',
			'yourls_add_html_status',
			[ 'yourls_html_menu', array( $args[1] ) ],
			'yourls_html_footer',
			'yourls_sidebar_end',
			'yourls_wrapper_start',   // themes should probably not remove this
		),
		'after' => array(
			'yourls_wrapper_end',     // themes should probably not remove this
		)
	);
	
	// Allow theming!
	$elements = yourls_apply_filter( 'html_template_content', $elements, $template_part, $args );
	
	// 'Draw' page
	foreach( $elements[ $template_part ] as $element ) {
		if( is_array( $element ) ) {
			call_user_func_array( $element[0], $element[1] );
		} else {
			call_user_func_array( $element, array() );
		}
	}
	
	if( $template_part == 'after' );
		yourls_html_ending();
}

/**
 * Process asset queue (CSS or JS files)
 *
 * @since 1.7
 */
function yourls_html_assets_queue() {
	global $ydb;
	
	// Filter the asset list before echoing links
	$assets = yourls_apply_filter( 'html_assets_queue', $ydb->assets );
	
	// Include assets
	foreach( $assets as $type => $files ) {
		foreach( $files as $filename => $src ) {
			// If not src provided, assume it's a core asset
			if( !$src ) {
				// @TODO: allow inclusion of non minified scripts or CSS for debugging
				// Something like: $min = ( defined and true ( 'YOURLS_SCRIPT_DEBUG' ) ? '' : 'min' );
				$src = yourls_site_url( false ) . "/assets/$type/" . $filename . ".min.$type?v=" . YOURLS_VERSION;
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
	if( property_exists( $ydb, 'assets' ) || isset( $ydb->assets[ $type ][ $name ] ) ) {
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
 * @return bool         false on error, true otherwise
 */
function yourls_enqueue_asset( $name, $src = '', $type ) {
	// Check file type
	if( !in_array( $type, array( 'css', 'js' ) ) ) {
		yourls_add_notice( yourls__( 'You can only enqueue "css" or "js" files' ) );
		return false;
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
 * @return bool         false on error, true otherwise
 */
function yourls_enqueue_style( $name, $src = '' ) {
	return yourls_enqueue_asset( $name, $src, 'css' );
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
 * @return bool         false on error, true otherwise
 */
function yourls_enqueue_script( $name, $src = '' ) {
	return yourls_enqueue_asset( $name, $src, 'js' );
}

/**
 * Dequeue a stylesheet
 *
 * Wrapper function for yourls_dequeue_asset()
 *
 * @since 1.7
 * @see yourls_enqueue_asset()
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
 * @see yourls_enqueue_asset()
 * @param string $name  name of the asset
 * @return bool         false on error, true otherwise
 */
function yourls_dequeue_script( $name ) {
	return yourls_dequeue_asset( $name, 'js' );
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
 * Init theme and load active theme if any
 *
 * @since 1.7
 */
function yourls_load_theme() {
	global $ydb;

	// Define default asset files - $ydb->assets will keep a list of needed CSS and JS
	yourls_enqueue_style(  'style' );
	yourls_enqueue_style(  'fonts-yourls-temp' );
	yourls_enqueue_script( 'jquery' );
	
	// Don't load theme when installing or updating. @TODO: 
	if( yourls_is_installing() OR yourls_is_upgrading() )
		return;
	
	// Load theme
	$ydb->theme = '';
	$active_theme = yourls_get_option( 'active_theme' );
	
	if( yourls_validate_plugin_file( YOURLS_THEMEDIR . '/' . $active_theme . '/theme.php' ) ) {
		include_once( YOURLS_THEMEDIR . '/' . $active_theme . '/theme.php' );
		$ydb->theme = $active_theme;
		unset( $active_theme );
	} elseif ( $active_theme != '' ) {
		yourls_update_option( 'active_theme', $ydb->theme );
		$message = yourls__( 'Could not find and deactivated theme:' );
		$missing = '<strong>' . $active_theme . '</strong>';
		yourls_add_notice( $message .' '. $missing, 'error' );
	}
}

/**
 * Get active theme
 *
 * @since 1.7
 * @return string name of theme directory
 */
function yourls_get_active_theme() {
	global $ydb;
	if( !property_exists( $ydb, 'theme' ) || !$ydb->theme )
		$ydb->theme = '';
	return $ydb->theme;
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
		if( file_exists( YOURLS_THEMEDIR . '/' . $theme_dir . '/screenshot.' . $ext ) ) {
			$screenshot = yourls_site_url( false, YOURLS_THEMEURL . '/' . $theme_dir . '/screenshot.' . $ext );
			break;
		}
	}
	
	return $screenshot;	
}