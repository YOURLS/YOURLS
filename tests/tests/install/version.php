<?php

/**
 * Checks version getters & checkers
 *
 * @group install
 */
class Install_Version_Tests extends PHPUnit\Framework\TestCase {

    protected $ydb_copy;

    /**
     * Make a copy of $ydb
     */
    public function setUp(): void {
        $this->ydb_copy = yourls_get_db();
    }

    /**
     * Restore original $ydb
     */
    public function tearDown(): void {
        yourls_set_db($this->ydb_copy);
    }

    /**
     * Provide various real-life-ish versions and how they should be sanitized
     */
    public function versions() {
        return array(
            array( 'omgmysql-5.5-ubuntu-4.20', '5.5' ),
            array( 'mysql5.5-ubuntu-4.20',     '5.5' ),
            array( '5.5-ubuntu-4.20',          '5.5' ),
            array( '5.5-beta2',                '5.5' ),
            array( 'mysql-5.5',                '5.5' ),
            array( '5.5',                      '5.5' ),
        );
    }

    /**
     * Test mysql version getter & version comparer
     *
     * @dataProvider versions
     */
    public function test_mysql_version( $version, $sanitized ) {
        yourls_set_db( new Mock_Version( $version ) );

        $this->assertSame( $sanitized, yourls_get_database_version() );
        // As of writing YOURLS needs MySQL 5.0+, so the following test should pass
        $this->assertTrue( yourls_check_database_version() );
    }

    /**
     * Test PHP min requirement version
     *
     */
    public function test_php_version() {
        $this->assertTrue( yourls_check_php_version() );
    }

}

/**
 * Mock a $ydb instance to simply return a version number
 */
class Mock_Version {

    public $version;

    public $captured_errors = array();

    public function __construct( $version ) {
        $this->version = $version;
    }

    public function mysql_version() {
        return $this->version;
    }
}
