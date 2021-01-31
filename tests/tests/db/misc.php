<?php

/**
 * Utilities
 *
 * @group db
 */

class Misc_DB_Tests extends PHPUnit\Framework\TestCase {

    public function test_get_num_queries() {
        $num = yourls_get_num_queries();
        $this->assertIsInt($num);
    }

}
