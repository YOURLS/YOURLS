<?php

/**
 * Cron functions 
 *
 * @since 0.1
 */
 
if( function_exists( 'yourls_cron' ) ) :

class Cron_Tests extends PHPUnit_Framework_TestCase {

    function setUp() {
        yourls_set_cron_array( array() );
    }

    function tearDown() {
        yourls_set_cron_array( array() );
    }

    function test_yourls_get_schedule_empty() {
        // nothing scheduled
        $hook = rand_str();
        $this->assertFalse( yourls_get_schedule( $hook ) );
    }

}

endif;