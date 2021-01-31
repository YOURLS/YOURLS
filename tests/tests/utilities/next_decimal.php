<?php

/**
 * Utilities
 *
 * @group utils
 */

class NextDecimal_Tests extends PHPUnit\Framework\TestCase {

    public function test_get_next_decimal() {
        $id = yourls_get_next_decimal();
        $this->assertIsInt($id);
    }

    public function test_update_next_decimal_no_arg() {
        $id = yourls_get_next_decimal();
        yourls_update_next_decimal();
        $next = yourls_get_next_decimal();
        $this->assertSame($next, $id + 1);
    }

    public function test_update_next_decimal_with_arg() {
        $rand   = mt_rand(1500,2000);
        yourls_update_next_decimal($rand);
        $next = yourls_get_next_decimal();
        $this->assertSame($next, $rand);
    }

}
