<?php
namespace YOURLS\Tests\Users;

use PHPUnit\Framework\TestCase;

class RoleResolutionTest extends TestCase
{
    public function test_helpers_are_defined_and_callable()
    {
        $this->assertTrue(function_exists('yourls_current_user_id'));
        $this->assertTrue(function_exists('yourls_current_user_role'));
        $this->assertTrue(function_exists('yourls_current_user_can'));
        $this->assertTrue(function_exists('yourls_get_user_by_username'));
        $this->assertTrue(function_exists('yourls_user_owns_keyword'));
        $this->assertTrue(function_exists('yourls_current_user_row'));
    }

    public function test_get_user_by_username_returns_null_when_missing()
    {
        $this->assertNull(\yourls_get_user_by_username('does_not_exist_' . uniqid()));
    }

    public function test_get_user_by_username_returns_null_for_empty_input()
    {
        $this->assertNull(\yourls_get_user_by_username(''));
        $this->assertNull(\yourls_get_user_by_username(null));
    }

    public function test_anonymous_role_is_null_when_no_yourls_user_defined()
    {
        // YOURLS_USER may already be defined by a previous test or bootstrap.
        // Skip the strict-anonymous check in that case; the helper is verified by other tests.
        if (defined('YOURLS_USER')) {
            $this->markTestSkipped('YOURLS_USER already defined by environment');
        }
        $this->assertNull(\yourls_current_user_role());
        $this->assertNull(\yourls_current_user_id());
    }

    public function test_user_owns_keyword_false_for_null_user()
    {
        $this->assertFalse(\yourls_user_owns_keyword(null, 'anykw'));
        $this->assertFalse(\yourls_user_owns_keyword(0, 'anykw'));
    }
}
