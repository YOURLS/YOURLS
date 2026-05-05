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

    public function test_update_user_changes_role_and_active()
    {
        $id = \yourls_create_user('crudtest_eve', 'p@ssw0rd1', 'editor');
        \yourls_update_user($id, ['role' => 'admin', 'is_active' => false]);
        $row = \yourls_get_user_by_username('crudtest_eve');
        $this->assertSame('admin', $row['role']);
        $this->assertSame(0, (int) $row['is_active']);
    }

    public function test_update_user_changes_password_when_given()
    {
        $id = \yourls_create_user('crudtest_frank', 'p@ssw0rd1', 'editor');
        \yourls_update_user($id, ['password' => 'newP@ssw0rd2']);
        $row = \yourls_get_user_by_username('crudtest_frank');
        $this->assertTrue(password_verify('newP@ssw0rd2', $row['password_hash']));
    }

    public function test_update_user_empty_password_is_no_op()
    {
        $id = \yourls_create_user('crudtest_grace', 'p@ssw0rd1', 'editor');
        $original_hash = \yourls_get_user_by_username('crudtest_grace')['password_hash'];
        \yourls_update_user($id, ['password' => '', 'role' => 'admin']);
        $row = \yourls_get_user_by_username('crudtest_grace');
        $this->assertSame($original_hash, $row['password_hash']);
        $this->assertSame('admin', $row['role']);
    }

    public function test_update_user_can_rename()
    {
        $id = \yourls_create_user('crudtest_henry', 'p@ssw0rd1', 'editor');
        \yourls_update_user($id, ['username' => 'crudtest_henry_renamed']);
        $this->assertNull(\yourls_get_user_by_username('crudtest_henry'));
        $this->assertNotNull(\yourls_get_user_by_username('crudtest_henry_renamed'));
        // cleanup
        $ydb = \yourls_get_db();
        $ydb->perform("DELETE FROM `".YOURLS_DB_TABLE_USERS."` WHERE username = 'crudtest_henry_renamed'");
    }

    public function test_update_user_rejects_rename_to_existing()
    {
        \yourls_create_user('crudtest_iris', 'p@ssw0rd1', 'editor');
        $jane_id = \yourls_create_user('crudtest_jane', 'p@ssw0rd1', 'editor');
        $this->expectException(\RuntimeException::class);
        \yourls_update_user($jane_id, ['username' => 'crudtest_iris']);
    }

    public function test_update_user_rejects_unknown_id()
    {
        $this->expectException(\RuntimeException::class);
        \yourls_update_user(999999, ['role' => 'admin']);
    }

    public function test_update_user_rejects_invalid_id()
    {
        $this->expectException(\InvalidArgumentException::class);
        \yourls_update_user(0, ['role' => 'admin']);
    }

    public function test_update_user_rejects_invalid_role()
    {
        $id = \yourls_create_user('crudtest_kate', 'p@ssw0rd1', 'editor');
        $this->expectException(\InvalidArgumentException::class);
        \yourls_update_user($id, ['role' => 'archduke']);
    }

    public function test_rotate_api_key_increments_version()
    {
        $id = \yourls_create_user('crudtest_leon', 'p@ssw0rd1', 'editor');
        $before = (int) \yourls_get_user_by_username('crudtest_leon')['api_key_version'];
        \yourls_rotate_user_api_key($id);
        $after = (int) \yourls_get_user_by_username('crudtest_leon')['api_key_version'];
        $this->assertSame($before + 1, $after);
    }

    public function test_rotate_api_key_handles_unknown_id_silently()
    {
        // Should not throw — UPDATE with no matching row is a no-op.
        \yourls_rotate_user_api_key(999999);
        $this->assertTrue(true);
    }

    public function test_touch_last_login_sets_timestamp()
    {
        $id = \yourls_create_user('crudtest_mike', 'p@ssw0rd1', 'editor');
        $before = \yourls_get_user_by_username('crudtest_mike')['last_login_at'];
        $this->assertNull($before);
        \yourls_touch_last_login($id);
        $after = \yourls_get_user_by_username('crudtest_mike')['last_login_at'];
        $this->assertNotNull($after);
        $this->assertNotEmpty($after);
    }

    public function test_touch_last_login_silently_ignores_null_id()
    {
        // Must not throw / crash for config-file users (id is null)
        \yourls_touch_last_login(null);
        \yourls_touch_last_login(0);
        $this->assertTrue(true);
    }

    public function test_delete_user_removes_row()
    {
        $id = \yourls_create_user('crudtest_nick', 'p@ssw0rd1', 'editor');
        \yourls_delete_user($id);
        $this->assertNull(\yourls_get_user_by_username('crudtest_nick'));
    }

    public function test_cannot_delete_last_active_admin()
    {
        // Snapshot existing users so we can restore them after this destructive test
        $ydb = \yourls_get_db();
        $existing = $ydb->fetchObjects("SELECT * FROM `".YOURLS_DB_TABLE_USERS."`");
        $ydb->perform("DELETE FROM `".YOURLS_DB_TABLE_USERS."`");

        $admin_id = \yourls_create_user('crudtest_solo_admin', 'p@ssw0rd1', 'admin');
        try {
            $thrown = null;
            try {
                \yourls_delete_user($admin_id);
            } catch (\RuntimeException $e) {
                $thrown = $e;
            }
            $this->assertNotNull($thrown, 'Expected RuntimeException for last-admin delete');
            $this->assertNotNull(\yourls_get_user_by_username('crudtest_solo_admin'),
                'last admin must remain in DB after refused delete');
        } finally {
            // Cleanup the test admin and restore prior users (best-effort)
            $ydb->perform("DELETE FROM `".YOURLS_DB_TABLE_USERS."` WHERE username = 'crudtest_solo_admin'");
            foreach ((array) $existing as $row) {
                $ydb->perform(
                    "INSERT IGNORE INTO `".YOURLS_DB_TABLE_USERS."` ".
                    "(`user_id`,`username`,`password_hash`,`role`,`is_active`,`api_key_version`,`last_login_at`,`created_at`,`updated_at`) ".
                    "VALUES (:uid,:un,:ph,:r,:ia,:akv,:lla,:ca,:ua)",
                    [
                        'uid' => (int) $row->user_id,
                        'un'  => $row->username,
                        'ph'  => $row->password_hash,
                        'r'   => $row->role,
                        'ia'  => (int) $row->is_active,
                        'akv' => (int) $row->api_key_version,
                        'lla' => $row->last_login_at,
                        'ca'  => $row->created_at,
                        'ua'  => $row->updated_at,
                    ]
                );
            }
        }
    }

    public function test_can_delete_admin_when_another_admin_exists()
    {
        $ydb = \yourls_get_db();
        $existing = $ydb->fetchObjects("SELECT * FROM `".YOURLS_DB_TABLE_USERS."`");
        $ydb->perform("DELETE FROM `".YOURLS_DB_TABLE_USERS."`");
        try {
            $a = \yourls_create_user('crudtest_admin_a', 'p@ssw0rd1', 'admin');
            $b = \yourls_create_user('crudtest_admin_b', 'p@ssw0rd1', 'admin');
            \yourls_delete_user($a);
            $this->assertNull(\yourls_get_user_by_username('crudtest_admin_a'));
            $this->assertNotNull(\yourls_get_user_by_username('crudtest_admin_b'));
        } finally {
            $ydb->perform("DELETE FROM `".YOURLS_DB_TABLE_USERS."` WHERE username LIKE 'crudtest_admin_%'");
            foreach ((array) $existing as $row) {
                $ydb->perform(
                    "INSERT IGNORE INTO `".YOURLS_DB_TABLE_USERS."` ".
                    "(`user_id`,`username`,`password_hash`,`role`,`is_active`,`api_key_version`,`last_login_at`,`created_at`,`updated_at`) ".
                    "VALUES (:uid,:un,:ph,:r,:ia,:akv,:lla,:ca,:ua)",
                    [
                        'uid' => (int) $row->user_id,
                        'un'  => $row->username,
                        'ph'  => $row->password_hash,
                        'r'   => $row->role,
                        'ia'  => (int) $row->is_active,
                        'akv' => (int) $row->api_key_version,
                        'lla' => $row->last_login_at,
                        'ca'  => $row->created_at,
                        'ua'  => $row->updated_at,
                    ]
                );
            }
        }
    }

    public function test_delete_user_rejects_unknown_id()
    {
        $this->expectException(\RuntimeException::class);
        \yourls_delete_user(999999);
    }

    public function test_user_is_last_active_admin_returns_true_when_alone()
    {
        $ydb = \yourls_get_db();
        $existing = $ydb->fetchObjects("SELECT * FROM `".YOURLS_DB_TABLE_USERS."`");
        $ydb->perform("DELETE FROM `".YOURLS_DB_TABLE_USERS."`");
        try {
            $solo = \yourls_create_user('crudtest_solo2', 'p@ssw0rd1', 'admin');
            $this->assertTrue(\yourls_user_is_last_active_admin($solo));
        } finally {
            $ydb->perform("DELETE FROM `".YOURLS_DB_TABLE_USERS."` WHERE username = 'crudtest_solo2'");
            foreach ((array) $existing as $row) {
                $ydb->perform(
                    "INSERT IGNORE INTO `".YOURLS_DB_TABLE_USERS."` ".
                    "(`user_id`,`username`,`password_hash`,`role`,`is_active`,`api_key_version`,`last_login_at`,`created_at`,`updated_at`) ".
                    "VALUES (:uid,:un,:ph,:r,:ia,:akv,:lla,:ca,:ua)",
                    [
                        'uid' => (int) $row->user_id, 'un' => $row->username, 'ph' => $row->password_hash,
                        'r' => $row->role, 'ia' => (int) $row->is_active, 'akv' => (int) $row->api_key_version,
                        'lla' => $row->last_login_at, 'ca' => $row->created_at, 'ua' => $row->updated_at,
                    ]
                );
            }
        }
    }

    public function test_user_is_last_active_admin_false_for_editor()
    {
        $id = \yourls_create_user('crudtest_editor_check', 'p@ssw0rd1', 'editor');
        $this->assertFalse(\yourls_user_is_last_active_admin($id));
    }

    public function test_user_is_last_active_admin_false_for_inactive_admin()
    {
        $id = \yourls_create_user('crudtest_inactive_admin', 'p@ssw0rd1', 'admin', false);
        $this->assertFalse(\yourls_user_is_last_active_admin($id));
    }

    public function test_user_is_last_active_admin_false_for_unknown()
    {
        $this->assertFalse(\yourls_user_is_last_active_admin(999999));
    }

    public function test_list_users_returns_array_of_assoc_rows()
    {
        \yourls_create_user('crudtest_list1', 'p@ssw0rd1', 'editor');
        \yourls_create_user('crudtest_list2', 'p@ssw0rd1', 'admin');
        $rows = \yourls_list_users();
        $this->assertIsArray($rows);
        $usernames = array_column($rows, 'username');
        $this->assertContains('crudtest_list1', $usernames);
        $this->assertContains('crudtest_list2', $usernames);
        // Each row must be an assoc array with the documented keys
        $first = $rows[0];
        $this->assertIsArray($first);
        foreach (['user_id', 'username', 'role', 'is_active', 'api_key_version', 'last_login_at', 'created_at', 'updated_at'] as $key) {
            $this->assertArrayHasKey($key, $first);
        }
    }
}
