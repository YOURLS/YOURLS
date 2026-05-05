<?php
namespace YOURLS\Tests\Users;

use PHPUnit\Framework\TestCase;

class ApiRateLimitTest extends TestCase
{
    private $editor_id;
    private $admin_id;

    protected function setUp(): void
    {
        $ydb = \yourls_get_db();
        $ydb->perform("DELETE FROM `".YOURLS_DB_TABLE_USERS."` WHERE username LIKE 'rltest_%'");
        $ydb->perform("DELETE FROM `".YOURLS_DB_TABLE_API_RATE."`");
        $this->editor_id = \yourls_create_user('rltest_editor', 'p@ssw0rd1', 'editor');
        $this->admin_id  = \yourls_create_user('rltest_admin', 'p@ssw0rd1', 'admin');
    }

    protected function tearDown(): void
    {
        $ydb = \yourls_get_db();
        $ydb->perform("DELETE FROM `".YOURLS_DB_TABLE_USERS."` WHERE username LIKE 'rltest_%'");
        $ydb->perform("DELETE FROM `".YOURLS_DB_TABLE_API_RATE."`");
    }

    public function test_admin_is_not_rate_limited()
    {
        for ($i = 0; $i < 200; $i++) {
            $this->assertTrue(\yourls_check_user_api_rate($this->admin_id, 'shorturl', /*test_mode*/ true));
        }
    }

    public function test_config_file_user_is_not_rate_limited()
    {
        // user_id = null simulates config-file / anonymous
        for ($i = 0; $i < 100; $i++) {
            $this->assertTrue(\yourls_check_user_api_rate(null, 'shorturl', true));
        }
    }

    public function test_editor_passes_under_limit()
    {
        $limit = (int) YOURLS_API_RATE_LIMIT_PER_WINDOW;
        for ($i = 0; $i < $limit; $i++) {
            $this->assertTrue(\yourls_check_user_api_rate($this->editor_id, 'shorturl', true));
        }
    }

    public function test_editor_throttled_at_limit_plus_one()
    {
        $limit = (int) YOURLS_API_RATE_LIMIT_PER_WINDOW;
        for ($i = 0; $i < $limit; $i++) {
            \yourls_check_user_api_rate($this->editor_id, 'shorturl', true);
        }
        // Next call must be throttled (test_mode returns false instead of dying)
        $this->assertFalse(\yourls_check_user_api_rate($this->editor_id, 'shorturl', true));
    }

    public function test_editor_each_user_has_independent_window()
    {
        $editor2 = \yourls_create_user('rltest_editor2', 'p@ssw0rd1', 'editor');
        $limit = (int) YOURLS_API_RATE_LIMIT_PER_WINDOW;
        for ($i = 0; $i < $limit; $i++) {
            \yourls_check_user_api_rate($this->editor_id, 'shorturl', true);
        }
        // editor2 must still be allowed even though editor1 is throttled
        $this->assertTrue(\yourls_check_user_api_rate($editor2, 'shorturl', true));
    }

    public function test_filterable_per_window_zero_disables_limit()
    {
        $cb = function () { return 0; };
        \yourls_add_filter('user_api_rate_limit_per_window', $cb, 5);
        try {
            for ($i = 0; $i < 500; $i++) {
                $this->assertTrue(\yourls_check_user_api_rate($this->editor_id, 'shorturl', true));
            }
        } finally {
            global $yourls_filters;
            if (isset($yourls_filters['user_api_rate_limit_per_window'][5])) {
                unset($yourls_filters['user_api_rate_limit_per_window'][5]);
            }
        }
    }
}
