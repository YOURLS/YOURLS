<?php

/**
 * Filter related tests
 *
 * @group plugins
 * @since 0.1
 */

class Plugin_Filters_Tests extends PHPUnit_Framework_TestCase {
    
    /**
     * this var will allow to share "$this" across multiple tests here
     */
    public static $instance;

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
        yourls_add_filter( $hook, rand_str() );
        $this->assertTrue( yourls_has_filter( $hook ) );
        
        // Specific function name to test with yourls_apply_filter
        $hook = rand_str();
        $this->assertFalse( yourls_has_filter( $hook ) );
        yourls_add_filter( $hook, 'change_variable' );
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
     * Check removing a filter hooked with a simple function name
     *
     * @since 0.1
     */
    public function test_remove_filter_funcname() {
        $hook = rand_str();
        $function = rand_str();
        
        $this->assertFalse( yourls_has_filter( $hook ) );
        yourls_add_filter( $hook, $function );
        $this->assertTrue( yourls_has_filter( $hook ) );
        
        $removed = yourls_remove_filter( $hook, $function );
        $this->assertTrue( $removed );
        $this->assertFalse( yourls_has_filter( $hook ) );        
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
        yourls_add_filter( $hook, create_function( '', 'return rand_str();' ) );
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
     * Check removing a filter hooked with function within class
     *
     * @depends test_add_filter_within_class
     * @since 0.1
     */
    public function test_remove_filter_within_class( $hook ) {
        $removed = yourls_remove_filter( $hook, 'Change_Variable::change_it' );
        $this->assertTrue( $removed );
        $this->assertFalse( yourls_has_filter( $hook ) );        
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
        yourls_add_filter( $hook, array( 'Change_Variable', 'change_it' ) );
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
     * Check removing a filter hooked with function within class using an array
     *
     * @depends test_add_filter_within_class_array
     * @since 0.1
     */
    public function test_remove_filter_within_class_array( $hook ) {
        $removed = yourls_remove_filter( $hook, array( 'Change_Variable', 'change_it' ) );
        $this->assertTrue( $removed );
        $this->assertFalse( yourls_has_filter( $hook ) );        
    }

    
	/**
	 * Check adding a filter with function within class instance
     *
     * Syntax tested: yourls_add_filter( $hook, array( $class, 'function' ) );
	 *
	 * @since 0.1
	 */
	public function test_add_filter_within_class_instance() {
        /* Note : in the unit tests context, we cannot rely on "$this" keeping the same
         * between tests, whereas it totally works in a "normal" class context
         * For this reason, using yourls_add_filter($hook, array($this, 'some_func')) in one test and 
         * yourls_remove_filter($hook,array($this,'some_func')) in another test doesn't work.
         * To circumvent this, we're storing $this in $instance.
         */
        self::$instance = $this;
        $hook = rand_str();
        $this->assertFalse( yourls_has_filter( $hook ) );
        yourls_add_filter( $hook, array( self::$instance, 'change_variable' ) );
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
     * Check removing a filter hooked with function within class
     *
     * @depends test_add_filter_within_class_instance
     * @since 0.1
     */
    public function test_remove_filter_within_class_instance( $hook ) {
        $this->assertTrue( yourls_has_filter( $hook ) );
        $removed = yourls_remove_filter( $hook, array( self::$instance, 'change_variable' ) );
        $this->assertTrue( $removed );
        $this->assertFalse( yourls_has_filter( $hook ) );
    }

	/**
	 * Check that hooking to 'Class::Method' or array( 'Class', 'Method') is the same
     *
	 * @since 0.1
	 */
	public function test_add_filter_class_and_array() {
        $hook = rand_str();
        
        $this->assertFalse( yourls_has_filter( $hook ) );
        
        yourls_add_filter( $hook, array( 'Class', 'Method' ) );
        $this->assertSame( 10, yourls_has_filter( $hook, array( 'Class', 'Method' ) ) );
        $this->assertSame( 10, yourls_has_filter( $hook, 'Class::Method' ) );
	}
    

	/**
	 * Check adding a filter with anonymous function using closure
     *
     * Syntax tested: yourls_add_filter( $hook, function(){ // do stuff } );
	 *
	 * @since 0.1
	 */
	public function test_add_filter_closure() {
        $hook = rand_str();
        $this->assertFalse( yourls_has_filter( $hook ) );
        yourls_add_filter( $hook, function() { return rand_str(); } );
        $this->assertTrue( yourls_has_filter( $hook ) );
               
        return $hook;
	}
       
	/**
	 * Check applying a filter hooked with anonymous function using closure
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
	 * Check applying multiple filters to one hook
	 *
	 * @depends test_apply_filter_closure
	 * @since 0.1
	 */
	public function test_multiple_filter() {
        $hook = rand_str();
        $var  = rand_str();
        
        yourls_add_filter( $hook, function( $in ) { return $in . "1"; } );
        yourls_add_filter( $hook, function( $in ) { return $in . "2"; } );
        
        $filtered = yourls_apply_filter( $hook, $var );
        $this->assertSame( $var . "1" . "2", $filtered );
        
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
