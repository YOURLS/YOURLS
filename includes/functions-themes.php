<?php

/**
 * The theme API, which allows designing and customizing the interface.
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
 * Summary of yourls_html_assets_queue
 */
function yourls_html_assets_queue() {

	// Assets files
	$assets = array (
		'css' => array(
			'yourls_style',
			'yourls_fonts-yourls-temp',
		),
		'js' => array(
			'yourls_jquery',
		)
	);
	
	// Allow theming!
	$assets = yourls_apply_filter( 'html_assets_queue', $assets );

	// Include assets
	foreach( $assets as $type => $files ) {
		foreach( $files as $file ) {
			if( substr( $file, 0, 7 ) == 'yourls_' )
				$file = yourls_site_url( false ) . "/assets/$type/" . substr( $file, 7 ) . ".min.$type?v=" . YOURLS_VERSION;
			else
				$file = yourls_site_url( false ) . "/user/themes/" . yourls_get_active_theme() . "/$type/" . $file . "." . $type;
			if( $type == 'css' ) {
				if( is_array( $file ) )
					echo '<link rel="stylesheet" href="' . $file[0] . '" type="text/css" media="' . $file[1] . '">';
				else
					echo '<link rel="stylesheet" href="' . $file . '" type="text/css" media="screen">';
			} elseif ( $type == 'js' )
				echo '<script src="' . $file . '" type="text/javascript"></script>';
		}
	}
}

/**
 * Include active theme
 */
function yourls_load_theme() {
	// Don't load theme when installing or updating
	if( yourls_is_installing() OR yourls_is_upgrading() )
		return;
	
	global $ydb;
	$ydb->theme = '';
	$active_theme = yourls_get_option( 'active_theme' );
	
	if( yourls_validate_plugin_file( YOURLS_THEMEDIR . '/' . $active_theme . '/theme.php' ) ) {
		include_once( YOURLS_THEMEDIR . '/' . $active_theme . '/theme.php' );
		$ydb->theme = $active_theme;
		unset( $active_theme );
	} else {
		yourls_update_option( 'active_theme', $ydb->theme );
		$message = yourls__( 'Could not find and deactivated theme:' );
		$missing = '<strong>' . $active_theme . '</strong>';
		yourls_add_notice( $message .' '. $missing, 'error' );
	}
}

/**
 * Summary of yourls_get_active_theme
 * @return
 */
function yourls_get_active_theme() {
	global $ydb;
	if( !property_exists( $ydb, 'theme' ) || !$ydb->theme )
		$ydb->theme = '';
	return $ydb->theme;
}
