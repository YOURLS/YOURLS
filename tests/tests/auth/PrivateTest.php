<?php

/**
 * Tests for YOURLS_PRIVATE related logic: yourls_is_private() and the
 * yourls_maybe_require_auth() gate that depends on it.
 *
 * These tests are written so they pass whatever value YOURLS_PRIVATE happens to
 * have in the test config: instead of asserting a hard-coded true/false, they
 * either compare against the constant itself or force a deterministic result
 * through the 'is_private' filter (which always overrules the constant). Both
 * branches (private / not private) are exercised explicitly.
 */
#[\PHPUnit\Framework\Attributes\Group('auth')]
#[\PHPUnit\Framework\Attributes\Group('private')]
class PrivateTest extends PHPUnit\Framework\TestCase {

    protected function tearDown(): void {
        // Drop anything a test forced, so we don't leak state between tests
        yourls_remove_all_filters( 'is_private' );
        yourls_remove_all_actions( 'require_auth' );
        yourls_remove_all_actions( 'require_no_auth' );
    }

    /**
     * yourls_is_private() always returns a boolean
     */
    public function test_yourls_is_private_is_bool() {
        $this->assertIsBool( yourls_is_private() );
    }

    /**
     * With nothing overruling it, yourls_is_private() reflects the YOURLS_PRIVATE
     * constant. This holds true regardless of the constant's actual value.
     */
    public function test_is_private_matches_constant() {
        $expected = defined( 'YOURLS_PRIVATE' ) && YOURLS_PRIVATE;
        $this->assertSame( $expected, yourls_is_private() );
    }

    /**
     * The 'is_private' filter forces the result to true, whatever the constant is
     */
    public function test_is_private_filter_can_force_true() {
        yourls_add_filter( 'is_private', 'yourls_return_true' );
        $this->assertTrue( yourls_is_private() );
    }

    /**
     * The 'is_private' filter forces the result to false, whatever the constant is
     */
    public function test_is_private_filter_can_force_false() {
        yourls_add_filter( 'is_private', 'yourls_return_false' );
        $this->assertFalse( yourls_is_private() );
    }

    /**
     * When not private, yourls_maybe_require_auth() fires 'require_no_auth' and
     * does not require authentication.
     */
    public function test_maybe_require_auth_when_not_private() {
        yourls_add_filter( 'is_private', 'yourls_return_false' );

        $require_auth    = yourls_did_action( 'require_auth' );
        $require_no_auth = yourls_did_action( 'require_no_auth' );

        yourls_maybe_require_auth();

        $this->assertSame( $require_auth, yourls_did_action( 'require_auth' ) );
        $this->assertSame( $require_no_auth + 1, yourls_did_action( 'require_no_auth' ) );
    }

    /**
     * When private, yourls_maybe_require_auth() fires 'require_auth' before
     * loading the auth machinery. We hook that action and throw, so we assert the
     * branch is taken without actually running (and dying inside) auth.php.
     */
    public function test_maybe_require_auth_when_private() {
        yourls_add_filter( 'is_private', 'yourls_return_true' );
        yourls_add_action( 'require_auth', function() {
            throw new Exception( 'require_auth fired' );
        } );

        $this->expectException( Exception::class );
        $this->expectExceptionMessage( 'require_auth fired' );

        yourls_maybe_require_auth();
    }

}
