<?php

/**
 * Utilities
 *
 * @group utils
 */

class YOURLSSite_Tests extends PHPUnit_Framework_TestCase {

    public function test_yourls_site() {
        $this->assertInternalType("string", yourls_get_yourls_site());
    }

}
