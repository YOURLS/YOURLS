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
