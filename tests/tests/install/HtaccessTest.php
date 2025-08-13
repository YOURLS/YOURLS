<?php

/**
 * Test htaccess creation & modification functions
 */
#[\PHPUnit\Framework\Attributes\Group('install')]
class HtaccessTest extends PHPUnit\Framework\TestCase {

    protected $server;

    /**
     * Make a copy of $_SERVER
     */
    public function setUp(): void {
        $this->server = $_SERVER;
    }

    /**
     * Restore original $_SERVER
     */
    public function tearDown(): void {
        $_SERVER = $this->server;
    }

    /**
     * Provide server signatures, wether they're Apache (true) or something else (false) and
     * the name of the redirect rule file (.htaccess or web.config)
     */
    public static function servers(): \Iterator
    {
        yield array( 'Very Common Apache', true,  '.htaccess'  );
        yield array( 'LiteSpeed So Fast',  true,  '.htaccess'  );
        yield array( 'meh IIS meh',        false, 'web.config' );
    }

	/**
     * Check .htaccess creation - general function, checking if file is created
     *
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('servers')]
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
    public static function htaccess_content(): \Iterator
    {
        yield array( 'original_nofile.txt' );
        yield array( 'original_empty.txt' );
        yield array( 'original_fresh-YOURLS-content.txt' );
        yield array( 'original_old-YOURLS-content.txt' );
        yield array( 'original_other-content.txt' );
    }

	/**
     * Check .htaccess creation - specific cases, checking file contents
     *
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('htaccess_content')]
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
