<?php

/**
 * Test htaccess creation & modification functions
 *
 * @group install
 */
class Install_htaccess_Tests extends PHPUnit_Framework_TestCase {

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
	 * Check .htaccess creation - general function, checking if file is created
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

    /**
     * Files in which we want to insert content
     */
    public function htaccess_content() {
        return array(
            array( 'original_nofile.txt' ),
            array( 'original_empty.txt' ),
            array( 'original_fresh-YOURLS-content.txt' ),
            array( 'original_old-YOURLS-content.txt' ),
            array( 'original_other-content.txt' ),
        );
    }

	/**
	 * Check .htaccess creation - specific cases, checking file contents
	 *
	 * @dataProvider htaccess_content
	 * @since 0.1
	 */
	public function test_htaccess_content( $filename ) {
        $newfile  = str_replace( 'original_', 'test_', $filename );
        $expected = str_replace( 'original_', 'expected_', $filename );

        $newfile  = YOURLS_TESTDATA_DIR . '/htaccess/' . $newfile;
        $filename = YOURLS_TESTDATA_DIR . '/htaccess/' . $filename;
        $expected = YOURLS_TESTDATA_DIR . '/htaccess/' . $expected;

        // If file exist, copy it (if file doesn't exist, it's because we're creating from scratch)
        if( file_exists( $filename ) ) {
            if ( !copy( $filename, $newfile ) ) {
                $this->markTestSkipped( "Cannot copy file $filename" );
            }
        }

        $marker = 'YOURLS';
        $content = array(
            'This is a test',
            'Hello World',
            '1,2... 1,2...',
        );

        // check we can create the htaccess
        $this->assertTrue( yourls_insert_with_markers( $newfile, $marker, $content ) );

        // check it is correctly create. First, remove line endings so tests are consistent between Windows and Linux
        // For this reason, we're not using $this->assertFileEquals()
        $exp = array_map( function($line) {return str_replace(array("\r", "\n"), '', $line);}, file($expected));
        $new = array_map( function($line) {return str_replace(array("\r", "\n"), '', $line);}, file($newfile));
        $this->assertSame($exp, $new);
        unlink( $newfile );
	}

}
