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
        yield array( '__yourls_shunt__', 'yourls_shunt_default' );
    }

    /**
     * Check return values of yourls_return_something()
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('helpers')]
    public function test_check_timestamp( $value, $func ) {
        $this->assertSame( $value, call_user_func($func) );
    }

    /**
     * Callbacks without an object, and their predictable unique ID
     */
    public static function static_callbacks(): \Iterator {
        yield 'function name' => ['some_function', 'some_function'];
        yield 'static method as string' => ['SomeClass::SomeMethod', 'SomeClass::SomeMethod'];
        yield 'static method as array' => [['SomeClass', 'SomeMethod'], 'SomeClass::SomeMethod'];
    }

    /**
     * Test yourls_filter_unique_id() with callbacks that don't involve an object
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('static_callbacks')]
    public function test_yourls_filter_unique_id_static(string|array $callback, string $expected): void {
        $this->assertSame($expected, yourls_filter_unique_id($callback));
    }

    /**
     * Test yourls_filter_unique_id() with callbacks that involve an object: closures, invokable objects, object methods
     *
     * These IDs are unpredictable, so check that each one is a non-numeric string (a numeric string would be
     * cast to an integer array key), is stable for the same callback, and differs from all the others.
     */
    public function test_yourls_filter_unique_id_objects(): void {
        $object1 = new \ArrayObject();
        $object2 = new \ArrayObject();

        $callbacks = [
            // Two closures with the same code are still two distinct callbacks
            'closure 1'                => function() { return 1; },
            'closure 2'                => function() { return 1; },
            'first-class callable'     => strlen(...),
            'invokable object'         => new class { public function __invoke() {} },
            'object 1, method count'   => [$object1, 'count'],
            'object 1, other method'   => [$object1, 'getIterator'],
            'object 2, method count'   => [$object2, 'count'],
            // Same class and method as above, but called statically: must not collide with the instance callbacks
            'class name, method count' => ['ArrayObject', 'count'],
            'function name'            => 'strlen',
        ];

        $ids = [];
        foreach ($callbacks as $label => $callback) {
            $id = yourls_filter_unique_id($callback);
            $this->assertFalse(is_numeric($id), "ID for '$label' is numeric");
            $this->assertSame($id, yourls_filter_unique_id($callback), "ID for '$label' is not stable");
            $ids[$label] = $id;
        }

        $this->assertSame($ids, array_unique($ids), 'Some callbacks share the same ID');
    }

}
