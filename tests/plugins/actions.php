<?php

/**
 * Action related tests
 *
 * @since 0.1
 */

class Plugin_Actions_Tests extends PHPUnit_Framework_TestCase {

	/**
	 * Check adding an action with a simple function name
     *
     * Syntax tested: yourls_add_action( $hook, 'func_name' );
	 *
	 * @since 0.1
	 */
	public function test_add_action_funcname() {
        // Random function name
        $hook = rand_str();
        $this->assertFalse( yourls_has_action( $hook ) );
        yourls_add_action( $hook, rand_str() );
        $this->assertTrue( yourls_has_action( $hook ) );
        
        // Specific function name to test with yourls_do_action
        $hook = rand_str();
        $this->assertFalse( yourls_has_action( $hook ) );
        yourls_add_action( $hook, 'change_one_global' );
        $this->assertTrue( yourls_has_action( $hook ) );
        
        return $hook;
	}
    
	/**
	 * Check 'doing' an action hooked with a simple function name
	 *
	 * @depends test_add_action_funcname
	 * @since 0.1
	 */
	public function test_do_action_funcname( $hook ) {
        $var_name  = rand_str();
        $var_value = rand_str();
        $GLOBALS['test_var']  = $var_name;
        $GLOBALS[ $var_name ] = $var_value;
        
        $this->assertSame( $var_value, $GLOBALS[ $var_name ] );
        yourls_do_action( $hook );
        $this->assertNotSame( $var_value, $GLOBALS[ $var_name ] );
        
        return $hook;
	}

    
	/**
	 * Check adding an action with an anonymous function using create_function()
     *
     * Syntax tested: yourls_add_action( $hook, create_function() );
	 *
	 * @since 0.1
	 */
	public function test_add_action_create_function() {
        $hook = rand_str();
        $this->assertFalse( yourls_has_action( $hook ) );
        yourls_add_action( $hook, create_function( '', '$var_name = $GLOBALS["test_var"]; $GLOBALS[ $var_name ] = rand_str();' ) );
        $this->assertTrue( yourls_has_action( $hook ) );
               
        return $hook;
	}
    
	/**
	 * Check 'doing' an action hooked with an anonymous function using create_function()
	 *
	 * @depends test_add_action_create_function
	 * @since 0.1
	 */
	public function test_do_action_create_function( $hook ) {
        $var_name  = rand_str();
        $var_value = rand_str();
        $GLOBALS['test_var']  = $var_name;
        $GLOBALS[ $var_name ] = $var_value;
        
        $this->assertSame( $var_value, $GLOBALS[ $var_name ] );
        yourls_do_action( $hook );
        $this->assertNotSame( $var_value, $GLOBALS[ $var_name ] );
        
        return $hook;
	}
    
    
	/**
	 * Check adding an action with function within class
     *
     * Syntax tested: yourls_add_action( $hook, 'Class::Function' );
	 *
	 * @since 0.1
	 */
	public function test_add_action_within_class() {
        $hook = rand_str();
        $this->assertFalse( yourls_has_action( $hook ) );
        yourls_add_action( $hook, 'Change_One_Global::change_it' );
        $this->assertTrue( yourls_has_action( $hook ) );
               
        return $hook;
	}
    
	/**
	 * Check 'doing' an action hooked with function within class
	 *
	 * @depends test_add_action_within_class
	 * @since 0.1
	 */
	public function test_do_action_within_class( $hook ) {
        $var_name  = rand_str();
        $var_value = rand_str();
        $GLOBALS['test_var']  = $var_name;
        $GLOBALS[ $var_name ] = $var_value;
        
        $this->assertSame( $var_value, $GLOBALS[ $var_name ] );
        yourls_do_action( $hook );
        $this->assertNotSame( $var_value, $GLOBALS[ $var_name ] );
        
        return $hook;
	}
    

	/**
	 * Check adding an action with function within class using an array
     *
     * Syntax tested: yourls_add_action( $hook, array( 'Class', 'Function' ) );
	 *
	 * @since 0.1
	 */
	public function test_add_action_within_class_array() {
        $hook = rand_str();
        $this->assertFalse( yourls_has_action( $hook ) );
        yourls_add_action( $hook, array( 'Change_One_Global', 'change_it' ) );
        $this->assertTrue( yourls_has_action( $hook ) );
               
        return $hook;
	}
    
	/**
	 * Check 'doing' an action hooked with function within class
	 *
	 * @depends test_add_action_within_class_array
	 * @since 0.1
	 */
	public function test_do_action_within_class_array( $hook ) {
        $var_name  = rand_str();
        $var_value = rand_str();
        $GLOBALS['test_var']  = $var_name;
        $GLOBALS[ $var_name ] = $var_value;
        
        $this->assertSame( $var_value, $GLOBALS[ $var_name ] );
        yourls_do_action( $hook );
        $this->assertNotSame( $var_value, $GLOBALS[ $var_name ] );
        
        return $hook;
	}
    

	/**
	 * Check adding an action with function within class instance
     *
     * Syntax tested: yourls_add_action( $hook, array( $class, 'function' ) );
	 *
	 * @since 0.1
	 */
	public function test_add_action_within_class_instance() {
        $hook = rand_str();
        $this->assertFalse( yourls_has_action( $hook ) );
        yourls_add_action( $hook, array( $this, 'change_one_global' ) );
        $this->assertTrue( yourls_has_action( $hook ) );
               
        return $hook;
	}
    
	/**
	 * Check 'doing' an action hooked with function within class instance
	 *
	 * @depends test_add_action_within_class_instance
	 * @since 0.1
	 */
	public function test_do_action_within_class_instance( $hook ) {
        $var_name  = rand_str();
        $var_value = rand_str();
        $GLOBALS['test_var']  = $var_name;
        $GLOBALS[ $var_name ] = $var_value;
        
        $this->assertSame( $var_value, $GLOBALS[ $var_name ] );
        yourls_do_action( $hook );
        $this->assertNotSame( $var_value, $GLOBALS[ $var_name ] );
        
        return $hook;
	}
    

	/**
	 * Check adding an action with anonymous function using closure
     *
     * Syntax tested: yourls_add_action( $hook, function(){ // do stuff } );
	 *
	 * @since 0.1
	 */
	public function test_add_action_closure() {
        $hook = rand_str();
        $this->assertFalse( yourls_has_action( $hook ) );
        yourls_add_action( $hook, function() { $var_name = $GLOBALS['test_var']; $GLOBALS[ $var_name ] = rand_str(); } );
        $this->assertTrue( yourls_has_action( $hook ) );
               
        return $hook;
	}
    
	/**
	 * Check 'doing' an action hooked with anonymous function using closure
	 *
	 * @depends test_add_action_closure
	 * @since 0.1
	 */
	public function test_do_action_closure( $hook ) {
        $var_name  = rand_str();
        $var_value = rand_str();
        $GLOBALS['test_var']  = $var_name;
        $GLOBALS[ $var_name ] = $var_value;
        
        $this->assertSame( $var_value, $GLOBALS[ $var_name ] );
        yourls_do_action( $hook );
        $this->assertNotSame( $var_value, $GLOBALS[ $var_name ] );
        
        return $hook;
	}
    
    
    /**
     * Dummy function -- just modifies the value of a global var
     */
    
    public function change_one_global() {
        $var_name = $GLOBALS['test_var'];
        $GLOBALS[ $var_name ] = rand_str();
    }

}
