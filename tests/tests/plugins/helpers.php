<?php

/**
 * Misc helper functions
 *
 * @group plugins
 */
class Plugin_Helpers_Tests extends PHPUnit\Framework\TestCase {

    /**
     * Return values for yourls_return_something()
     */
    public function helpers() {
        return array(
            array( true , 'yourls_return_true' ),
            array( false, 'yourls_return_false' ),
            array( 0    , 'yourls_return_zero' ),
            array( []   , 'yourls_return_empty_array' ),
            array( null , 'yourls_return_null' ),
            array( ''   , 'yourls_return_empty_string' ),
        );
    }

    /**
     * Check return values of yourls_return_something()
     *
     * @dataProvider helpers
     */
    public function test_check_timestamp( $value, $func ) {
        $this->assertSame( $value, call_user_func($func) );
    }

}
