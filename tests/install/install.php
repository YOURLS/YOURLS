<?php

/**
 * Checks MySQL DB server version getter
 *
 * @group install
 */
class Install_Tests extends PHPUnit_Framework_TestCase {

    protected $server;

    /**
     * Make a copy of $_SERVER
     */
    public function setUp() {
        $this->server = $_SERVER;
    }

    /**
     * Restore original $_SERVER
     */
    public function tearDown() {
        $_SERVER = $this->server;
    }

	/**
	 * Check if YOURLS is declared installed
	 *
	 * @since 0.1
	 */
	public function test_install() {
		$this->assertFalse( yourls_is_installed() );
		yourls_get_all_options();
		$this->assertTrue( yourls_is_installed() );
	}

	/**
	 * Check that tables were correctly populated during install
	 *
	 * @since 0.1
	 */
	public function test_init_tables() {
		// This should fail because these inserts have been taken care of during install
		$this->assertFalse( yourls_initialize_options() );
		$this->assertFalse( yourls_insert_sample_links() );
	}

    /**
     * Provide server signatures, wether they're Apache (true) or something else (false) and
     * the name of the redirect rule file (.htaccess or web.config)
     */
    public function servers() {
        return array(
            array( 'Very Common Apache', true,  '.htaccess'  ),
            array( 'LiteSpeed So Fast',  true,  '.htaccess'  ),
            array( 'meh IIS meh',        false, 'web.config' ),
        );
    }

	/**
	 * Check .htaccess creation
	 *
	 * @dataProvider servers
	 * @since 0.1
	 */
	public function test_htaccess( $server, $is_apache, $file ) {
        $_SERVER['SERVER_SOFTWARE'] = $server;
        
        $this->assertSame( $is_apache, yourls_is_apache() );
        
        if( file_exists( YOURLS_ABSPATH . '/' . $file ) )
            @unlink( YOURLS_ABSPATH . '/' . $file );
        
		$this->assertTrue( yourls_create_htaccess() );
		$this->assertFileExists( YOURLS_ABSPATH . '/' . $file );
	}

}
