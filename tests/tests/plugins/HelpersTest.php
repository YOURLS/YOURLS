<?php

/**
 * Misc helper functions
 */
#[\PHPUnit\Framework\Attributes\Group('plugins')]
class HelpersTest extends PHPUnit\Framework\TestCase {

    /**
     * Return values for yourls_return_something()
     */
    public static function helpers(): \Iterator
    {
        yield array( true , 'yourls_return_true' );
        yield array( false, 'yourls_return_false' );
        yield array( 0    , 'yourls_return_zero' );
        yield array( []   , 'yourls_return_empty_array' );
        yield array( null , 'yourls_return_null' );
        yield array( ''   , 'yourls_return_empty_string' );
    }

    /**
     * Check return values of yourls_return_something()
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('helpers')]
    public function test_check_timestamp( $value, $func ) {
        $this->assertSame( $value, call_user_func($func) );
    }

    /**
     * Test return values of yourls_filter_unique_id()
     */
    function test_yourls_filter_unique_id() {
        $func_name = rand_str();

        $this->assertSame( $func_name, yourls_filter_unique_id($func_name) );
        $this->assertIsString( yourls_filter_unique_id( function(){return rand_str();} ) ); // unpredictable string
        $this->assertSame('SomeClass::SomeMethod', yourls_filter_unique_id( 'SomeClass::SomeMethod' ));
        $this->assertSame('SomeClass::SomeMethod', yourls_filter_unique_id(  array( 'SomeClass', 'SomeMethod' ) ));
        $this->assertIsString( yourls_filter_unique_id(  array( $this, 'test_check_timestamp' ) ));  // unpredictable string
    }

}
