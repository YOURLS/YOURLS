<?php
namespace YOURLS\Tests\Users;

use PHPUnit\Framework\TestCase;

class UserCrudTest extends TestCase
{
    protected function setUp(): void
    {
        $ydb = \yourls_get_db();
        $ydb->perform("DELETE FROM `".YOURLS_DB_TABLE_USERS."` WHERE username LIKE 'crudtest_%'");
    }

    public function test_create_user_returns_id_and_inserts_row()
    {
        $id = \yourls_create_user('crudtest_alice', 'p@ssw0rd1', 'editor');
        $this->assertIsInt($id);
        $this->assertGreaterThan(0, $id);

        $row = \yourls_get_user_by_username('crudtest_alice');
        $this->assertNotNull($row);
        $this->assertSame('editor', $row['role']);
        $this->assertSame(1, (int) $row['is_active']);
        $this->assertSame(1, (int) $row['api_key_version']);
        $this->assertTrue(password_verify('p@ssw0rd1', $row['password_hash']));
    }

    public function test_create_user_default_role_is_editor()
    {
        $id = \yourls_create_user('crudtest_bob', 'p@ssw0rd1');
        $row = \yourls_get_user_by_username('crudtest_bob');
        $this->assertSame('editor', $row['role']);
    }

    public function test_create_user_inactive_when_requested()
    {
        $id = \yourls_create_user('crudtest_inactive', 'p@ssw0rd1', 'editor', false);
        $row = \yourls_get_user_by_username('crudtest_inactive');
        $this->assertSame(0, (int) $row['is_active']);
    }

    public function test_create_user_rejects_duplicate_username()
    {
        \yourls_create_user('crudtest_dup', 'p@ssw0rd1', 'editor');
        $this->expectException(\RuntimeException::class);
        \yourls_create_user('crudtest_dup', 'other_pwd_long', 'admin');
    }

    public function test_create_user_rejects_invalid_role()
    {
        $this->expectException(\InvalidArgumentException::class);
        \yourls_create_user('crudtest_carol', 'p@ssw0rd1', 'superuser');
    }

    public function test_create_user_rejects_short_password()
    {
        $this->expectException(\InvalidArgumentException::class);
        \yourls_create_user('crudtest_dave', 'short', 'editor');
    }

    public function test_create_user_rejects_invalid_username()
    {
        $this->expectException(\InvalidArgumentException::class);
        \yourls_create_user('bad name with spaces', 'p@ssw0rd1', 'editor');
    }

    public function test_create_user_rejects_empty_username()
    {
        $this->expectException(\InvalidArgumentException::class);
        \yourls_create_user('', 'p@ssw0rd1', 'editor');
    }

    public function test_create_user_rejects_oversized_username()
    {
        $this->expectException(\InvalidArgumentException::class);
        \yourls_create_user(str_repeat('a', 65), 'p@ssw0rd1', 'editor');
    }

    public function test_create_user_password_min_length_filterable()
    {
        $cb = function ($len) { return 4; };
        \yourls_add_filter('user_password_min_length', $cb, 5);
        try {
            $id = \yourls_create_user('crudtest_short', 'four', 'editor');
            $this->assertIsInt($id);
        } finally {
            global $yourls_filters;
            if (isset($yourls_filters['user_password_min_length'][5])) {
                unset($yourls_filters['user_password_min_length'][5]);
            }
        }
    }
}
