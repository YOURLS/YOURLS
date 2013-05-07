<?php

/**
 * The filter/theme API is located in this file, which allows for designing 
 * and customize the interface.
 * 
 * Inspired by some functions in functions-plugins.php
 *
 * @author Leo Colombaro
 * @since 1.7
 */

/**
 * Load HTML elements as requested, as designed and allow customization 
 * about interface.
 * 
 * @param string $context_body Say if template loading is before or after content
 * @param string $context_page Explain which page is loaded
 */
function yourls_html_template_content( $context_body, $context_page = null ) {
    $elements = array (
        'before' => array(
            'sidebar_start',
            'html_logo',
            [ 'html_menu', $context_page ],
            'html_footer',
            'sidebar_end',
            'wrapper_start'
        ),
        'after' => array(
            'wrapper_end'
        )
    );
    
    // Allow theming!
    $elements = yourls_apply_filter( 'html_template', $elements );
    
    foreach( $elements[ $context_body ] as $element ) {
        if( is_array( $element ) ) {
            $function = 'yourls_' . $element[0];
            $function( $element[1] );
        } else {
            $function = 'yourls_' . $element;
            $function();
        }
    }
}
