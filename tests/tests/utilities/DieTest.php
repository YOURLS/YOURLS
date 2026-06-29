<?php

/**
 * Tests for yourls_die()
 */
#[\PHPUnit\Framework\Attributes\Group('utils')]
class DieTest extends PHPUnit\Framework\TestCase {

    protected function tearDown(): void {
        yourls_remove_all_actions( 'pre_yourls_die' );
        yourls_remove_all_actions( 'yourls_die' );
        yourls_remove_all_filters( 'die_title' );
        yourls_remove_all_filters( 'die_message' );
    }

    /**
     * yourls_die() fires 'pre_yourls_die' first, passing message, title and HTTP code
     */
    public function test_fires_pre_hook_with_args() {
        $captured = [];
        yourls_add_action( 'pre_yourls_die', function( $args ) use ( &$captured ) {
            $captured = $args;
            throw new Exception( 'stop' );
        } );

        $this->expectException( Exception::class );
        $this->expectExceptionMessage( 'stop' );

        try {
            yourls_die( 'boom', 'Oops', 503 );
        } finally {
            $this->assertSame( [ 'boom', 'Oops', 503 ], $captured );
        }
    }

    /**
     * yourls_die() echoes the title and the message before dying.
     *
     * We throw from the 'yourls_die' action (fired after both echoes) so we can
     * read the buffered output without reaching die().
     */
    public function test_outputs_title_and_message() {
        yourls_add_action( 'yourls_die', function() { throw new Exception( 'stop' ); } );

        ob_start();
        try {
            yourls_die( 'my message', 'my title', 404 );
        } catch ( Exception $e ) {
            // expected, before die()
        }
        $output = ob_get_clean();

        $this->assertStringContainsString( 'my title', $output );
        $this->assertStringContainsString( 'my message', $output );
    }

    /**
     * The 'die_title' and 'die_message' filters can alter what's displayed
     */
    public function test_title_and_message_are_filterable() {
        yourls_add_filter( 'die_title',   fn() => 'FILTERED_TITLE' );
        yourls_add_filter( 'die_message', fn() => 'FILTERED_MESSAGE' );
        yourls_add_action( 'yourls_die', function() { throw new Exception( 'stop' ); } );

        ob_start();
        try {
            yourls_die( 'ignored message', 'ignored title', 500 );
        } catch ( Exception $e ) {
            // expected
        }
        $output = ob_get_clean();

        $this->assertStringContainsString( 'FILTERED_TITLE', $output );
        $this->assertStringContainsString( 'FILTERED_MESSAGE', $output );
        $this->assertStringNotContainsString( 'ignored title', $output );
    }

    /**
     * yourls_die() also fires the 'yourls_die' action so plugins can append content
     *
     * @throws Exception
     */
    public function test_fires_yourls_die_action() {
        $fired = false;
        yourls_add_action( 'yourls_die', function() use ( &$fired ) {
            $fired = true;
            throw new Exception( 'stop' );
        } );

        ob_start();
        try {
            yourls_die( 'msg', 'title', 404 );
        } catch ( Exception $e ) {
            // expected
        }
        ob_end_clean();

        $this->assertTrue( $fired );
    }

}
