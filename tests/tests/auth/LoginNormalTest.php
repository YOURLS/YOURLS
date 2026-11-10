<?php

/**
 * Login tests - the regular way (submitting username & password)
 *
 * @since 0.1
 */
#[\PHPUnit\Framework\Attributes\Group('auth')]
#[\PHPUnit\Framework\Attributes\Group('login')]
class LoginNormalTest extends AbstractLoginTestCase {

    use LoginAssertionTrait;

    /**
     * Check that yourls_is_valid_user() can be called more than once - see #4170
     */
    public function test_login_form_checked_twice() {
        // Turn yourls_die() into a test failure instead of a process exit
        yourls_add_action( 'pre_yourls_die', function() { throw new Exception( 'I have died' ); }, 1 );

        $this->assertTrue( yourls_is_valid_user(), 'First check failed' );
        $this->assertTrue( defined('YOURLS_USER') );
        $this->assertTrue( yourls_is_valid_user(), 'Second check failed' );
    }

}
