<?php

/**
 * DB instance test
 */
#[\PHPUnit\Framework\Attributes\Group('db')]
class DBSetTest extends PHPUnit\Framework\TestCase {

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

    public function test_set() {
        yourls_set_db("hello");
        $this->assertSame( "hello", yourls_get_db() );
    }

    public function test_context_optional_parameter() {
        $db_default = yourls_get_db();
        $db_with_ctx = yourls_get_db('some_context');
        $this->assertSame($db_default, $db_with_ctx);
    }

    /**
     * Note to self : I'm unable to write a test to check that yourls_get_db(null)
     * actually unsets $ydb. It seems I'm hitting the limits to my understandings
     * of PHPUnit and global vars.
     *
     * For the record, the following doesn't work:
     *
     * public function test_unset() {
     *     $db = yourls_get_db();
     *     $this->assertTrue( isset($db) );    // OK
     *
     *     yourls_set_db(null);                // should unset $ydb
     *     global $ydb;
     *     yourls_ut_var_dump( $ydb );         // $ydb is still set and has the same value
     *     $this->assertFalse( isset($ydb) );  // Not OK
     * }
     *
     * Oh well. ¯\_(ツ)_/¯
     *
     */


}
