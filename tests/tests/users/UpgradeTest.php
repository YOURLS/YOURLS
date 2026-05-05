<?php
namespace YOURLS\Tests\Users;

use PHPUnit\Framework\TestCase;

class UpgradeTest extends TestCase
{
    public function test_upgrade_to_509_adds_user_columns()
    {
        $ydb = \yourls_get_db();
        $table = YOURLS_DB_TABLE_USERS;

        // Drop the new columns to simulate pre-509 state, then run upgrade
        foreach (['role', 'api_key_version', 'last_login_at'] as $col) {
            try { $ydb->perform("ALTER TABLE `$table` DROP COLUMN `$col`"); } catch (\Exception $e) {}
        }

        ob_start();
        \yourls_upgrade_to_509();
        ob_end_clean();

        $cols = array_column((array) $ydb->fetchObjects("SHOW COLUMNS FROM `$table`"), 'Field');
        $this->assertContains('role', $cols);
        $this->assertContains('api_key_version', $cols);
        $this->assertContains('last_login_at', $cols);
    }

    public function test_upgrade_to_509_adds_created_by_to_url_table()
    {
        $ydb = \yourls_get_db();
        $table = YOURLS_DB_TABLE_URL;
        try { $ydb->perform("ALTER TABLE `$table` DROP COLUMN `created_by`"); } catch (\Exception $e) {}

        ob_start();
        \yourls_upgrade_to_509();
        ob_end_clean();

        $cols = array_column((array) $ydb->fetchObjects("SHOW COLUMNS FROM `$table`"), 'Field');
        $this->assertContains('created_by', $cols);
    }

    public function test_upgrade_to_509_creates_api_rate_table()
    {
        $ydb = \yourls_get_db();
        try { $ydb->perform('DROP TABLE IF EXISTS `'.YOURLS_DB_TABLE_API_RATE.'`'); } catch (\Exception $e) {}

        ob_start();
        \yourls_upgrade_to_509();
        ob_end_clean();

        $exists = $ydb->fetchAffected("SHOW TABLES LIKE '".YOURLS_DB_TABLE_API_RATE."'");
        $this->assertGreaterThan(0, $exists);
    }

    public function test_upgrade_to_509_is_idempotent()
    {
        ob_start();
        \yourls_upgrade_to_509();
        \yourls_upgrade_to_509();  // should not throw
        ob_end_clean();
        $this->assertTrue(true);
    }

    public function test_existing_users_default_to_admin_role()
    {
        $ydb = \yourls_get_db();
        $table = YOURLS_DB_TABLE_USERS;

        try { $ydb->perform("ALTER TABLE `$table` DROP COLUMN `role`"); } catch (\Exception $e) {}
        ob_start(); \yourls_upgrade_to_509(); ob_end_clean();

        $rows = $ydb->fetchObjects("SELECT username, role FROM `$table`");
        foreach ((array) $rows as $row) {
            $this->assertSame('admin', $row->role);
        }
    }
}
