<?php

/**
 * Filter related tests
 *
 * @since 0.1
 */
#[\PHPUnit\Framework\Attributes\Group('plugins')]
class FiltersTest extends PHPUnit\Framework\TestCase {

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
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\Depends('test_add_filter_funcname')]
    public function test_apply_filter_funcname( $hook ) {
        $var = rand_str();

        $filtered = yourls_apply_filter( $hook, $var );
        $this->assertNotSame( $var, $filtered );
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
     * Check that default priority is 10
     *
     * @since 0.1
     */
    public function test_default_priority() {
        $hook = rand_str();
        global $yourls_filters;

        $this->assertArrayNotHasKey( $hook, $yourls_filters );
        yourls_add_filter( $hook, rand_str() );
        $this->assertArrayHasKey( 10, $yourls_filters[$hook] );
    }

    /**
     * Check removing a filter with non default priority
     *
     * @since 0.1
     */
    public function test_remove_filter_priority() {
        $hook = rand_str();
        $function = rand_str();
        // Random priority but not 10
        do {
            $priority = rand( 1,100 );
        } while ( $priority == 10 );

        $this->assertFalse( yourls_has_filter( $hook ) );
        yourls_add_filter( $hook, $function, $priority );
        $this->assertTrue( yourls_has_filter( $hook ) );

        $removed = yourls_remove_filter( $hook, $function );
        $this->assertFalse( $removed );

        $removed = yourls_remove_filter( $hook, $function, $priority );
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
        yourls_add_filter( $hook, function() {
            return rand_str();
        } );
        $this->assertTrue( yourls_has_filter( $hook ) );

        return $hook;
    }

    /**
     * Check applying a filter hooked with an anonymous function using create_function()
     *
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\Depends('test_add_filter_create_function')]
    public function test_apply_filter_create_function( $hook ) {
        $var = rand_str();

        $filtered = yourls_apply_filter( $hook, $var );
        $this->assertNotSame( $var, $filtered );
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
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\Depends('test_add_filter_within_class')]
    public function test_apply_filter_within_class( $hook ) {
        $var = rand_str();

        $filtered = yourls_apply_filter( $hook, $var );
        $this->assertNotSame( $var, $filtered );
    }

    /**
     * Check removing a filter hooked with function within class
     *
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\Depends('test_add_filter_within_class')]
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
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\Depends('test_add_filter_within_class_array')]
    public function test_apply_filter_within_class_array( $hook ) {
        $var = rand_str();
        $filtered = yourls_apply_filter( $hook, $var );
        $this->assertNotSame( $var, $filtered );
    }

    /**
     * Check removing a filter hooked with function within class using an array
     *
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\Depends('test_add_filter_within_class_array')]
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
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\Depends('test_add_filter_within_class_instance')]
    public function test_apply_filter_within_class_instance( $hook ) {
        $var = rand_str();
        $filtered = yourls_apply_filter( $hook, $var );
        $this->assertNotSame( $var, $filtered );
    }

    /**
     * Check removing a filter hooked with function within class
     *
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\Depends('test_add_filter_within_class_instance')]
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
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\Depends('test_add_filter_closure')]
    public function test_apply_filter_closure( $hook ) {
        $var = rand_str();

        $filtered = yourls_apply_filter( $hook, $var );
        $this->assertNotSame( $var, $filtered );
    }

    /**
     * Check applying multiple filters to one hook
     *
     * @since 0.1
     */
    public function test_multiple_filter() {
        $hook = rand_str();
        $var  = rand_str();

        yourls_add_filter( $hook, function( $in ) { return $in . "1"; } );
        yourls_add_filter( $hook, function( $in ) { return $in . "2"; } );

        $filtered = yourls_apply_filter( $hook, $var );
        $this->assertSame( $var . "1" . "2", $filtered );
    }

    /**
     * Check applying multiple filters with priorities to one hook
     *
     * @since 0.1
     */
    public function test_multiple_filter_with_priority() {
        $hook = rand_str();
        $var  = rand_str();

        yourls_add_filter( $hook, function( $in ) { return $in . "1"; }, 10 );
        yourls_add_filter( $hook, function( $in ) { return $in . "2"; }, 9 );

        $filtered = yourls_apply_filter( $hook, $var );
        $this->assertSame( $var . "2" . "1", $filtered );

        $hook = rand_str();
        $var  = rand_str();

        yourls_add_filter( $hook, function( $in ) { return $in . "1"; }, 10 );
        yourls_add_filter( $hook, function( $in ) { return $in . "2"; }, 11 );

        $filtered = yourls_apply_filter( $hook, $var );
        $this->assertSame( $var . "1" . "2", $filtered );
    }

    /**
     * Check return values of yourls_has_filter()
     *
     * @since 0.1
     */
    public function test_has_filter_return_values() {
        $hook = rand_str();

        yourls_add_filter( $hook, 'some_function' );
        yourls_add_filter( $hook, 'some_other_function', 1337 );

        $this->assertTrue( yourls_has_filter( $hook ) );
        $this->assertSame( 10, yourls_has_filter( $hook, 'some_function' ) );
        $this->assertSame( 1337, yourls_has_filter( $hook, 'some_other_function' ) );
        $this->assertFalse( yourls_has_filter( $hook, 'nope_not_this_function' ) );
    }

    /**
     * Check that yourls_get_filters() returns expected values
     */
    public function test_get_filters() {
        $hook = rand_str();

        yourls_add_filter( $hook, 'some_function' );
        yourls_add_filter( $hook, 'some_other_function', 1337 );

        $filters = yourls_get_filters( $hook );
        $this->assertArrayHasKey('some_function', $filters[10]);
        $this->assertArrayHasKey('some_other_function', $filters[1337]);

        $this->assertSame( [], yourls_get_filters( rand_str() ) );
    }

    /**
     * Check that applied function must exist
     *
     * @since 0.1
     */
    public function test_function_must_exist_if_applied() {
        if (PHP_VERSION_ID >= 80000) {
            $this->expectException(TypeError::class);
        } else {
            $this->expectException(PHPUnit\Framework\Error\Error::class);
        }
        $this->expectExceptionMessageMatches('/call_user_func_array\(\).* a valid callback, function (\'|")[0-9a-z]+(\'|") not found or invalid function name/');

        $hook = rand_str();
        yourls_add_filter( $hook, rand_str() );
        // this will trigger an error, converted to an exception by PHPUnit
        $test = yourls_apply_filter( $hook, rand_str() );
    }

    /**
     * Check filters accept multiple and defined number of arguments
     *
     * @since 0.1
     */
    public function test_filter_specified_arguments() {
        // Ask for 2 arguments and provide 2
        $hook = rand_str();
        yourls_add_filter( $hook, function( $var1 = '', $var2 = '' ) { return "$var1 $var2"; }, 10, 2 );
        $test = yourls_apply_filter( $hook, 'hello', 'world' );
        $this->assertSame( 'hello world', $test );

        // Ask for 1 argument and provide 2
        $hook = rand_str();
        yourls_add_filter( $hook, function( $var1 = '', $var2 = '' ) { return "$var1 $var2"; }, 10, 1 );
        $test = yourls_apply_filter( $hook, 'hello', 'world' );
        $this->assertSame( 'hello ', $test );

        // Ask for 2 arguments and provide 1
        $hook = rand_str();
        yourls_add_filter( $hook, function( $var1 = '', $var2 = '' ) { return "$var1 $var2"; }, 10, 2 );
        $test = yourls_apply_filter( $hook, 'hello' );
        $this->assertSame( 'hello ', $test );
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
     * Check applying multiple filters and count executions
     *
     * @since 0.1
     */
    public function test_multiple_filter_and_count() {
        $hook = rand_str();

        $times = mt_rand( 5, 15 );
        for ( $i = 1; $i <= $times; $i++ ) {
            // This will register every time a different closure function
            yourls_add_filter( $hook, function() { global $counter; ++$counter; return rand_str(); } );
        }

        global $counter;
        $counter = 0;
        $filtered = yourls_apply_filter( $hook, rand_str() );
        $this->assertSame( $times, $counter );
    }

    /**
     * Dummy function -- just modifies the value of a var
     */
    public function change_variable( $var ) {
        $var = rand_str();
        return $var;
    }

}
