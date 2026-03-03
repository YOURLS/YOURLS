<?php

/**
 * Shunt filter related tests
 *
 * Before 1.10.4, shunt filters were checked for false values, which was not efficient as filtered functions can
 * legitimately return false. We're now checking that any kind of returned value can be handled correctly in a shunt.
 */
#[\PHPUnit\Framework\Attributes\Group('plugins')]
class ShuntFiltersTest extends PHPUnit\Framework\TestCase {

    protected function tearDown(): void {
        // Remove all filters after each test to avoid interference
        yourls_remove_all_filters('shunt_test_function');
    }

    /**
     * Return values that should be handled correctly by shunt filters
     */
    public static function legitimate_return_values(): array {
        return [
            'false' => [false],
            'null' => [null],
            'zero' => [0],
            'empty string' => [''],
            'empty array' => [[]],
            'object' => [new stdClass()],
            'string' => ['test'],
            'array' => [['key' => 'value']],
        ];
    }

    /**
     * Test that without a filter, default behavior is executed
     */
    public function test_no_shunt_executes_default() {
        // No filter added
        $result = $this->some_function_with_shunt();

        $this->assertEquals('default behavior', $result);
    }

    /**
     * Test that shunt handles all legitimate return values
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('legitimate_return_values')]
    public function test_shunt_handles_legitimate_values($value) {
        yourls_add_filter('shunt_test_function', function() use ($value) {
            return $value;
        });

        $result = $this->some_function_with_shunt();
        $this->assertSame($value, $result);
    }

    /**
     * Test that shunt prevents default execution
     */
    public function test_shunt_prevents_default_execution() {
        $default_was_executed = false;

        yourls_add_filter('shunt_test_function', function() {
            return 'shunted result';
        });

        $result = $this->some_function_with_shunt_tracking($default_was_executed);

        $this->assertEquals('shunted result', $result);
        $this->assertFalse($default_was_executed, 'Default behavior should not execute when shunted');
    }

    /**
     * Test that multiple shunt filters can be chained
     */
    public function test_multiple_shunt_filters_chain() {
        yourls_add_filter('shunt_test_function', function($return) {
            if ($return === yourls_shunt_default()) {
                return 'first filter';
            }
            return $return;
        });

        yourls_add_filter('shunt_test_function', function($return) {
            if ($return === 'first filter') {
                return 'second filter modified';
            }
            return $return;
        });

        $result = $this->some_function_with_shunt();

        $this->assertEquals('second filter modified', $result);
    }

    /**
     * Helper: Simulated function that uses shunt pattern
     */
    private function some_function_with_shunt() {
        $pre = yourls_apply_filter('shunt_test_function', yourls_shunt_default(), 'arg1');
        if (yourls_shunt_default() !== $pre) {
            return $pre;
        }
        return 'default behavior';
    }

    /**
     * Helper: Simulated function with execution tracking
     */
    private function some_function_with_shunt_tracking(&$executed) {
        $pre = yourls_apply_filter('shunt_test_function', yourls_shunt_default(), 'arg1');
        if (yourls_shunt_default() !== $pre) {
            return $pre;
        }

        $executed = true;
        return 'default behavior';
    }

}
