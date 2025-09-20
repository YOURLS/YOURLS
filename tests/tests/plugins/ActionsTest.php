<?php

/**
 * Action related tests
 *
 * @since 0.1
 */
#[\PHPUnit\Framework\Attributes\Group('plugins')]
class ActionsTest extends PHPUnit\Framework\TestCase {

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
     * Remove an action
     *
     * @since 0.1
     */
    public function test_remove_action() {
        $hook = rand_str();
        $action = rand_str();

        $this->assertFalse( yourls_has_action( $hook ) );
        yourls_add_action( $hook, $action );
        $this->assertTrue( yourls_has_action( $hook ) );
        $this->assertSame( 10, yourls_has_action( $hook, $action ) );

        yourls_remove_action( $hook, $action );
        $this->assertFalse( yourls_has_action( $hook ) );
    }

    /**
     * Add several actions on the same hook
     *
     * @since 0.1
     */
    public function test_add_several_actions_default_priority() {
        $hook = rand_str();

        $times = mt_rand( 5, 15 );
        for ( $i = 1; $i <= $times; $i++ ) {
            yourls_add_action( $hook, rand_str() );
        }

        $this->assertTrue( yourls_has_action( $hook ) );
        global $yourls_filters;
        $this->assertCount( $times, $yourls_filters[ $hook ][10] );
    }

    /**
     * Add several actions on the same hook with different priorities
     *
     * @since 0.1
     */
    public function test_add_several_actions_random_priorities() {
        $hook = rand_str();

        $times = mt_rand( 5, 15 );
        for ( $i = 1; $i <= $times; $i++ ) {
            yourls_add_action( $hook, rand_str(), mt_rand( 1, 10 ) );
        }

        $this->assertTrue( yourls_has_action( $hook ) );

        global $yourls_filters;
        $total = 0;
        foreach( $yourls_filters[ $hook ] as $prio => $action ) {
            $total += count( $yourls_filters[ $hook ][ $prio ] );
        }

        $this->assertSame( $times, $total );
    }

    /**
     * Remove all actions on a hook
     *
     * @since 0.1
     */
    public function test_remove_all_actions() {
        $hook = rand_str();

        $times = mt_rand( 5, 15 );
        for ( $i = 1; $i <= $times; $i++ ) {
            yourls_add_action( $hook, rand_str() );
        }

        $this->assertTrue( yourls_has_action( $hook ) );
        yourls_remove_all_actions( $hook );
        $this->assertFalse( yourls_has_action( $hook ) );
    }

    /**
     * Remove all actions with random priorities on a hook
     *
     * @since 0.1
     */
    public function test_remove_all_actions_random_prio() {
        $hook = rand_str();

        $times = mt_rand( 5, 15 );
        for ( $i = 1; $i <= $times; $i++ ) {
            yourls_add_action( $hook, rand_str(), mt_rand( 1, 10 ) );
        }

        $this->assertTrue( yourls_has_action( $hook ) );
        yourls_remove_all_actions( $hook );
        $this->assertFalse( yourls_has_action( $hook ) );
    }

    /**
     * Remove all actions with specific priority
     *
     * @since 0.1
     */
    public function test_remove_only_actions_with_given_prio() {
        $hook = rand_str();
        $priorities = array();

        $times = mt_rand( 10, 30 );
        for ( $i = 1; $i <= $times; $i++ ) {
            $prio = mt_rand( 1, 100 );
            $priorities[] = $prio;
            yourls_add_action( $hook, rand_str(), $prio );
        }
        $this->assertTrue( yourls_has_action( $hook ) );

        global $yourls_filters;

        // Pick a random number of randomly picked priorities (but not all of them)
        $priorities = array_unique( $priorities );
        $random_priorities = (array) array_rand( $priorities, mt_rand( 1, count( $priorities ) - 1 ) );

        // Count how many we're supposed to remove
        $removed = 0;
        foreach( $yourls_filters[ $hook ] as $prio => $action ) {
            if( in_array( $prio, $random_priorities ) )
                $removed += count( $yourls_filters[ $hook ][ $prio ] );
        }

        // Remove the randomly picked priorities
        foreach( $random_priorities as $random_priority ) {
            yourls_remove_all_actions( $hook, $random_priority );
        }

        $this->assertTrue( yourls_has_action( $hook ) );

        // Count how many are left
        $remaining = 0;
        foreach( $yourls_filters[ $hook ] as $prio => $action ) {
            $remaining += count( $yourls_filters[ $hook ][ $prio ] );
        }
        $this->assertSame( $remaining, $times - $removed );
    }

    /**
     * Check 'doing' an action hooked with a simple function name
     *
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\Depends('test_add_action_funcname')]
    public function test_do_action_funcname( $hook ) {
        $var_name  = rand_str();
        $var_value = rand_str();
        $GLOBALS['test_var']  = $var_name;
        $GLOBALS[ $var_name ] = $var_value;

        $this->assertSame( $var_value, $GLOBALS[ $var_name ] );
        $this->assertSame( 0, yourls_did_action( $hook ) );
        yourls_do_action( $hook );
        $this->assertSame( 1, yourls_did_action( $hook ) );
        $this->assertNotSame( $var_value, $GLOBALS[ $var_name ] );

        return $hook;
    }

    /**
     * Check we keep correct track of the number of time an action is done
     *
     * @since 0.1
     */
    public function test_do_action_several_times_and_count() {
        $hook = rand_str();
        $this->assertSame( 0, yourls_did_action( $hook ) );

        $times = mt_rand( 5, 15 );
        for ( $i = 1; $i <= $times; $i++ ) {
            yourls_do_action( $hook );
        }

        $this->assertSame( $times, yourls_did_action( $hook ) );
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
        yourls_add_action( $hook, function() {
            $var_name = $GLOBALS["test_var"]; $GLOBALS[ $var_name ] = rand_str();
        } );
        $this->assertTrue( yourls_has_action( $hook ) );

        return $hook;
    }

    /**
     * Check 'doing' an action hooked with an anonymous function using create_function()
     *
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\Depends('test_add_action_create_function')]
    public function test_do_action_create_function( $hook ) {
        $var_name  = rand_str();
        $var_value = rand_str();
        $GLOBALS['test_var']  = $var_name;
        $GLOBALS[ $var_name ] = $var_value;

        $this->assertSame( $var_value, $GLOBALS[ $var_name ] );
        $this->assertSame( 0, yourls_did_action( $hook ) );
        yourls_do_action( $hook );
        $this->assertSame( 1, yourls_did_action( $hook ) );
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
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\Depends('test_add_action_within_class')]
    public function test_do_action_within_class( $hook ) {
        $var_name  = rand_str();
        $var_value = rand_str();
        $GLOBALS['test_var']  = $var_name;
        $GLOBALS[ $var_name ] = $var_value;

        $this->assertSame( $var_value, $GLOBALS[ $var_name ] );
        $this->assertSame( 0, yourls_did_action( $hook ) );
        yourls_do_action( $hook );
        $this->assertSame( 1, yourls_did_action( $hook ) );
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
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\Depends('test_add_action_within_class_array')]
    public function test_do_action_within_class_array( $hook ) {
        $var_name  = rand_str();
        $var_value = rand_str();
        $GLOBALS['test_var']  = $var_name;
        $GLOBALS[ $var_name ] = $var_value;

        $this->assertSame( $var_value, $GLOBALS[ $var_name ] );
        $this->assertSame( 0, yourls_did_action( $hook ) );
        yourls_do_action( $hook );
        $this->assertSame( 1, yourls_did_action( $hook ) );
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
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\Depends('test_add_action_within_class_instance')]
    public function test_do_action_within_class_instance( $hook ) {
        $var_name  = rand_str();
        $var_value = rand_str();
        $GLOBALS['test_var']  = $var_name;
        $GLOBALS[ $var_name ] = $var_value;

        $this->assertSame( $var_value, $GLOBALS[ $var_name ] );
        $this->assertSame( 0, yourls_did_action( $hook ) );
        yourls_do_action( $hook );
        $this->assertSame( 1, yourls_did_action( $hook ) );
        $this->assertNotSame( $var_value, $GLOBALS[ $var_name ] );

        return $hook;
    }


    /**
     * Check that hooking to 'Class::Method' or array( 'Class', 'Method') is the same
     *
     * @since 0.1
     */
    public function test_add_action_class_and_array() {
        $hook = rand_str();

        $this->assertFalse( yourls_has_action( $hook ) );

        yourls_add_action( $hook, array( 'Class', 'Method' ) );
        $this->assertSame( 10, yourls_has_action( $hook, array( 'Class', 'Method' ) ) );
        $this->assertSame( 10, yourls_has_action( $hook, 'Class::Method' ) );
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
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\Depends('test_add_action_closure')]
    public function test_do_action_closure( $hook ) {
        $var_name  = rand_str();
        $var_value = rand_str();
        $GLOBALS['test_var']  = $var_name;
        $GLOBALS[ $var_name ] = $var_value;

        $this->assertSame( $var_value, $GLOBALS[ $var_name ] );
        $this->assertSame( 0, yourls_did_action( $hook ) );
        yourls_do_action( $hook );
        $this->assertSame( 1, yourls_did_action( $hook ) );
        $this->assertNotSame( $var_value, $GLOBALS[ $var_name ] );

        return $hook;
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
        yourls_add_action( $hook, rand_str() );
        // this will trigger an error, converted to an exception by PHPUnit
        yourls_do_action( $hook );
    }

    /**
     * Test yourls_do_action() with multiple params
     *
     * Note : this test will expectedly fail when YOURLS actions work the same as filters, see issue #1203
     *
     * @since 0.1
     */
    public function test_do_action_no_params() {
        $hook = rand_str();
        yourls_add_action( $hook, array( $this, 'accept_multiple_params' ) );

        $this->expectOutputString( "array (0 => '',)" );
        yourls_do_action( $hook );
    }

    /**
     * Test yourls_do_action() with multiple params
     *
     * Note : this test will expectedly fail when YOURLS actions work the same as filters, see issue #1203
     *
     * @since 0.1
     */
    public function test_do_action_1_params() {
        $hook = rand_str();
        yourls_add_action( $hook, array( $this, 'accept_multiple_params' ) );

        $this->expectOutputString( "array (0 => 'hello',)" );
        yourls_do_action( $hook, 'hello' );
    }

    /**
     * Test yourls_do_action() with multiple params
     *
     * Note : this test will expectedly fail when YOURLS actions work the same as filters, see issue #1203
     *
     * @since 0.1
     */
    public function test_do_action_2_params() {
        $hook = rand_str();
        yourls_add_action( $hook, array( $this, 'accept_multiple_params' ) );

        $this->expectOutputString( "array (0 => 'hello',1 => 'world',)" );
        yourls_do_action( $hook, 'hello', 'world' );
    }

    /**
     * Check return values of yourls_has_action()
     */
    public function test_has_action_return_values() {
        $hook = rand_str();

        yourls_add_action( $hook, 'some_function' );
        yourls_add_action( $hook, 'some_other_function', 1337 );

        $this->assertTrue( yourls_has_action( $hook ) );
        $this->assertSame( 10, yourls_has_action( $hook, 'some_function' ) );
        $this->assertSame( 1337, yourls_has_action( $hook, 'some_other_function' ) );
        $this->assertFalse( yourls_has_action( $hook, 'nope_not_this_function' ) );
    }

    /**
     * Check that yourls_get_actions() returns expected values
     */
    public function test_get_actions() {
        $hook = rand_str();

        yourls_add_action( $hook, 'some_function' );
        yourls_add_action( $hook, 'some_other_function', 1337 );

        $actions = yourls_get_actions( $hook );
        $this->assertArrayHasKey('some_function', $actions[10]);
        $this->assertArrayHasKey('some_other_function', $actions[1337]);

        $this->assertSame( [], yourls_get_actions( rand_str() ) );
    }

    /**
     * Dummy function -- just modifies the value of a global var
     */
    public function change_one_global() {
        $var_name = $GLOBALS['test_var'];
        $GLOBALS[ $var_name ] = rand_str();
    }

    /**
     * Dummy function -- echo in one line arguments passed
     */
    public function accept_multiple_params( $args ) {
        echo preg_replace( '/\s{2,}|\t|\n|\r/', '', var_export( $args, true ) );;
    }

}
