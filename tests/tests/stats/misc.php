<?php

/**
 * Stats functions
 *
 * @group stats
 */

class Misc_Stats_Tests extends PHPUnit\Framework\TestCase {

    public function test_do_log_redirect() {
        $this->assertIsBool(yourls_do_log_redirect());
    }

}
