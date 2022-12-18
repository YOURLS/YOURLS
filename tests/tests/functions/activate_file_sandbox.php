<?php

/**
 * Test sandboxed file loader
 *
 * @group functions
 * @since 1.9.1
 */

class FileLoader_Test extends PHPUnit\Framework\TestCase {

    public function test_load_file() {
        $file = YOURLS_USERDIR . "/" . rand_str() . ".php";
        if( touch("$file") ) {
            $this->assertTrue( yourls_activate_file_sandbox( $file ) );
            unlink("$file");
        } else {
            $this->markTestSkipped( "Cannot create test '$file");
        }
    }

}
