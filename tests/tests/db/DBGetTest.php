<?php

/**
 * DB get instance test
 */
#[\PHPUnit\Framework\Attributes\Group('db')]
class DBGetTest extends PHPUnit\Framework\TestCase {

    protected $ydb_copy = null;

    /**
     * Make a copy of $ydb
     */
    public function setUp(): void {
        $this->ydb_copy = yourls_get_db('read-test_setup');
        yourls_set_db(null);
    }

    /**
     * Restore original $ydb
     */
    public function tearDown(): void {
        yourls_set_db($this->ydb_copy);
    }

    public function test_get() {
        $this->assertInstanceOf( '\YOURLS\Database\YDB', yourls_get_db('read-test_get') );
    }

    /**
     * Provide valid context strings
     */
    public static function valid_contexts(): \Iterator
    {
        yield array( 'read-do_something' );
        yield array( 'read-dothis' );
        yield array( 'write-do_something' );
        yield array( 'write-dothis' );
    }

    /**
     * Check that properly formatted contexts trigger no notice
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('valid_contexts')]
    public function test_get_with_valid_context($context) {
        $db = yourls_get_db($context);
        $this->assertInstanceOf( '\YOURLS\Database\YDB', $db );
    }

    /**
     * Provide invalid context strings
     */
    public static function invalid_contexts(): \Iterator
    {
        yield array( 'do_something' );
//        yield array( 'dothis' );
//        yield array( 'omg-do-it_already' );
//        yield array( 'read_something' );
//        yield array( 'write-SOME_THING' );
    }

    /**
     * Check that improperly formatted contexts trigger a notice - yet the default DB is returned
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('invalid_contexts')]
    public function test_get_with_invalid_context($context) {
        set_error_handler(function($errno, $errstr) {
            $this->assertEquals(E_USER_NOTICE, $errno);
            $this->assertStringContainsString('Improperly formatted yourls_get_db() context', $errstr);
            return true; // Prevent PHP's default error handler
        });
        $db = yourls_get_db($context);
        $this->assertInstanceOf( '\YOURLS\Database\YDB', $db );
        restore_error_handler();
    }

    /**
     * Check that missing context triggers a notice - yet the default DB is returned
     */
    public function test_get_with_empty_context() {
        set_error_handler(function($errno, $errstr) {
            $this->assertEquals(E_USER_NOTICE, $errno);
            $this->assertStringContainsString('Undefined yourls_get_db() context', $errstr);
            return true; // Prevent PHP's default error handler
        });
        $db = yourls_get_db();
        $this->assertInstanceOf( '\YOURLS\Database\YDB', $db );
        restore_error_handler();
    }

}
