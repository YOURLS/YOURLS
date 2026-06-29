<?php

/**
 * Pages
 */
#[\PHPUnit\Framework\Attributes\Group('pages')]
class PagesTest extends PHPUnit\Framework\TestCase {

    protected $tmp_page;

    protected function tearDown(): void {
        if ( $this->tmp_page && file_exists( $this->tmp_page ) ) {
            unlink( $this->tmp_page );
        }
        $this->tmp_page = null;

        yourls_remove_all_actions( 'pre_yourls_die' );
        yourls_remove_all_actions( 'pre_page' );
        yourls_remove_all_actions( 'post_page' );
    }

    /**
     * Create a temporary page file in YOURLS_PAGEDIR, registered for cleanup.
     * Returns the page name, or null if it couldn't be created.
     */
    private function make_page( string $content ): ?string {
        $page = rand_str();
        $file = YOURLS_PAGEDIR . "/$page.php";
        if ( @file_put_contents( $file, $content ) === false ) {
            return null;
        }
        $this->tmp_page = $file;
        return $page;
    }

    public function test_page_is_reserved() {
        $this->assertTrue( yourls_keyword_is_reserved('examplepage') );
    }

    public function test_examplepage() {
        $this->assertTrue(yourls_is_page('examplepage'));
    }

    public function test_no_page() {
        $this->assertFalse(yourls_is_page(rand_str()));
    }

    public function test_create_page_and_check_is_reserved() {
        $page = rand_str();
        if( touch(YOURLS_PAGEDIR . "/$page.php") ) {
            $this->assertTrue( yourls_keyword_is_reserved($page) );
            $this->assertTrue( yourls_is_page($page) );
            unlink(YOURLS_PAGEDIR . "/$page.php");
        } else {
            $this->markTestSkipped( "Cannot create 'pages/$page'" );
        }
    }

    /**
     * yourls_page() includes the page file, outputs its content and fires pre/post_page
     */
    public function test_yourls_page_includes_file_and_fires_actions() {
        $marker = rand_str();
        $page = $this->make_page( '<?php echo "' . $marker .'";' );
        if ( $page === null ) {
            $this->markTestSkipped( 'Cannot create a temporary page file' );
        }

        $pre  = yourls_did_action( 'pre_page' );
        $post = yourls_did_action( 'post_page' );

        ob_start();
        yourls_page( $page );
        $output = ob_get_clean();

        $this->assertStringContainsString( $marker, $output );
        $this->assertSame( $pre + 1,  yourls_did_action( 'pre_page' ) );
        $this->assertSame( $post + 1, yourls_did_action( 'post_page' ) );
    }

    /**
     * yourls_page() on an unknown page dies with a 404
     *
     * @throws Exception
     */
    public function test_yourls_page_not_found_dies_404() {
        $code = null;
        yourls_add_action( 'pre_yourls_die', function( $args ) use ( &$code ) {
            $code = $args[2];
            throw new Exception( 'died' );
        } );

        $this->expectException( Exception::class );
        $this->expectExceptionMessage( 'died' );

        try {
            yourls_page( rand_str() );
        } finally {
            $this->assertSame( 404, $code );
        }
    }

    /**
     * A page file that throws is caught by the sandbox and yields a 404
     *
     * @throws Exception
     */
    public function test_yourls_page_with_failing_file_dies_404() {
        $page = $this->make_page( '<?php throw new Exception("boom in page");' );
        if ( $page === null ) {
            $this->markTestSkipped( 'Cannot create a temporary page file' );
        }

        $code = null;
        yourls_add_action( 'pre_yourls_die', function( $args ) use ( &$code ) {
            $code = $args[2];
            throw new Exception( 'died' );
        } );

        $this->expectException( Exception::class );
        $this->expectExceptionMessage( 'died' );

        try {
            yourls_page( $page );
        } finally {
            $this->assertSame( 404, $code );
        }
    }

}
