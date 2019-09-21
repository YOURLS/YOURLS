<?php

/**
 * Stats functions
 *
 * @group stats
 */
 
class Misc_Stats_Tests extends PHPUnit_Framework_TestCase {

    public function test_do_log_redirect() {
        $this->assertInternalType("bool", yourls_do_log_redirect());        
    }

}
