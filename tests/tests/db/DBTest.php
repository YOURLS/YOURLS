<?php

/**
 * Utilities
 */
#[\PHPUnit\Framework\Attributes\Group('db')]
class DBTest extends PHPUnit\Framework\TestCase {

    public function test_get_num_queries() {
        $num = yourls_get_num_queries();
        $this->assertIsInt($num);
    }

}
