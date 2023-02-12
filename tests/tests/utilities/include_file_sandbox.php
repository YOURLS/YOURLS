<?php

/**
 * Test sandboxed file loader
 *
 * @group functions
 * @since 1.9.1
 */

class FileLoader_Test extends PHPUnit\Framework\TestCase {

    /**
     * Load empty file
     */
    public function test_load_file() {
        $file = YOURLS_TESTDATA_DIR . "/" . rand_str() . ".php";
        if( touch("$file") ) {
            $this->assertTrue( yourls_include_file_sandbox( $file ) );
            unlink("$file");
        } else {
            $this->markTestSkipped( "Cannot create test '$file");
        }
    }

    /**
     * For tests to load valid and broken PHP code: see in tests/plugins/files.php
     */

}
