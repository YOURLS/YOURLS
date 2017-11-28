<?php

/**
 * DB instance test
 *
 * @group db
 */
class DB_Set_Tests extends PHPUnit_Framework_TestCase {

    protected $ydb_copy = null;

    /**
     * Make a copy of $ydb
     */
    public function setUp() {
        global $ydb;
        $this->ydb_copy = $ydb;
        unset( $ydb );
    }

    /**
     * Restore original $ydb
     */
    public function tearDown() {
        global $ydb;
        $ydb = $this->ydb_copy;
    }

    public function test_set() {
        yourls_db_connect();
        
        global $ydb;
        $this->assertInstanceOf( '\YOURLS\Database\YDB', $ydb );
    }

}
