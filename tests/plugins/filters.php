<?php

/**
 * Filter related tests
 *
 * @since 0.1
 */

class Plugin_Filters_Tests extends PHPUnit_Framework_TestCase {

	/**
	 * Check adding a filter with a simple function name
     *
     * Syntax tested: yourls_add_filter( $hook, 'func_name' );
	 *
	 * @since 0.1
	 */
	public function test_add_filter_funcname() {
        // Random function name
        $hook = rand_str();
        $this->assertFalse( yourls_has_filter( $hook ) );
        yourls_add_action( $hook, rand_str() );
        $this->assertTrue( yourls_has_filter( $hook ) );
        
        // Specific function name to test with yourls_do_action
        $hook = rand_str();
        $this->assertFalse( yourls_has_filter( $hook ) );
        yourls_add_action( $hook, 'change_variable' );
        $this->assertTrue( yourls_has_filter( $hook ) );
        
        return $hook;
	}
    
	/**
	 * Check applying a filter hooked with a simple function name
	 *
	 * @depends test_add_filter_funcname
	 * @since 0.1
	 */
	public function test_apply_filter_funcname( $hook ) {
        $var = rand_str();
        
        $filtered = yourls_apply_filter( $hook, $var );
        $this->assertNotSame( $var, $filtered );
        
        return $hook;
	}

    
	/**
	 * Check adding a filter with an anonymous function using create_function()
     *
     * Syntax tested: yourls_add_filter( $hook, create_function() );
	 *
	 * @since 0.1
	 */
	public function test_add_filter_create_function() {
        $hook = rand_str();
        $this->assertFalse( yourls_has_filter( $hook ) );
        yourls_add_action( $hook, create_function( '', 'return rand_str();' ) );
        $this->assertTrue( yourls_has_filter( $hook ) );
               
        return $hook;
	}
    
	/**
	 * Check applying a filter hooked with an anonymous function using create_function()
	 *
	 * @depends test_add_filter_create_function
	 * @since 0.1
	 */
	public function test_apply_filter_create_function( $hook ) {
        $var = rand_str();
        
        $filtered = yourls_apply_filter( $hook, $var );
        $this->assertNotSame( $var, $filtered );
        
        return $hook;
	}
    
    
	/**
	 * Check adding a filter with function within class
     *
     * Syntax tested: yourls_add_filter( $hook, 'Class::Function' );
	 *
	 * @since 0.1
	 */
	public function test_add_filter_within_class() {
        $hook = rand_str();
        $this->assertFalse( yourls_has_filter( $hook ) );
        yourls_add_filter( $hook, 'Change_Variable::change_it' );
        $this->assertTrue( yourls_has_filter( $hook ) );
               
        return $hook;
	}
    
	/**
	 * Check applying a filter hooked with function within class
	 *
	 * @depends test_add_filter_within_class
	 * @since 0.1
	 */
	public function test_apply_filter_within_class( $hook ) {
        $var = rand_str();
        
        $filtered = yourls_apply_filter( $hook, $var );
        $this->assertNotSame( $var, $filtered );
        
        return $hook;
	}
    

	/**
	 * Check adding filter with function within class using an array
     *
     * Syntax tested: yourls_add_filter( $hook, array( 'Class', 'Function' ) );
	 *
	 * @since 0.1
	 */
	public function test_add_filter_within_class_array() {
        $hook = rand_str();
        $this->assertFalse( yourls_has_filter( $hook ) );
        yourls_add_action( $hook, array( 'Change_Variable', 'change_it' ) );
        $this->assertTrue( yourls_has_filter( $hook ) );
               
        return $hook;
	}
    
	/**
	 * Check applying a filter hooked with function within class
	 *
	 * @depends test_add_filter_within_class_array
	 * @since 0.1
	 */
	public function test_apply_filter_within_class_array( $hook ) {
        $var = rand_str();
        
        $filtered = yourls_apply_filter( $hook, $var );
        $this->assertNotSame( $var, $filtered );
        
        return $hook;
	}
    

	/**
	 * Check adding a filter with function within class instance
     *
     * Syntax tested: yourls_add_filter( $hook, array( $class, 'function' ) );
	 *
	 * @since 0.1
	 */
	public function test_add_filter_within_class_instance() {
        $hook = rand_str();
        $this->assertFalse( yourls_has_filter( $hook ) );
        yourls_add_action( $hook, array( $this, 'change_variable' ) );
        $this->assertTrue( yourls_has_filter( $hook ) );
               
        return $hook;
	}
    
	/**
	 * Check applying a filter hooked with function within class instance
	 *
	 * @depends test_add_filter_within_class_instance
	 * @since 0.1
	 */
	public function test_apply_filter_within_class_instance( $hook ) {
        $var = rand_str();
        
        $filtered = yourls_apply_filter( $hook, $var );
        $this->assertNotSame( $var, $filtered );
        
        return $hook;
	}
    

	/**
	 * Check adding a filter with anonymous function using closure
     *
     * Syntax tested: yourls_add_action( $hook, function(){ // do stuff } );
	 *
	 * @since 0.1
	 */
	public function test_add_filter_closure() {
        $hook = rand_str();
        $this->assertFalse( yourls_has_action( $hook ) );
        yourls_add_action( $hook, function() { return rand_str(); } );
        $this->assertTrue( yourls_has_action( $hook ) );
               
        return $hook;
	}
    
	/**
	 * Check applygin a filter hooked with anonymous function using closure
	 *
	 * @depends test_add_filter_closure
	 * @since 0.1
	 */
	public function test_apply_filter_closure( $hook ) {
        $var = rand_str();
        
        $filtered = yourls_apply_filter( $hook, $var );
        $this->assertNotSame( $var, $filtered );
        
        return $hook;
	}
    
    
    /**
     * Dummy function -- just modifies the value of a global var
     */
    public function change_one_global() {
        $var_name = $GLOBALS['test_var'];
        $GLOBALS[ $var_name ] = rand_str();
    }

    /**
     * Dummy function -- just modifies the value of a var
     */
    public function change_variable( $var ) {
        $var = rand_str();
        return $var;
    }

}
