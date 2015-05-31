<?php

/**
 * Checks if DB server is dead or alive, using MySQL, MySQLi & PDO
 *
 * @group db
 */
class DB_DOA_Tests extends PHPUnit_Framework_TestCase {

    protected $ydb_copy = null;

    /**
     * Make a copy of $ydb
     */
    public function setUp() {
        global $ydb;
        $this->ydb_copy = $ydb;
    }

    /**
     * Restore original $ydb
     */
    public function tearDown() {
        global $ydb;
        $ydb = $this->ydb_copy;
        restore_error_handler();
    }
    
    /**
     * Mockup DB connection
     */
    private function connect_db( $driver, $for_real = true ) {
        global $ydb;
        $class = yourls_require_db_files( $driver );
        $host = ( $for_real ? YOURLS_DB_HOST : rand_str() );
        try{
            $ydb = new $class( YOURLS_DB_USER, YOURLS_DB_PASS, YOURLS_DB_NAME, $host );
        } catch( Exception $e ) {
            $ydb = new stdClass;
        }
        $ydb->DB_driver = $driver;
        return $ydb;
    }
    
    /**
     * Mockup DB query
     */
    private function query( $ydb ) {
        // Calling an non-existant method generates a fatal error that is uncatchable : test first
        if( !method_exists( $ydb, 'query' ) ) {
            return false;
        }

        try{
            $ydb->query( 'SELECT 1;' );
        } catch( Exception $e ) {
            return false;
        }
        return true;
    }
    
    private function get_driver() {
        global $ydb;
        return $ydb->DB_driver;
    }
    
    public function test_connect_mysql() {
        if( !extension_loaded( 'mysql' ) ) {
            $this->markTestSkipped( 'MySQL extension not loaded -- skipping' );
            return false;
        }

        global $ydb;
        $ydb = $this->connect_db( 'mysql' );
        $this->assertEquals( 'mysql', $this->get_driver() );
        $this->assertTrue( $this->query( $ydb ) );
        $this->assertTrue( yourls_is_db_alive() );
    }

	/**
	 * @depends test_connect_mysql
	 */
    public function test_connect_mysql_fake() {
        global $ydb;
        $ydb = $this->connect_db( 'mysql', false );
        $this->assertFalse( $this->query( $ydb ) );
        $this->assertFalse( yourls_is_db_alive() );
    }

    public function test_connect_mysqli() {
        if( !extension_loaded( 'mysqli' ) ) {
            $this->markTestSkipped( 'MySQLi extension not loaded -- skipping' );
            return false;
        }

        global $ydb;
        $ydb = $this->connect_db( 'mysqli' );
        $this->assertEquals( 'mysqli', $this->get_driver() );
        $this->assertTrue( $this->query( $ydb ) );
        $this->assertTrue( yourls_is_db_alive() );
    }

	/**
	 * @depends test_connect_mysqli
	 */
    public function test_connect_mysqli_fake() {
        global $ydb;
        $ydb = $this->connect_db( 'mysqli', false );
        $this->assertFalse( $this->query( $ydb ) );
        $this->assertFalse( yourls_is_db_alive() );
    }

    public function test_connect_pdo() {
        if( !extension_loaded( 'pdo_mysql' ) ) {
            $this->markTestSkipped( 'PDO extension not loaded -- skipping' );
            return false;
        }

        global $ydb;
        $ydb = $this->connect_db( 'pdo' );
        $this->assertEquals( 'pdo', $this->get_driver() );
        $this->assertTrue( $this->query( $ydb ) );
        $this->assertTrue( yourls_is_db_alive() );
    }

	/**
	 * @depends test_connect_pdo
	 */
    public function test_connect_pdo_fake() {
        global $ydb;
        $ydb = $this->connect_db( 'pdo', false );
        $this->assertFalse( $this->query( $ydb ) );
        $this->assertFalse( yourls_is_db_alive() );
    }

}
