<?php

/**
 * Filter related tests, playing with parameters (priority, number of accepted args)
 *
 * @since 0.1
 */

class Plugin_Params_Tests extends PHPUnit_Framework_TestCase {

	/**
	 * Check applying multiple filters to one hook with different priorities
	 *
	 * @since 0.1
	 */
	public function test_filter_priority() {
        // default order
        $hook = rand_str();
        $var  = rand_str();

        yourls_add_filter( $hook, array( $this, 'add_1' ) );
        yourls_add_filter( $hook, array( $this, 'add_2' ) );
        
        $filtered = yourls_apply_filter( $hook, $var );
        $this->assertSame( $var . "1" . "2", $filtered );
        
        // modified order
        $hook = rand_str();
        $var  = rand_str();
        
        $priority_smaller = mt_rand( 1, 20 );
        $priority_bigger  = mt_rand( $priority_smaller + 1, 30 );

        yourls_add_filter( $hook, array( $this, 'add_1' ), $priority_bigger );
        yourls_add_filter( $hook, array( $this, 'add_2' ), $priority_smaller );

        $filtered = yourls_apply_filter( $hook, $var );
        $this->assertSame( $var . "2" . "1", $filtered );
        
        return $hook;
	}


	/**
	 * Make sure yourls_apply_filter accepts an arbitrary number of elements if unspecified
	 *
	 * @since 0.1
	 */
	public function test_filter_arbitrary_arguments() {
        $hook = rand_str();
        $var1 = rand_str();
        $var2 = rand_str();
        $var3 = rand_str();
        
        yourls_add_filter( $hook, function( $var1 = '', $var2 = '', $var3 = '' ) { return $var1 . $var2 . $var3; } );
        
        $filtered = yourls_apply_filter( $hook, $var1 );
        $this->assertSame( $var1, $filtered );
    
        $filtered = yourls_apply_filter( $hook, $var1, $var2 );
        $this->assertSame( $var1 . $var2, $filtered );
    
        $filtered = yourls_apply_filter( $hook, $var1, $var2, $var3 );
        $this->assertSame( $var1 . $var2 . $var3, $filtered );
    }
    
    
	/**
	 * Make sure yourls_apply_filter accepts a specified number of elements if specified
	 *
	 * @since 0.1
	 */
	public function test_filter_specified_arguments() {
        $hook = rand_str();
        $var1 = rand_str();
        $var2 = rand_str();
        $var3 = rand_str();
        
        yourls_add_filter( $hook, function( $var1 = '', $var2 = '', $var3 = '' ) { return $var1 . $var2 . $var3; }, 10, 2 );
        
        $filtered = yourls_apply_filter( $hook, $var1 );
        $this->assertSame( $var1, $filtered );
    
        $filtered = yourls_apply_filter( $hook, $var1, $var2 );
        $this->assertSame( $var1 . $var2, $filtered );
    
        $filtered = yourls_apply_filter( $hook, $var1, $var2, $var3 );
        $this->assertSame( $var1 . $var2, $filtered );
    }
    

    /**
     * Dummy function -- appends "1"
     */
    public function add_1( $str ) {
        return $str . "1";
    }

    /**
     * Dummy function -- appends "2"
     */
    public function add_2( $str ) {
        return $str . "2";
    }

}
