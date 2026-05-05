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
        $ydb = \yourls_get_db();
        $users_table = YOURLS_DB_TABLE_USERS;

        // First run brings schema to v509
        ob_start(); \yourls_upgrade_to_509(); ob_end_clean();
        $cols_after_first = count((array) $ydb->fetchObjects("SHOW COLUMNS FROM `$users_table`"));

        // Second run must be a no-op: same column count, no thrown exception, no ALTER echoed
        ob_start();
        \yourls_upgrade_to_509();
        $second_output = ob_get_clean();
        $cols_after_second = count((array) $ydb->fetchObjects("SHOW COLUMNS FROM `$users_table`"));

        $this->assertSame($cols_after_first, $cols_after_second, 'second run must not change schema');
        $this->assertStringNotContainsString('Adding `role`', $second_output);
        $this->assertStringNotContainsString('Adding `api_key_version`', $second_output);
        $this->assertStringNotContainsString('Adding `last_login_at`', $second_output);
        $this->assertStringNotContainsString('Adding `created_by`', $second_output);
    }

    public function test_existing_users_default_to_admin_role()
    {
        $ydb = \yourls_get_db();
        $table = YOURLS_DB_TABLE_USERS;

        // Ensure the table is at pre-509 shape (no role column) AND has at least one row,
        // so the DEFAULT 'admin' clause is exercised on a live row.
        try { $ydb->perform("ALTER TABLE `$table` DROP COLUMN `role`"); } catch (\Exception $e) {}
        $ydb->perform("DELETE FROM `$table` WHERE username = 'upgradetest_seed'");
        $ydb->perform(
            "INSERT INTO `$table` (`username`, `password_hash`) VALUES (:u, :h)",
            ['u' => 'upgradetest_seed', 'h' => 'placeholder-hash']
        );

        ob_start(); \yourls_upgrade_to_509(); ob_end_clean();

        $rows = $ydb->fetchObjects("SELECT username, role FROM `$table`");
        $rows = (array) $rows;
        $this->assertNotEmpty($rows, 'test fixture must have at least one user row');
        foreach ($rows as $row) {
            $this->assertSame('admin', $row->role);
        }

        // Cleanup the seed
        $ydb->perform("DELETE FROM `$table` WHERE username = 'upgradetest_seed'");
    }
}
