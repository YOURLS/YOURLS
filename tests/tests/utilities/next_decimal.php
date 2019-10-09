<?php

/**
 * Utilities
 *
 * @group utils
 */
 
class NextDecimal_Tests extends PHPUnit_Framework_TestCase {

    public function test_get_next_decimal() {
        $id = yourls_get_next_decimal();
        $this->assertInternalType("int", $id);

        return $id;
    }

	/**
	 * @depends test_get_next_decimal
	 */
    public function test_update_next_decimal_no_arg($id) {
        $update = yourls_update_next_decimal();
        $this->assertTrue($update);
        $next = yourls_get_next_decimal();
        $this->assertSame($next, $id + 1);
    }

    /**
     * @depends test_get_next_decimal
     */
    public function test_update_next_decimal_with_arg($id) {
        $rand   = mt_rand(1500,2000);
        $update = yourls_update_next_decimal($rand);
        $this->assertTrue($update);
        $next = yourls_get_next_decimal();
        $this->assertSame($next, $rand);
    }

}
