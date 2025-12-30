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
        $this->ydb_copy = yourls_get_db();
        yourls_set_db(null);
    }

    /**
     * Restore original $ydb
     */
    public function tearDown(): void {
        yourls_set_db($this->ydb_copy);
    }

    public function test_get() {
        $this->assertInstanceOf( '\YOURLS\Database\YDB', yourls_get_db() );
    }

    // Provider for test_get_with_context
    public function context_provider() {
        return [
            ['read-test'],
            ['write-test'],
        ];
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
     * Check that properly formatted contexts log no error message
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('valid_contexts')]
    public function test_get_with_valid_context($context) {
        yourls_debug_log('Testing yourls_get_db() with '.$context);
        $db_default = yourls_get_db();
        $db_with_ctx = yourls_get_db($context);
        $this->assertSame($db_default, $db_with_ctx);
        $log = yourls_get_debug_log();
        $this->assertStringNotContainsString('yourls_get_db called with improperly formatted context', end($log));
    }

    /**
     * Provide invalid context strings
     */
    public static function invalid_contexts(): \Iterator
    {
        yield array( 'do_something' );
        yield array( 'dothis' );
        yield array( 'omg-do-it_already' );
        yield array( 'read_something' );
        yield array( 'write-SOME_THING' );
    }

    /**
     * Check that improperly formatted contexts log an error message
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('invalid_contexts')]
    public function test_get_with_invalid_context($context) {
        yourls_debug_log('Testing yourls_get_db() with '.$context);
        $db_default = yourls_get_db();
        $db_with_ctx = yourls_get_db($context);
        $this->assertSame($db_default, $db_with_ctx);
        $log = yourls_get_debug_log();
        $this->assertStringContainsString('yourls_get_db called with improperly formatted context', end($log));
    }
}
