<?php

/**
 * Stats functions
 */
#[\PHPUnit\Framework\Attributes\Group('stats')]
class StatsTest extends PHPUnit\Framework\TestCase {

    public function test_do_log_redirect() {
        $this->assertIsBool(yourls_do_log_redirect());
    }

}
