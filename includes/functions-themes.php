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
 */
function yourls_html_template_content( $context_body ) {
    $args = func_get_args();
    
    $elements = array (
        'before' => array(
            'sidebar_start',
            'html_logo',
            [ 'html_menu', array( $args[1] ) ],
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
            call_user_func_array( 'yourls_' . $element[0], $element[1] );
        } else {
            call_user_func_array( 'yourls_' . $element, array() );
        }
    }
    
    if( $context_body == 'after' );
        yourls_html_ending();
}
