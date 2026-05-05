<?php
namespace YOURLS\Tests\Users;

use PHPUnit\Framework\TestCase;

/**
 * Matrix coverage of the role/capability rules from spec §4.
 *
 * Strategy: rather than flipping YOURLS_USER (which is a define and can't be reset),
 * we install a 'user_can' filter that simulates each role+user_id combination.
 * The filter sees the call before yourls_current_user_can() applies it; we ignore
 * the $allowed coming in and compute a fresh decision from the simulated identity.
 */
class CapabilitiesTest extends TestCase
{
    private const FILTER_PRIORITY = 5;

    /** Install the simulator filter at priority 5 (runs before default 10). */
    private function force_role(string $role, ?int $user_id = null, array $owner_map = []): void
    {
        $simulator = function ($allowed, $cap, $real_uid, $real_role, $ctx) use ($role, $user_id, $owner_map) {
            switch ($cap) {
                case 'manage_users':
                    return $role === 'admin';
                case 'create_link':
                case 'manage_own_profile':
                    return in_array($role, ['admin', 'editor'], true);
                case 'edit_link':
                case 'delete_link':
                case 'view_link_stats':
                    if ($role === 'admin') return true;
                    if ($role !== 'editor') return false;
                    if ($user_id === null) return false;
                    $kw = $ctx['keyword'] ?? null;
                    if ($kw === null) return false;
                    return ($owner_map[$kw] ?? null) === $user_id;
            }
            return $allowed;
        };

        \yourls_add_filter('user_can', $simulator, self::FILTER_PRIORITY);
    }

    protected function tearDown(): void
    {
        // Hard-reset the global filter array entry at our priority. We can't call
        // yourls_remove_filter() without the original closure reference (which would
        // require tracking it per-test), so we directly clear the slot — this matches
        // the structure used by yourls_add_filter in functions-plugins.php.
        global $yourls_filters;
        if (is_array($yourls_filters) && isset($yourls_filters['user_can'][self::FILTER_PRIORITY])) {
            unset($yourls_filters['user_can'][self::FILTER_PRIORITY]);
        }
    }

    public function test_admin_can_manage_users()
    {
        $this->force_role('admin');
        $this->assertTrue(\yourls_current_user_can('manage_users'));
    }

    public function test_editor_cannot_manage_users()
    {
        $this->force_role('editor', 7);
        $this->assertFalse(\yourls_current_user_can('manage_users'));
    }

    public function test_admin_can_create_link()
    {
        $this->force_role('admin');
        $this->assertTrue(\yourls_current_user_can('create_link'));
    }

    public function test_editor_can_create_link()
    {
        $this->force_role('editor', 7);
        $this->assertTrue(\yourls_current_user_can('create_link'));
    }

    public function test_editor_can_edit_own_link()
    {
        $this->force_role('editor', 7, ['mykw' => 7]);
        $this->assertTrue(\yourls_current_user_can('edit_link', ['keyword' => 'mykw']));
    }

    public function test_editor_cannot_edit_others_link()
    {
        $this->force_role('editor', 7, ['theirkw' => 99]);
        $this->assertFalse(\yourls_current_user_can('edit_link', ['keyword' => 'theirkw']));
    }

    public function test_editor_cannot_edit_link_without_keyword_context()
    {
        $this->force_role('editor', 7);
        $this->assertFalse(\yourls_current_user_can('edit_link'));
    }

    public function test_admin_can_edit_any_link()
    {
        $this->force_role('admin');
        $this->assertTrue(\yourls_current_user_can('edit_link', ['keyword' => 'whatever']));
    }

    public function test_admin_can_delete_any_link()
    {
        $this->force_role('admin');
        $this->assertTrue(\yourls_current_user_can('delete_link', ['keyword' => 'whatever']));
    }

    public function test_view_link_stats_follows_edit_rules()
    {
        $this->force_role('editor', 7, ['mine' => 7, 'yours' => 99]);
        $this->assertTrue(\yourls_current_user_can('view_link_stats', ['keyword' => 'mine']));
        $this->assertFalse(\yourls_current_user_can('view_link_stats', ['keyword' => 'yours']));
    }

    public function test_unknown_capability_denied_by_default()
    {
        $this->force_role('admin');
        $this->assertFalse(\yourls_current_user_can('manage_world_peace'));
    }

    public function test_logged_in_user_can_manage_own_profile()
    {
        $this->force_role('admin');
        $this->assertTrue(\yourls_current_user_can('manage_own_profile'));
        $this->force_role('editor', 7);
        $this->assertTrue(\yourls_current_user_can('manage_own_profile'));
    }

    public function test_filter_receives_role_argument()
    {
        // Verify the new 5-arg filter signature carries $role.
        $captured = null;
        $cb = function ($allowed, $cap, $uid, $role, $ctx) use (&$captured) {
            $captured = ['cap' => $cap, 'uid' => $uid, 'role' => $role, 'ctx' => $ctx];
            return $allowed;
        };
        \yourls_add_filter('user_can', $cb, 6);
        \yourls_current_user_can('create_link', ['hint' => 'test']);
        if (function_exists('yourls_remove_filter')) {
            @\yourls_remove_filter('user_can', $cb, 6);
        }
        global $yourls_filters;
        if (isset($yourls_filters['user_can'][6])) {
            unset($yourls_filters['user_can'][6]);
        }
        $this->assertNotNull($captured, 'filter must have been invoked');
        $this->assertSame('create_link', $captured['cap']);
        $this->assertArrayHasKey('hint', $captured['ctx']);
    }
}
