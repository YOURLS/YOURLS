<?php

/**
 * Test sandboxed file loader
 *
 * @since 1.9.1
 */
#[\PHPUnit\Framework\Attributes\Group('functions')]
class FileLoaderTest extends PHPUnit\Framework\TestCase {

    /**
     * Load valid file = true
     */
    public function test_load_file_exists() {
        $file = YOURLS_TESTDATA_DIR . "/" . rand_str() . ".php";
        if( touch("$file") ) {
            $this->assertTrue( yourls_include_file_sandbox( $file ) );
            unlink("$file");
        } else {
            $this->markTestSkipped( "Cannot create test '$file");
        }
    }

    /**
     * Load missing file = string
     */
    public function test_load_file_not_exists() {
        $this->assertIsString( yourls_include_file_sandbox( YOURLS_TESTDATA_DIR . "/" . rand_str() . ".php" ) );
    }

    /**
     * For tests to load valid and broken PHP code: see in tests/plugins/files.php
     */

}
