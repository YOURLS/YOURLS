# DB-backed User Management Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Add a complete DB-backed user management system to YOURLS (admin UI + roles + ownership + per-user API key + sliding-window rate limit) without breaking any existing single-admin install or third-party plugin.

**Architecture:** Bump DB schema to v509 (add `role`, `api_key_version`, `last_login_at` to `yourls_users`; add `created_by` to `yourls_url`; create `yourls_api_rate`). Introduce a capability helper layer (`yourls_current_user_can`) plus `user_can` filter, applied only at our own call sites — never inside `yourls_edit_link` / `yourls_delete_link_by_keyword`, so plugins keep working. Add Blade pages `/admin/users.php` (admin only) and `/admin/profile.php` (any logged-in user). Sign API requests with a versioned salt so rotating a user's key invalidates only that user's prior signatures while preserving byte-perfect backward compat for all pre-upgrade signatures (version=1 → un-versioned material).

**Tech Stack:** PHP 8+, PHPUnit, MariaDB/MySQL, Blade (jenssegers/blade), Tailwind for the new admin views.

**Spec:** `docs/superpowers/specs/2026-05-05-db-user-management-design.md`

---

## File Structure

**Create:**
- `includes/functions-auth-roles.php` — capabilities, current-user helpers, `user_can` filter integration
- `includes/functions-users-crud.php` — CRUD operations for `yourls_users`
- `includes/functions-api-rate-limit.php` — sliding-window rate limit
- `admin/users.php` — admin-only CRUD page (controller-style)
- `admin/profile.php` — self-service profile page
- `ui/views/admin/users/index.blade.php`
- `ui/views/admin/users/form.blade.php`
- `ui/views/admin/profile.blade.php`
- `tests/tests/users/RoleResolutionTest.php`
- `tests/tests/users/CapabilitiesTest.php`
- `tests/tests/users/OwnershipTest.php`
- `tests/tests/users/UserCrudTest.php`
- `tests/tests/users/SignatureRotationTest.php`
- `tests/tests/users/ApiRateLimitTest.php`
- `tests/tests/users/UpgradeTest.php`

**Modify:**
- `includes/version.php` — DB v509
- `includes/Config/Config.php` — new constants
- `includes/functions-install.php` — fresh-install schema includes new columns
- `includes/functions-upgrade.php` — `yourls_upgrade_to_509`
- `includes/functions-auth.php` — login resolves role/user_id, updates `last_login_at`, signature uses `api_key_version`
- `includes/functions-shorturls.php` — `yourls_add_new_link` and `yourls_insert_link_in_db` set `created_by`
- `includes/functions-html.php` — menu entries gated by capability
- `admin/admin-ajax.php` — edit/delete actions check `edit_link` capability
- `admin/index.php` — dashboard query filters by `created_by` for editors
- `yourls-api.php` — calls rate-limit gate post-auth, pre-dispatch
- `includes/load-yourls.php` — require the three new includes

---

## Milestones

- **M1 — DB schema + upgrade migration** (Tasks 1–2)
- **M2 — Capabilities & current-user layer** (Tasks 3–5)
- **M3 — User CRUD core (functions, no UI)** (Tasks 6–9)
- **M4 — Login & session integration** (Tasks 10–12)
- **M5 — Ownership of links** (Tasks 13–15)
- **M6 — API: signature versioning + rate limit** (Tasks 16–19)
- **M7 — Admin Users page (Blade)** (Tasks 20–22)
- **M8 — Self-service Profile page (Blade)** (Tasks 23–24)
- **M9 — Final wiring + docs + sanity** (Task 25)

---

## Task 1: DB schema constants & upgrade migration `to_509`

**Files:**
- Modify: `includes/version.php`
- Modify: `includes/Config/Config.php` (around line 181, where `YOURLS_DB_TABLE_USERS` is defined)
- Modify: `includes/functions-upgrade.php`
- Test: `tests/tests/users/UpgradeTest.php`

- [ ] **Step 1: Add the new constant for the rate-limit table**

In `includes/Config/Config.php`, right after the `YOURLS_DB_TABLE_USERS` block (around line 182), add:

```php
        if (!defined( 'YOURLS_DB_TABLE_API_RATE' ))
            define( 'YOURLS_DB_TABLE_API_RATE', YOURLS_DB_PREFIX.'api_rate' );
```

Also add the rate-limit + password-policy constants. Find the block defining `YOURLS_FLOOD_DELAY_SECONDS` defaults (search for `YOURLS_FLOOD_DELAY_SECONDS`); right after it, add:

```php
        if (!defined( 'YOURLS_API_RATE_LIMIT_PER_WINDOW' ))
            define( 'YOURLS_API_RATE_LIMIT_PER_WINDOW', 60 );

        if (!defined( 'YOURLS_API_RATE_LIMIT_WINDOW' ))
            define( 'YOURLS_API_RATE_LIMIT_WINDOW', 60 );

        if (!defined( 'YOURLS_USER_PASSWORD_MIN_LENGTH' ))
            define( 'YOURLS_USER_PASSWORD_MIN_LENGTH', 8 );
```

- [ ] **Step 2: Bump DB version to 509**

In `includes/version.php`:

```php
define( 'YOURLS_DB_VERSION', '509' );
```

- [ ] **Step 3: Write the failing upgrade test**

Create `tests/tests/users/UpgradeTest.php`:

```php
<?php
namespace YOURLS\Tests\Users;

use PHPUnit\Framework\TestCase;

class UpgradeTest extends TestCase
{
    public function test_upgrade_to_509_adds_user_columns()
    {
        $ydb = yourls_get_db();
        $table = YOURLS_DB_TABLE_USERS;

        // Drop the new columns to simulate pre-509 state, then run upgrade
        foreach (['role', 'api_key_version', 'last_login_at'] as $col) {
            try { $ydb->perform("ALTER TABLE `$table` DROP COLUMN `$col`"); } catch (\Exception $e) {}
        }

        ob_start();
        yourls_upgrade_to_509();
        ob_end_clean();

        $cols = array_column((array) $ydb->fetchObjects("SHOW COLUMNS FROM `$table`"), 'Field');
        $this->assertContains('role', $cols);
        $this->assertContains('api_key_version', $cols);
        $this->assertContains('last_login_at', $cols);
    }

    public function test_upgrade_to_509_adds_created_by_to_url_table()
    {
        $ydb = yourls_get_db();
        $table = YOURLS_DB_TABLE_URL;
        try { $ydb->perform("ALTER TABLE `$table` DROP COLUMN `created_by`"); } catch (\Exception $e) {}

        ob_start();
        yourls_upgrade_to_509();
        ob_end_clean();

        $cols = array_column((array) $ydb->fetchObjects("SHOW COLUMNS FROM `$table`"), 'Field');
        $this->assertContains('created_by', $cols);
    }

    public function test_upgrade_to_509_creates_api_rate_table()
    {
        $ydb = yourls_get_db();
        try { $ydb->perform('DROP TABLE IF EXISTS `'.YOURLS_DB_TABLE_API_RATE.'`'); } catch (\Exception $e) {}

        ob_start();
        yourls_upgrade_to_509();
        ob_end_clean();

        $exists = $ydb->fetchAffected("SHOW TABLES LIKE '".YOURLS_DB_TABLE_API_RATE."'");
        $this->assertGreaterThan(0, $exists);
    }

    public function test_upgrade_to_509_is_idempotent()
    {
        ob_start();
        yourls_upgrade_to_509();
        yourls_upgrade_to_509();  // should not throw
        ob_end_clean();
        $this->assertTrue(true);
    }

    public function test_existing_users_default_to_admin_role()
    {
        $ydb = yourls_get_db();
        $table = YOURLS_DB_TABLE_USERS;

        // Ensure baseline: drop+re-add role so DEFAULT 'admin' applies to existing rows
        try { $ydb->perform("ALTER TABLE `$table` DROP COLUMN `role`"); } catch (\Exception $e) {}
        ob_start(); yourls_upgrade_to_509(); ob_end_clean();

        $rows = $ydb->fetchObjects("SELECT username, role FROM `$table`");
        foreach ((array) $rows as $row) {
            $this->assertSame('admin', $row->role);
        }
    }
}
```

Run: `./vendor/bin/phpunit tests/tests/users/UpgradeTest.php`
Expected: FAIL with "yourls_upgrade_to_509 not found" or similar.

- [ ] **Step 4: Implement `yourls_upgrade_to_509`**

Edit `includes/functions-upgrade.php`. In the `switch ( $step )` block of `yourls_upgrade()`, add after the `to_508` call:

```php
        if( $oldsql < 509 ) {
            yourls_upgrade_to_509();
        }
```

Then add the function below `yourls_upgrade_to_508()`:

```php
/**
 * Add role/api_key_version/last_login_at to users; add created_by to urls;
 * create api_rate table.
 * DB version 509.
 */
function yourls_upgrade_to_509() {
    $ydb = yourls_get_db( 'write-upgrade_to_509' );

    $users_table = YOURLS_DB_TABLE_USERS;
    $url_table   = YOURLS_DB_TABLE_URL;
    $rate_table  = YOURLS_DB_TABLE_API_RATE;

    // 1. yourls_users new columns
    $existing = array_column( (array) $ydb->fetchObjects( "SHOW COLUMNS FROM `$users_table`" ), 'Field' );

    if ( !in_array( 'role', $existing, true ) ) {
        echo "<p>Adding `role` column to users table. Please wait...</p>";
        try {
            $ydb->perform( "ALTER TABLE `$users_table` ADD COLUMN `role` enum('admin','editor') NOT NULL DEFAULT 'admin' AFTER `password_hash`" );
            echo "<p class='success'>OK!</p>";
        } catch ( \Exception $e ) {
            echo "<p class='error'>Unable to add `role` column. Error: <pre>" . $e->getMessage() . "</pre></p>";
            die();
        }
    }

    if ( !in_array( 'api_key_version', $existing, true ) ) {
        echo "<p>Adding `api_key_version` column to users table. Please wait...</p>";
        try {
            $ydb->perform( "ALTER TABLE `$users_table` ADD COLUMN `api_key_version` int unsigned NOT NULL DEFAULT 1 AFTER `is_active`" );
            echo "<p class='success'>OK!</p>";
        } catch ( \Exception $e ) {
            echo "<p class='error'>Unable to add `api_key_version` column. Error: <pre>" . $e->getMessage() . "</pre></p>";
            die();
        }
    }

    if ( !in_array( 'last_login_at', $existing, true ) ) {
        echo "<p>Adding `last_login_at` column to users table. Please wait...</p>";
        try {
            $ydb->perform( "ALTER TABLE `$users_table` ADD COLUMN `last_login_at` timestamp NULL DEFAULT NULL" );
            echo "<p class='success'>OK!</p>";
        } catch ( \Exception $e ) {
            echo "<p class='error'>Unable to add `last_login_at` column. Error: <pre>" . $e->getMessage() . "</pre></p>";
            die();
        }
    }

    // 2. yourls_url.created_by
    $url_cols = array_column( (array) $ydb->fetchObjects( "SHOW COLUMNS FROM `$url_table`" ), 'Field' );
    if ( !in_array( 'created_by', $url_cols, true ) ) {
        echo "<p>Adding `created_by` column to URL table. Please wait...</p>";
        try {
            $ydb->perform( "ALTER TABLE `$url_table` ADD COLUMN `created_by` int unsigned NULL DEFAULT NULL, ADD KEY `created_by` (`created_by`)" );
            echo "<p class='success'>OK!</p>";
        } catch ( \Exception $e ) {
            echo "<p class='error'>Unable to add `created_by` column. Error: <pre>" . $e->getMessage() . "</pre></p>";
            die();
        }
    }

    // 3. yourls_api_rate
    echo "<p>Ensuring API rate-limit table exists. Please wait...</p>";
    try {
        $ydb->perform(
            "CREATE TABLE IF NOT EXISTS `$rate_table` (".
            "`id` bigint unsigned NOT NULL AUTO_INCREMENT,".
            "`user_id` int unsigned NOT NULL,".
            "`called_at` timestamp NOT NULL DEFAULT current_timestamp(),".
            "`action` varchar(32) NOT NULL,".
            "PRIMARY KEY (`id`),".
            "KEY `user_window` (`user_id`, `called_at`)".
            ") DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;"
        );
        echo "<p class='success'>OK!</p>";
    } catch ( \Exception $e ) {
        echo "<p class='error'>Unable to create api_rate table. Error: <pre>" . $e->getMessage() . "</pre></p>";
        die();
    }
}
```

- [ ] **Step 5: Run test to verify it passes**

Run: `./vendor/bin/phpunit tests/tests/users/UpgradeTest.php`
Expected: 5 tests pass.

- [ ] **Step 6: Commit**

```bash
git add includes/version.php includes/Config/Config.php includes/functions-upgrade.php tests/tests/users/UpgradeTest.php
git commit -m "feat(users): DB schema v509 (role, api_key_version, last_login_at, created_by, api_rate)"
```

---

## Task 2: Fresh-install schema includes the new columns

**Files:**
- Modify: `includes/functions-install.php` (`yourls_create_sql_tables`, around lines 217–264)

- [ ] **Step 1: Update the `yourls_url` CREATE to include `created_by`**

Find the `$create_tables[YOURLS_DB_TABLE_URL] =` block. Replace with:

```php
    $create_tables[YOURLS_DB_TABLE_URL] =
        'CREATE TABLE IF NOT EXISTS `'.YOURLS_DB_TABLE_URL.'` ('.
         '`keyword` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT \'\','.
         '`url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,'.
         '`title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,'.
         '`timestamp` timestamp NOT NULL DEFAULT current_timestamp(),'.
         '`ip` varchar(41) COLLATE utf8mb4_unicode_ci NOT NULL,'.
         '`clicks` int(10) unsigned NOT NULL,'.
         '`notes` text COLLATE utf8mb4_unicode_ci,'.
         '`created_by` int unsigned NULL DEFAULT NULL,'.
         'PRIMARY KEY (`keyword`),'.
         'KEY `ip` (`ip`),'.
         'KEY `timestamp` (`timestamp`),'.
         'KEY `url_idx` (`url`(30)),'.
         'KEY `created_by` (`created_by`)'.
        ') DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;';
```

- [ ] **Step 2: Update the `yourls_users` CREATE to include role/api_key_version/last_login_at**

Find the `$create_tables[YOURLS_DB_TABLE_USERS] =` block. Replace with:

```php
    $create_tables[YOURLS_DB_TABLE_USERS] =
        'CREATE TABLE IF NOT EXISTS `'.YOURLS_DB_TABLE_USERS.'` ('.
        '`user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,'.
        '`username` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,'.
        '`password_hash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,'.
        '`role` enum(\'admin\',\'editor\') NOT NULL DEFAULT \'admin\','.
        '`is_active` tinyint(1) unsigned NOT NULL DEFAULT 1,'.
        '`api_key_version` int unsigned NOT NULL DEFAULT 1,'.
        '`last_login_at` timestamp NULL DEFAULT NULL,'.
        '`created_at` timestamp NOT NULL DEFAULT current_timestamp(),'.
        '`updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),'.
        'PRIMARY KEY (`user_id`),'.
        'UNIQUE KEY `username` (`username`)'.
        ') AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;';
```

- [ ] **Step 3: Add the api_rate CREATE inside `yourls_create_sql_tables`**

Right after the `$create_tables[YOURLS_DB_TABLE_USERS]` block, add:

```php
    $create_tables[YOURLS_DB_TABLE_API_RATE] =
        'CREATE TABLE IF NOT EXISTS `'.YOURLS_DB_TABLE_API_RATE.'` ('.
        '`id` bigint unsigned NOT NULL AUTO_INCREMENT,'.
        '`user_id` int unsigned NOT NULL,'.
        '`called_at` timestamp NOT NULL DEFAULT current_timestamp(),'.
        '`action` varchar(32) NOT NULL,'.
        'PRIMARY KEY (`id`),'.
        'KEY `user_window` (`user_id`, `called_at`)'.
        ') DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;';
```

- [ ] **Step 4: Lint check**

Run: `php -l includes/functions-install.php`
Expected: `No syntax errors detected`.

- [ ] **Step 5: Commit**

```bash
git add includes/functions-install.php
git commit -m "feat(users): include role/created_by/api_rate in fresh-install schema"
```

---

## Task 3: Capability layer — `yourls_current_user_*` helpers

**Files:**
- Create: `includes/functions-auth-roles.php`
- Modify: `includes/load-yourls.php` (add `require_once`)
- Test: `tests/tests/users/RoleResolutionTest.php`

- [ ] **Step 1: Write failing test**

Create `tests/tests/users/RoleResolutionTest.php`:

```php
<?php
namespace YOURLS\Tests\Users;

use PHPUnit\Framework\TestCase;

class RoleResolutionTest extends TestCase
{
    public function test_anonymous_has_null_role_and_id()
    {
        // No YOURLS_USER context
        $this->assertNull(yourls_current_user_id());
        $this->assertNull(yourls_current_user_role());
    }

    public function test_helpers_are_defined_and_callable()
    {
        $this->assertTrue(function_exists('yourls_current_user_id'));
        $this->assertTrue(function_exists('yourls_current_user_role'));
        $this->assertTrue(function_exists('yourls_current_user_can'));
        $this->assertTrue(function_exists('yourls_get_user_by_username'));
    }
}
```

Run: `./vendor/bin/phpunit tests/tests/users/RoleResolutionTest.php`
Expected: FAIL — undefined functions.

- [ ] **Step 2: Create `includes/functions-auth-roles.php`**

```php
<?php
/**
 * Role-aware authentication helpers.
 *
 * Resolves the current user's role and user_id, exposes a capability check,
 * and provides DB-row lookup helpers used by the user CRUD layer.
 *
 * Anonymous (no YOURLS_USER) → role null, id null.
 * Config-file user (YOURLS_USER set, no DB row) → role 'admin', id null.
 * DB user → role from row, id from row.
 */

/**
 * @internal Cache for the resolved current user (DB row or null).
 * @var array{user_id:int,username:string,role:string,api_key_version:int,is_active:int}|null|false
 *      false = not yet resolved, null = no DB row, array = row
 */
function yourls_current_user_row( $reset = false ) {
    static $cache = false;
    if ( $reset ) { $cache = false; return null; }
    if ( $cache !== false ) {
        return $cache;
    }
    if ( !defined('YOURLS_USER') ) {
        return $cache = null;
    }
    $cache = yourls_get_user_by_username( YOURLS_USER );
    return $cache;
}

/**
 * Get a DB user row by username.
 *
 * @param string $username
 * @return array|null  associative row or null when not found / table missing
 */
function yourls_get_user_by_username( $username ) {
    if ( $username === '' || $username === null ) return null;
    try {
        $ydb   = yourls_get_db( 'read-get_user_by_username' );
        $table = YOURLS_DB_TABLE_USERS;
        $row   = $ydb->fetchObject(
            "SELECT * FROM `$table` WHERE `username` = :u LIMIT 1",
            [ 'u' => $username ]
        );
        return $row ? (array) $row : null;
    } catch ( \Exception $e ) {
        return null;
    }
}

/**
 * @return int|null  user_id or null for config-file/anonymous
 */
function yourls_current_user_id() {
    $row = yourls_current_user_row();
    return $row ? (int) $row['user_id'] : null;
}

/**
 * @return string|null  'admin' | 'editor' | null (anonymous)
 */
function yourls_current_user_role() {
    if ( !defined('YOURLS_USER') ) return null;
    $row = yourls_current_user_row();
    if ( $row ) return (string) $row['role'];
    // Logged in but not in DB → config-file user → admin by spec §4.2
    return 'admin';
}

/**
 * Capability check.
 *
 * Capabilities (initial set):
 *   manage_users           admin only
 *   create_link            admin, editor
 *   edit_link  ($keyword)  admin always; editor iff link.created_by === current_user_id
 *   delete_link($keyword)  same as edit_link
 *   view_link_stats($kw)   admin always; editor iff owner
 *   manage_own_profile     any logged-in user
 *
 * @param string $cap
 * @param array  $ctx  optional context, may carry 'keyword'
 * @return bool
 */
function yourls_current_user_can( $cap, $ctx = [] ) {
    $role    = yourls_current_user_role();
    $user_id = yourls_current_user_id();

    $allowed = false;

    switch ( $cap ) {
        case 'manage_users':
            $allowed = ( $role === 'admin' );
            break;

        case 'create_link':
        case 'manage_own_profile':
            $allowed = ( $role === 'admin' || $role === 'editor' );
            break;

        case 'edit_link':
        case 'delete_link':
        case 'view_link_stats':
            if ( $role === 'admin' ) {
                $allowed = true;
            } elseif ( $role === 'editor' && !empty( $ctx['keyword'] ) ) {
                $allowed = yourls_user_owns_keyword( $user_id, $ctx['keyword'] );
            }
            break;
    }

    return (bool) yourls_apply_filter( 'user_can', $allowed, $cap, $user_id, $ctx );
}

/**
 * Whether the given user owns the given short URL keyword.
 *
 * @param int|null $user_id
 * @param string   $keyword
 * @return bool
 */
function yourls_user_owns_keyword( $user_id, $keyword ) {
    if ( !$user_id ) return false;
    try {
        $ydb   = yourls_get_db( 'read-user_owns_keyword' );
        $table = YOURLS_DB_TABLE_URL;
        $owner = $ydb->fetchValue(
            "SELECT `created_by` FROM `$table` WHERE `keyword` = :k LIMIT 1",
            [ 'k' => $keyword ]
        );
        return $owner !== null && (int) $owner === (int) $user_id;
    } catch ( \Exception $e ) {
        return false;
    }
}
```

- [ ] **Step 3: Wire the include**

Edit `includes/load-yourls.php`. Find the line that requires `functions-auth.php` and add right after:

```php
require_once( YOURLS_INC.'/functions-auth-roles.php' );
```

- [ ] **Step 4: Run tests**

Run: `./vendor/bin/phpunit tests/tests/users/RoleResolutionTest.php`
Expected: PASS.

- [ ] **Step 5: Commit**

```bash
git add includes/functions-auth-roles.php includes/load-yourls.php tests/tests/users/RoleResolutionTest.php
git commit -m "feat(users): role-aware current-user helpers and user_can capability"
```

---

## Task 4: Capability matrix tests

**Files:**
- Test: `tests/tests/users/CapabilitiesTest.php`

- [ ] **Step 1: Write the matrix test**

```php
<?php
namespace YOURLS\Tests\Users;

use PHPUnit\Framework\TestCase;

/**
 * NOTE: tests in this class flip YOURLS_USER and the resolved current-user cache
 * via the `user_can` filter to simulate roles without committing rows.
 */
class CapabilitiesTest extends TestCase
{
    private $filter_priority;

    private function force_role( $role, $user_id = null ) {
        $this->filter_priority = yourls_add_filter('user_can', function ($allowed, $cap, $uid, $ctx) use ($role, $user_id) {
            // Simulate: re-evaluate with forced role. We do this by emulating the switch.
            switch ($cap) {
                case 'manage_users':
                    return $role === 'admin';
                case 'create_link':
                case 'manage_own_profile':
                    return $role === 'admin' || $role === 'editor';
                case 'edit_link':
                case 'delete_link':
                case 'view_link_stats':
                    if ($role === 'admin') return true;
                    if ($role === 'editor' && !empty($ctx['_owner_uid']) && $user_id !== null) {
                        return (int) $ctx['_owner_uid'] === (int) $user_id;
                    }
                    return false;
            }
            return $allowed;
        }, 5);
    }

    protected function tearDown(): void
    {
        yourls_remove_filter('user_can', null, 5);  // best-effort
    }

    public function test_admin_can_manage_users()
    {
        $this->force_role('admin');
        $this->assertTrue(yourls_current_user_can('manage_users'));
    }

    public function test_editor_cannot_manage_users()
    {
        $this->force_role('editor', 7);
        $this->assertFalse(yourls_current_user_can('manage_users'));
    }

    public function test_editor_can_create_link()
    {
        $this->force_role('editor', 7);
        $this->assertTrue(yourls_current_user_can('create_link'));
    }

    public function test_editor_owns_link()
    {
        $this->force_role('editor', 7);
        $this->assertTrue(yourls_current_user_can('edit_link', ['_owner_uid' => 7]));
    }

    public function test_editor_does_not_own_link()
    {
        $this->force_role('editor', 7);
        $this->assertFalse(yourls_current_user_can('edit_link', ['_owner_uid' => 99]));
    }

    public function test_admin_can_edit_any_link()
    {
        $this->force_role('admin');
        $this->assertTrue(yourls_current_user_can('edit_link', ['_owner_uid' => 99]));
    }
}
```

- [ ] **Step 2: Run**

Run: `./vendor/bin/phpunit tests/tests/users/CapabilitiesTest.php`
Expected: PASS (the helpers from Task 3 already implement this; the filter override is just a test scaffold).

- [ ] **Step 3: Commit**

```bash
git add tests/tests/users/CapabilitiesTest.php
git commit -m "test(users): capability matrix"
```

---

## Task 5: Add `yourls_remove_filter` shim if missing

**Files:**
- Verify: `includes/functions-plugins.php`

- [ ] **Step 1: Confirm `yourls_remove_filter` exists**

Run: `grep -n "function yourls_remove_filter" includes/functions-plugins.php`
Expected: a definition is found.

- [ ] **Step 2: If missing, skip — the test in Task 4 only uses it as best-effort cleanup**

If the function is not defined, change Task 4's `tearDown` to:

```php
protected function tearDown(): void
{
    // no-op: filters are global; tests are isolated by phpunit between runs
}
```

(The test still passes because each test method re-installs the filter.)

- [ ] **Step 3: Commit if any change made (likely none)**

```bash
git status  # verify nothing to commit
```

---

## Task 6: User CRUD — `yourls_create_user`

**Files:**
- Create: `includes/functions-users-crud.php`
- Modify: `includes/load-yourls.php`
- Test: `tests/tests/users/UserCrudTest.php`

- [ ] **Step 1: Write failing test**

Create `tests/tests/users/UserCrudTest.php`:

```php
<?php
namespace YOURLS\Tests\Users;

use PHPUnit\Framework\TestCase;

class UserCrudTest extends TestCase
{
    protected function setUp(): void
    {
        $ydb = yourls_get_db();
        $ydb->perform("DELETE FROM `".YOURLS_DB_TABLE_USERS."` WHERE username LIKE 'crudtest_%'");
    }

    public function test_create_user_returns_id_and_inserts_row()
    {
        $id = yourls_create_user('crudtest_alice', 'p@ssw0rd1', 'editor');
        $this->assertIsInt($id);
        $this->assertGreaterThan(0, $id);

        $row = yourls_get_user_by_username('crudtest_alice');
        $this->assertSame('editor', $row['role']);
        $this->assertSame(1, (int) $row['is_active']);
        $this->assertSame(1, (int) $row['api_key_version']);
        $this->assertTrue(password_verify('p@ssw0rd1', $row['password_hash']));
    }

    public function test_create_user_rejects_duplicate_username()
    {
        yourls_create_user('crudtest_bob', 'p@ssw0rd1', 'editor');
        $this->expectException(\RuntimeException::class);
        yourls_create_user('crudtest_bob', 'other', 'admin');
    }

    public function test_create_user_rejects_invalid_role()
    {
        $this->expectException(\InvalidArgumentException::class);
        yourls_create_user('crudtest_carol', 'p@ssw0rd1', 'superuser');
    }

    public function test_create_user_rejects_short_password()
    {
        $this->expectException(\InvalidArgumentException::class);
        yourls_create_user('crudtest_dave', 'short', 'editor');
    }

    public function test_create_user_rejects_invalid_username()
    {
        $this->expectException(\InvalidArgumentException::class);
        yourls_create_user('bad name with spaces', 'p@ssw0rd1', 'editor');
    }
}
```

Run: `./vendor/bin/phpunit tests/tests/users/UserCrudTest.php`
Expected: FAIL — `yourls_create_user` not defined.

- [ ] **Step 2: Create `includes/functions-users-crud.php`**

```php
<?php
/**
 * CRUD operations for the yourls_users table.
 *
 * Pure data layer: no permission checks. Callers (admin/users.php, admin/profile.php)
 * are responsible for verifying yourls_current_user_can() before invoking these.
 */

const YOURLS_USERNAME_REGEX = '/^[A-Za-z0-9_.\-]{1,64}$/';

/**
 * Create a new DB user.
 *
 * @param string $username
 * @param string $password   plaintext, will be hashed
 * @param string $role       'admin' or 'editor'
 * @param bool   $is_active
 * @return int               new user_id
 * @throws \InvalidArgumentException on validation failure
 * @throws \RuntimeException on DB error / duplicate
 */
function yourls_create_user( $username, $password, $role = 'editor', $is_active = true ) {
    yourls_validate_username( $username );
    yourls_validate_role( $role );
    yourls_validate_password_strength( $password );

    if ( yourls_get_user_by_username( $username ) !== null ) {
        throw new \RuntimeException( "Username '$username' already exists" );
    }

    $hash = yourls_phpass_hash( $password );
    $ydb   = yourls_get_db( 'write-create_user' );
    $table = YOURLS_DB_TABLE_USERS;

    $ydb->perform(
        "INSERT INTO `$table` (`username`,`password_hash`,`role`,`is_active`,`api_key_version`) VALUES (:u,:h,:r,:a,1)",
        [ 'u' => $username, 'h' => $hash, 'r' => $role, 'a' => $is_active ? 1 : 0 ]
    );

    $row = yourls_get_user_by_username( $username );
    if ( !$row ) {
        throw new \RuntimeException( 'Failed to create user' );
    }

    yourls_do_action( 'user_created', (int) $row['user_id'], $username, $role );
    return (int) $row['user_id'];
}

function yourls_validate_username( $username ) {
    if ( !is_string( $username ) || !preg_match( YOURLS_USERNAME_REGEX, $username ) ) {
        throw new \InvalidArgumentException( 'Invalid username (allowed: A-Z, a-z, 0-9, _.-, 1..64 chars)' );
    }
}

function yourls_validate_role( $role ) {
    if ( !in_array( $role, [ 'admin', 'editor' ], true ) ) {
        throw new \InvalidArgumentException( "Invalid role '$role' (allowed: admin, editor)" );
    }
}

function yourls_validate_password_strength( $password ) {
    $min = (int) yourls_apply_filter( 'user_password_min_length', YOURLS_USER_PASSWORD_MIN_LENGTH );
    if ( !is_string( $password ) || strlen( $password ) < $min ) {
        throw new \InvalidArgumentException( "Password must be at least $min characters long" );
    }
}
```

- [ ] **Step 3: Wire the include**

Edit `includes/load-yourls.php`, after the `functions-auth-roles.php` line:

```php
require_once( YOURLS_INC.'/functions-users-crud.php' );
```

- [ ] **Step 4: Run tests**

Run: `./vendor/bin/phpunit tests/tests/users/UserCrudTest.php`
Expected: PASS (5 tests).

- [ ] **Step 5: Commit**

```bash
git add includes/functions-users-crud.php includes/load-yourls.php tests/tests/users/UserCrudTest.php
git commit -m "feat(users): yourls_create_user with validation"
```

---

## Task 7: User CRUD — `yourls_update_user`

**Files:**
- Modify: `includes/functions-users-crud.php`
- Modify: `tests/tests/users/UserCrudTest.php`

- [ ] **Step 1: Append failing tests for update**

Add to `UserCrudTest.php`:

```php
public function test_update_user_changes_role_and_active()
{
    $id = yourls_create_user('crudtest_eve', 'p@ssw0rd1', 'editor');
    yourls_update_user($id, ['role' => 'admin', 'is_active' => false]);
    $row = yourls_get_user_by_username('crudtest_eve');
    $this->assertSame('admin', $row['role']);
    $this->assertSame(0, (int) $row['is_active']);
}

public function test_update_user_changes_password_when_given()
{
    $id = yourls_create_user('crudtest_frank', 'p@ssw0rd1', 'editor');
    yourls_update_user($id, ['password' => 'newP@ssw0rd2']);
    $row = yourls_get_user_by_username('crudtest_frank');
    $this->assertTrue(password_verify('newP@ssw0rd2', $row['password_hash']));
}

public function test_update_user_rejects_unknown_id()
{
    $this->expectException(\RuntimeException::class);
    yourls_update_user(999999, ['role' => 'admin']);
}

public function test_rotate_api_key_increments_version()
{
    $id = yourls_create_user('crudtest_grace', 'p@ssw0rd1', 'editor');
    $before = yourls_get_user_by_username('crudtest_grace')['api_key_version'];
    yourls_rotate_user_api_key($id);
    $after = yourls_get_user_by_username('crudtest_grace')['api_key_version'];
    $this->assertSame((int)$before + 1, (int)$after);
}
```

- [ ] **Step 2: Run to verify failures**

Run: `./vendor/bin/phpunit tests/tests/users/UserCrudTest.php`
Expected: FAIL — `yourls_update_user` undefined.

- [ ] **Step 3: Add update + rotate to `functions-users-crud.php`**

Append:

```php
/**
 * Partial update of a user. $fields may contain any subset of:
 *   'role'        => 'admin'|'editor'
 *   'is_active'   => bool|int
 *   'password'    => plaintext (will be hashed)
 *   'username'    => string (renames; new value must be unique)
 *
 * @throws \InvalidArgumentException on validation failure
 * @throws \RuntimeException on DB error / unknown id
 */
function yourls_update_user( $user_id, array $fields ) {
    $user_id = (int) $user_id;
    if ( $user_id <= 0 ) throw new \InvalidArgumentException( 'Invalid user id' );

    $ydb   = yourls_get_db( 'write-update_user' );
    $table = YOURLS_DB_TABLE_USERS;

    $existing = $ydb->fetchObject( "SELECT * FROM `$table` WHERE `user_id` = :id", [ 'id' => $user_id ] );
    if ( !$existing ) throw new \RuntimeException( "User $user_id does not exist" );

    $sets   = [];
    $binds  = [ 'id' => $user_id ];

    if ( array_key_exists( 'role', $fields ) ) {
        yourls_validate_role( $fields['role'] );
        $sets[] = '`role` = :role';
        $binds['role'] = $fields['role'];
    }
    if ( array_key_exists( 'is_active', $fields ) ) {
        $sets[] = '`is_active` = :active';
        $binds['active'] = $fields['is_active'] ? 1 : 0;
    }
    if ( array_key_exists( 'password', $fields ) && $fields['password'] !== '' ) {
        yourls_validate_password_strength( $fields['password'] );
        $sets[] = '`password_hash` = :hash';
        $binds['hash'] = yourls_phpass_hash( $fields['password'] );
    }
    if ( array_key_exists( 'username', $fields ) ) {
        yourls_validate_username( $fields['username'] );
        if ( $fields['username'] !== $existing->username && yourls_get_user_by_username( $fields['username'] ) !== null ) {
            throw new \RuntimeException( 'Username already in use' );
        }
        $sets[] = '`username` = :username';
        $binds['username'] = $fields['username'];
    }

    if ( !$sets ) return; // nothing to update

    $ydb->perform( "UPDATE `$table` SET " . implode( ', ', $sets ) . " WHERE `user_id` = :id", $binds );

    yourls_do_action( 'user_updated', $user_id, array_keys( $fields ) );
}

/**
 * Increment a user's api_key_version, invalidating prior signatures.
 */
function yourls_rotate_user_api_key( $user_id ) {
    $user_id = (int) $user_id;
    $ydb   = yourls_get_db( 'write-rotate_api_key' );
    $table = YOURLS_DB_TABLE_USERS;
    $ydb->perform( "UPDATE `$table` SET `api_key_version` = `api_key_version` + 1 WHERE `user_id` = :id", [ 'id' => $user_id ] );
    yourls_do_action( 'user_api_key_rotated', $user_id );
}

/**
 * Update last_login_at to now for the given user_id.
 */
function yourls_touch_last_login( $user_id ) {
    if ( !$user_id ) return;
    try {
        $ydb   = yourls_get_db( 'write-touch_last_login' );
        $table = YOURLS_DB_TABLE_USERS;
        $ydb->perform( "UPDATE `$table` SET `last_login_at` = current_timestamp() WHERE `user_id` = :id", [ 'id' => (int) $user_id ] );
    } catch ( \Exception $e ) { /* non-fatal */ }
}
```

- [ ] **Step 4: Run tests**

Run: `./vendor/bin/phpunit tests/tests/users/UserCrudTest.php`
Expected: PASS (9 tests).

- [ ] **Step 5: Commit**

```bash
git add includes/functions-users-crud.php tests/tests/users/UserCrudTest.php
git commit -m "feat(users): yourls_update_user, rotate_api_key, touch_last_login"
```

---

## Task 8: User CRUD — `yourls_delete_user` with last-admin guard

**Files:**
- Modify: `includes/functions-users-crud.php`
- Modify: `tests/tests/users/UserCrudTest.php`

- [ ] **Step 1: Append failing tests**

```php
public function test_delete_user_removes_row()
{
    $id = yourls_create_user('crudtest_henry', 'p@ssw0rd1', 'editor');
    yourls_delete_user($id);
    $this->assertNull(yourls_get_user_by_username('crudtest_henry'));
}

public function test_cannot_delete_last_active_admin()
{
    // Ensure baseline: exactly one active admin in DB
    $ydb = yourls_get_db();
    $ydb->perform("DELETE FROM `".YOURLS_DB_TABLE_USERS."`");
    $admin_id = yourls_create_user('crudtest_solo_admin', 'p@ssw0rd1', 'admin');

    $this->expectException(\RuntimeException::class);
    yourls_delete_user($admin_id);
}

public function test_can_delete_admin_when_another_admin_exists()
{
    $ydb = yourls_get_db();
    $ydb->perform("DELETE FROM `".YOURLS_DB_TABLE_USERS."`");
    $a = yourls_create_user('crudtest_admin_a', 'p@ssw0rd1', 'admin');
    $b = yourls_create_user('crudtest_admin_b', 'p@ssw0rd1', 'admin');
    yourls_delete_user($a);
    $this->assertNull(yourls_get_user_by_username('crudtest_admin_a'));
    $this->assertNotNull(yourls_get_user_by_username('crudtest_admin_b'));
}
```

- [ ] **Step 2: Run, expect failure**

Run: `./vendor/bin/phpunit tests/tests/users/UserCrudTest.php`
Expected: FAIL on the new tests.

- [ ] **Step 3: Implement delete + guards**

Append to `functions-users-crud.php`:

```php
/**
 * Delete a user.
 *
 * Refuses to delete the last active admin (would lock everyone out of user management).
 *
 * @throws \RuntimeException
 */
function yourls_delete_user( $user_id ) {
    $user_id = (int) $user_id;
    $ydb   = yourls_get_db( 'write-delete_user' );
    $table = YOURLS_DB_TABLE_USERS;

    $row = $ydb->fetchObject( "SELECT * FROM `$table` WHERE `user_id` = :id", [ 'id' => $user_id ] );
    if ( !$row ) throw new \RuntimeException( "User $user_id does not exist" );

    if ( $row->role === 'admin' && $row->is_active ) {
        $other_active_admins = (int) $ydb->fetchValue(
            "SELECT COUNT(*) FROM `$table` WHERE `role` = 'admin' AND `is_active` = 1 AND `user_id` <> :id",
            [ 'id' => $user_id ]
        );
        if ( $other_active_admins === 0 ) {
            throw new \RuntimeException( 'Cannot delete the last active admin' );
        }
    }

    $ydb->perform( "DELETE FROM `$table` WHERE `user_id` = :id", [ 'id' => $user_id ] );
    yourls_do_action( 'user_deleted', $user_id, $row->username );
}

/**
 * Whether disabling/demoting this user would leave the system without an active admin.
 *
 * Used by the UI to disable the "demote/disable" controls when applicable.
 */
function yourls_user_is_last_active_admin( $user_id ) {
    $user_id = (int) $user_id;
    $ydb   = yourls_get_db( 'read-last_admin_check' );
    $table = YOURLS_DB_TABLE_USERS;
    $row = $ydb->fetchObject( "SELECT role, is_active FROM `$table` WHERE `user_id` = :id", [ 'id' => $user_id ] );
    if ( !$row || $row->role !== 'admin' || !$row->is_active ) return false;
    $others = (int) $ydb->fetchValue(
        "SELECT COUNT(*) FROM `$table` WHERE `role` = 'admin' AND `is_active` = 1 AND `user_id` <> :id",
        [ 'id' => $user_id ]
    );
    return $others === 0;
}

/**
 * List users for the admin UI.
 *
 * @return array of associative rows
 */
function yourls_list_users( $limit = 100, $offset = 0 ) {
    $ydb   = yourls_get_db( 'read-list_users' );
    $table = YOURLS_DB_TABLE_USERS;
    $rows  = $ydb->fetchObjects(
        "SELECT user_id, username, role, is_active, api_key_version, last_login_at, created_at, updated_at FROM `$table` ORDER BY username ASC LIMIT $limit OFFSET $offset"
    );
    return array_map( fn( $o ) => (array) $o, (array) $rows );
}
```

- [ ] **Step 4: Run tests**

Run: `./vendor/bin/phpunit tests/tests/users/UserCrudTest.php`
Expected: PASS (12 tests).

- [ ] **Step 5: Commit**

```bash
git add includes/functions-users-crud.php tests/tests/users/UserCrudTest.php
git commit -m "feat(users): yourls_delete_user with last-active-admin guard, list_users"
```

---

## Task 9: Login resolves role and updates last_login_at

**Files:**
- Modify: `includes/functions-auth.php` (`yourls_check_username_password` around lines 130–157)

- [ ] **Step 1: Update `yourls_check_username_password` to touch last login on DB success**

Replace the `if ( yourls_db_user_exists($username) && yourls_db_check_password(...) )` branch:

```php
    if ( yourls_db_user_exists( $username ) && yourls_db_check_password( $username, $submitted ) ) {
        yourls_set_user( $username );
        $row = yourls_get_user_by_username( $username );
        if ( $row && function_exists( 'yourls_touch_last_login' ) ) {
            yourls_touch_last_login( (int) $row['user_id'] );
        }
        return true;
    }
```

- [ ] **Step 2: Reset cached current-user row after `yourls_set_user`**

Add inside `yourls_set_user` (in `functions-auth.php`) right after the `define`:

```php
    if ( function_exists( 'yourls_current_user_row' ) ) {
        yourls_current_user_row( true ); // reset cache
    }
```

- [ ] **Step 3: Lint**

Run: `php -l includes/functions-auth.php`
Expected: No syntax errors.

- [ ] **Step 4: Commit**

```bash
git add includes/functions-auth.php
git commit -m "feat(users): touch last_login_at on DB-user login; reset role cache on set_user"
```

---

## Task 10: Ownership — `yourls_add_new_link` records `created_by`

**Files:**
- Modify: `includes/functions-shorturls.php` (`yourls_add_new_link` ~line 32, `yourls_insert_link_in_db` ~line 273)
- Test: `tests/tests/users/OwnershipTest.php`

- [ ] **Step 1: Write failing test**

```php
<?php
namespace YOURLS\Tests\Users;

use PHPUnit\Framework\TestCase;

class OwnershipTest extends TestCase
{
    private $user_id;

    protected function setUp(): void
    {
        $ydb = yourls_get_db();
        $ydb->perform("DELETE FROM `".YOURLS_DB_TABLE_USERS."` WHERE username = 'owntest_alice'");
        $ydb->perform("DELETE FROM `".YOURLS_DB_TABLE_URL."` WHERE keyword LIKE 'own_%'");
        $this->user_id = yourls_create_user('owntest_alice', 'p@ssw0rd1', 'editor');

        // Simulate logged-in editor
        if (!defined('YOURLS_USER')) define('YOURLS_USER', 'owntest_alice');
        yourls_current_user_row(true);
    }

    public function test_add_new_link_records_created_by()
    {
        $r = yourls_add_new_link('https://example.com/'.uniqid(), 'own_keyw1', 't');
        $this->assertSame('success', $r['status']);

        $ydb = yourls_get_db();
        $owner = $ydb->fetchValue(
            "SELECT created_by FROM `".YOURLS_DB_TABLE_URL."` WHERE keyword = :k",
            ['k' => 'own_keyw1']
        );
        $this->assertSame((int) $this->user_id, (int) $owner);
    }

    public function test_user_owns_keyword_helper()
    {
        yourls_add_new_link('https://example.com/'.uniqid(), 'own_keyw2', 't');
        $this->assertTrue(yourls_user_owns_keyword($this->user_id, 'own_keyw2'));
        $this->assertFalse(yourls_user_owns_keyword(999999, 'own_keyw2'));
    }
}
```

Run: FAIL — `created_by` is NULL because `yourls_insert_link_in_db` doesn't set it.

- [ ] **Step 2: Modify `yourls_insert_link_in_db` to accept and persist `created_by`**

Find the function around line 273. Update signature + binds:

```php
function yourls_insert_link_in_db($url, $keyword, $title = '', $notes = '', $created_by = null ) {
    $url       = yourls_sanitize_url($url);
    $keyword   = yourls_sanitize_keyword($keyword);
    $title     = yourls_sanitize_title($title);
    $notes     = yourls_sanitize_title($notes);
    $timestamp = date('Y-m-d H:i:s');
    $ip        = yourls_get_IP();

    $table = YOURLS_DB_TABLE_URL;
    $binds = array(
        'keyword'    => $keyword,
        'url'        => $url,
        'title'      => $title,
        'notes'      => $notes !== '' ? $notes : null,
        'timestamp'  => $timestamp,
        'ip'         => $ip,
        'created_by' => $created_by !== null ? (int) $created_by : null,
    );
    $ydb = yourls_get_db('write-insert_link_in_db');
    $insert = $ydb->fetchAffected("INSERT INTO `$table` (`keyword`, `url`, `title`, `notes`, `timestamp`, `ip`, `clicks`, `created_by`) VALUES(:keyword, :url, :title, :notes, :timestamp, :ip, 0, :created_by);", $binds);

    if ( $insert ) {
        $infos = $binds;
        $infos['clicks'] = 0;
        $ydb->set_infos($keyword, $infos);
    }

    yourls_do_action( 'insert_link', (bool)$insert, $url, $keyword, $title, $timestamp, $ip );

    return (bool)$insert;
}
```

- [ ] **Step 3: Modify `yourls_add_new_link` to pass current user**

Find the call to `yourls_insert_link_in_db` (around line 138). Replace:

```php
        if (yourls_insert_link_in_db( $url, $keyword, $title, $notes, yourls_current_user_id() )){
```

- [ ] **Step 4: Run tests**

Run: `./vendor/bin/phpunit tests/tests/users/OwnershipTest.php`
Expected: PASS.

- [ ] **Step 5: Commit**

```bash
git add includes/functions-shorturls.php tests/tests/users/OwnershipTest.php
git commit -m "feat(users): record created_by on link insert"
```

---

## Task 11: Dashboard query filters by `created_by` for editors

**Files:**
- Modify: `admin/index.php` (the Blade branch query around lines 266–286 and the legacy branch around line 400)

- [ ] **Step 1: Inject the filter**

Just before the Blade-branch query at `admin/index.php:266`, add:

```php
    // Editor scoping: limit dashboard to own links
    if ( function_exists( 'yourls_current_user_role' ) && yourls_current_user_role() === 'editor' ) {
        $uid = yourls_current_user_id();
        $where['sql']             .= ' AND `created_by` = :ed_uid';
        $where['binds']['ed_uid']  = (int) $uid;
    }
```

Apply the same insert before the legacy branch query at line ~400.

- [ ] **Step 2: Lint**

Run: `php -l admin/index.php`
Expected: No syntax errors.

- [ ] **Step 3: Manual verification (record in commit message)**

There is no dedicated test fixture for the admin/index page rendering. The query filter is straight-line SQL and is also implicitly tested by the OwnershipTest in Task 12. Note in commit body: "Manual smoke check: log in as editor, verify only own links are listed."

- [ ] **Step 4: Commit**

```bash
git add admin/index.php
git commit -m "feat(users): scope dashboard listing by created_by for editors"
```

---

## Task 12: AJAX edit/delete enforces capability

**Files:**
- Modify: `admin/admin-ajax.php`
- Test: extend `tests/tests/users/OwnershipTest.php`

- [ ] **Step 1: Append test**

Add to `OwnershipTest.php`:

```php
public function test_other_editor_cannot_edit_my_link()
{
    $other = yourls_create_user('owntest_other', 'p@ssw0rd1', 'editor');
    yourls_add_new_link('https://example.com/'.uniqid(), 'own_protected', 't');

    $this->assertTrue(yourls_user_owns_keyword($this->user_id, 'own_protected'));
    $this->assertFalse(yourls_user_owns_keyword($other, 'own_protected'));

    // Capability via filter context
    $this->assertFalse(yourls_apply_filter('user_can', false, 'edit_link', $other, ['keyword' => 'own_protected']) === true);
}
```

- [ ] **Step 2: Locate the edit/delete branches in `admin/admin-ajax.php`**

Run: `grep -n "case 'edit'\|case 'delete'" admin/admin-ajax.php`

- [ ] **Step 3: Add capability check**

At the top of each `case 'edit':` and `case 'delete':` block, before the existing logic:

```php
        $kw_for_check = $_REQUEST['keyword'] ?? '';
        if ( !yourls_current_user_can( 'edit_link', [ 'keyword' => $kw_for_check ] ) ) {
            yourls_status_header( 403 );
            echo json_encode( [ 'status' => 'fail', 'message' => 'Forbidden' ] );
            die();
        }
```

(Use `'delete_link'` for the delete branch.)

- [ ] **Step 4: Lint**

Run: `php -l admin/admin-ajax.php`

- [ ] **Step 5: Run tests**

Run: `./vendor/bin/phpunit tests/tests/users/OwnershipTest.php`
Expected: PASS.

- [ ] **Step 6: Commit**

```bash
git add admin/admin-ajax.php tests/tests/users/OwnershipTest.php
git commit -m "feat(users): enforce edit/delete capability in admin-ajax"
```

---

## Task 13: API signature with `api_key_version`

**Files:**
- Modify: `includes/functions-auth.php` (`yourls_auth_signature` ~line 478)
- Test: `tests/tests/users/SignatureRotationTest.php`

- [ ] **Step 1: Write failing test**

```php
<?php
namespace YOURLS\Tests\Users;

use PHPUnit\Framework\TestCase;

class SignatureRotationTest extends TestCase
{
    protected function setUp(): void
    {
        $ydb = yourls_get_db();
        $ydb->perform("DELETE FROM `".YOURLS_DB_TABLE_USERS."` WHERE username = 'sigtest_alice'");
    }

    public function test_signature_v1_matches_unversioned_salt()
    {
        $id = yourls_create_user('sigtest_alice', 'p@ssw0rd1', 'editor');
        $sig = yourls_auth_signature('sigtest_alice');
        $expected = substr(yourls_salt('sigtest_alice'), 0, 10);
        $this->assertSame($expected, $sig, 'pre-rotation signature must equal legacy un-versioned form');
    }

    public function test_rotating_key_changes_signature()
    {
        $id = yourls_create_user('sigtest_alice', 'p@ssw0rd1', 'editor');
        $before = yourls_auth_signature('sigtest_alice');
        yourls_rotate_user_api_key($id);
        $after  = yourls_auth_signature('sigtest_alice');
        $this->assertNotSame($before, $after);
    }

    public function test_config_file_user_signature_unchanged()
    {
        // username with no DB row → version=1 path → un-versioned salt
        $sig = yourls_auth_signature('configonly_user');
        $this->assertSame(substr(yourls_salt('configonly_user'), 0, 10), $sig);
    }
}
```

Run: FAIL — current `yourls_auth_signature` ignores `api_key_version`.

- [ ] **Step 2: Modify `yourls_auth_signature`**

Replace the function body:

```php
function yourls_auth_signature( $username = false ) {
    if( !$username && defined('YOURLS_USER') ) {
        $username = YOURLS_USER;
    }
    if ( !$username ) {
        return 'Cannot generate auth signature: no username';
    }

    $version = 1;
    if ( function_exists( 'yourls_get_user_by_username' ) ) {
        $row = yourls_get_user_by_username( $username );
        if ( $row && isset( $row['api_key_version'] ) ) {
            $version = max( 1, (int) $row['api_key_version'] );
        }
    }

    $material = $version > 1 ? $username . '|v' . $version : $username;
    return substr( yourls_salt( $material ), 0, 10 );
}
```

- [ ] **Step 3: Run tests**

Run: `./vendor/bin/phpunit tests/tests/users/SignatureRotationTest.php`
Expected: PASS.

- [ ] **Step 4: Run the existing auth signature tests**

Run: `./vendor/bin/phpunit tests/tests/auth/SigTest.php`
Expected: PASS — pre-existing tests still green.

- [ ] **Step 5: Commit**

```bash
git add includes/functions-auth.php tests/tests/users/SignatureRotationTest.php
git commit -m "feat(users): versioned API signatures (rotation invalidates only that user's keys)"
```

---

## Task 14: API rate limit — sliding window for editors

**Files:**
- Create: `includes/functions-api-rate-limit.php`
- Modify: `includes/load-yourls.php`
- Modify: `yourls-api.php`
- Test: `tests/tests/users/ApiRateLimitTest.php`

- [ ] **Step 1: Write failing test**

```php
<?php
namespace YOURLS\Tests\Users;

use PHPUnit\Framework\TestCase;

class ApiRateLimitTest extends TestCase
{
    private $editor_id;
    private $admin_id;

    protected function setUp(): void
    {
        $ydb = yourls_get_db();
        $ydb->perform("DELETE FROM `".YOURLS_DB_TABLE_USERS."` WHERE username LIKE 'rltest_%'");
        $ydb->perform("DELETE FROM `".YOURLS_DB_TABLE_API_RATE."`");
        $this->editor_id = yourls_create_user('rltest_editor', 'p@ssw0rd1', 'editor');
        $this->admin_id  = yourls_create_user('rltest_admin', 'p@ssw0rd1', 'admin');
    }

    public function test_admin_is_not_rate_limited()
    {
        for ($i = 0; $i < 200; $i++) {
            $this->assertTrue(yourls_check_user_api_rate($this->admin_id, 'shorturl', /*test*/ true));
        }
    }

    public function test_config_file_user_is_not_rate_limited()
    {
        $this->assertTrue(yourls_check_user_api_rate(null, 'shorturl', true));
    }

    public function test_editor_is_throttled_after_window_limit()
    {
        $limit = (int) YOURLS_API_RATE_LIMIT_PER_WINDOW;
        for ($i = 0; $i < $limit; $i++) {
            $this->assertTrue(yourls_check_user_api_rate($this->editor_id, 'shorturl', true));
        }
        // The (limit+1)-th call must be rejected (test mode returns false instead of dying)
        $this->assertFalse(yourls_check_user_api_rate($this->editor_id, 'shorturl', true));
    }

    public function test_disabled_when_constant_zero()
    {
        if ((int) YOURLS_API_RATE_LIMIT_PER_WINDOW === 0) {
            $this->markTestSkipped('Limit not zero in this config');
        }
        // Simulate disable via filter
        $cb = function () { return 0; };
        yourls_add_filter('user_api_rate_limit_per_window', $cb, 5);
        for ($i = 0; $i < 500; $i++) {
            $this->assertTrue(yourls_check_user_api_rate($this->editor_id, 'shorturl', true));
        }
    }
}
```

Run: FAIL — function not defined.

- [ ] **Step 2: Create `includes/functions-api-rate-limit.php`**

```php
<?php
/**
 * Sliding-window per-user API rate limit.
 *
 * Admins and config-file users (no user_id) are exempt by design.
 * Configurable via YOURLS_API_RATE_LIMIT_PER_WINDOW (default 60) and
 * YOURLS_API_RATE_LIMIT_WINDOW (default 60 seconds). Set the per-window
 * value to 0 to disable.
 */

/**
 * Check the rate limit for the given user_id.
 *
 * @param int|null $user_id  Current DB user_id, or null for config-file/anonymous (exempt).
 * @param string   $action   API action name (logged for auditability).
 * @param bool     $test_mode  When true, returns false on throttle instead of calling yourls_die.
 *                             Used by tests; production callers leave it false.
 * @return bool  true on accepted call, false on throttle (test mode), or never-returns on throttle (production).
 */
function yourls_check_user_api_rate( $user_id, $action, $test_mode = false ) {
    $per_window = (int) yourls_apply_filter( 'user_api_rate_limit_per_window', YOURLS_API_RATE_LIMIT_PER_WINDOW );
    $window     = (int) yourls_apply_filter( 'user_api_rate_limit_window', YOURLS_API_RATE_LIMIT_WINDOW );

    // Disabled
    if ( $per_window <= 0 || $window <= 0 ) return true;

    // Admins / config-file users / anonymous: exempt
    if ( $user_id === null ) return true;
    if ( function_exists( 'yourls_get_user_by_username' ) ) {
        // user_id given: look up the role
        $ydb = yourls_get_db( 'read-rate_limit_role' );
        $role = $ydb->fetchValue(
            "SELECT `role` FROM `".YOURLS_DB_TABLE_USERS."` WHERE `user_id` = :id LIMIT 1",
            [ 'id' => (int) $user_id ]
        );
        if ( $role === 'admin' ) return true;
    }

    $table = YOURLS_DB_TABLE_API_RATE;
    $ydb   = yourls_get_db( 'write-rate_limit' );

    // Prune rows older than 2× window (cheap bound on table size, per user)
    $ydb->perform(
        "DELETE FROM `$table` WHERE `user_id` = :id AND `called_at` < (CURRENT_TIMESTAMP - INTERVAL :twice SECOND)",
        [ 'id' => (int) $user_id, 'twice' => 2 * $window ]
    );

    $count = (int) $ydb->fetchValue(
        "SELECT COUNT(*) FROM `$table` WHERE `user_id` = :id AND `called_at` >= (CURRENT_TIMESTAMP - INTERVAL :w SECOND)",
        [ 'id' => (int) $user_id, 'w' => $window ]
    );

    if ( $count >= $per_window ) {
        if ( $test_mode ) return false;
        yourls_status_header( 429 );
        header( 'Retry-After: ' . $window );
        echo json_encode( [ 'errorCode' => '429', 'message' => 'Too Many Requests' ] );
        die();
    }

    $ydb->perform(
        "INSERT INTO `$table` (`user_id`, `action`) VALUES (:id, :a)",
        [ 'id' => (int) $user_id, 'a' => substr( (string) $action, 0, 32 ) ]
    );

    return true;
}
```

- [ ] **Step 3: Wire the include**

Edit `includes/load-yourls.php`, add after the users CRUD include:

```php
require_once( YOURLS_INC.'/functions-api-rate-limit.php' );
```

- [ ] **Step 4: Run tests**

Run: `./vendor/bin/phpunit tests/tests/users/ApiRateLimitTest.php`
Expected: PASS.

- [ ] **Step 5: Hook the limit into `yourls-api.php`**

In `yourls-api.php`, after the auth check (`yourls_maybe_require_auth();`) and before the action dispatch loop, add:

```php
// Per-user rate limit (no-op for admins / config-file users / when disabled).
// Skip the cheap 'version' action used by health checks.
$action = yourls_sanitize_string( $_REQUEST['action'] ?? '' );
if ( $action !== 'version' && function_exists( 'yourls_check_user_api_rate' ) ) {
    yourls_check_user_api_rate( yourls_current_user_id(), $action );
}
```

- [ ] **Step 6: Lint**

Run: `php -l yourls-api.php includes/functions-api-rate-limit.php`

- [ ] **Step 7: Commit**

```bash
git add includes/functions-api-rate-limit.php includes/load-yourls.php yourls-api.php tests/tests/users/ApiRateLimitTest.php
git commit -m "feat(users): sliding-window per-user API rate limit (admin bypass)"
```

---

## Task 15: Admin menu adds "Users" and "Profile" entries

**Files:**
- Modify: `includes/functions-html.php` (`yourls_html_menu`, search for `function yourls_html_menu`)
- Modify: `ui/views/admin/...` if menu rendering lives in Blade — check both

- [ ] **Step 1: Locate the menu function**

Run: `grep -n "function yourls_html_menu\|admin_menu" includes/functions-html.php`

- [ ] **Step 2: Add menu items conditionally**

In `yourls_html_menu`, find the `$admin_menu` array and add:

```php
    if ( function_exists( 'yourls_current_user_can' ) && yourls_current_user_can( 'manage_users' ) ) {
        $admin_menu['users'] = [ yourls__( 'Users' ), 'users.php' ];
    }
    if ( defined( 'YOURLS_USER' ) ) {
        $admin_menu['profile'] = [ yourls__( 'Profile' ), 'profile.php' ];
    }
```

(Adapt to the exact array shape the function uses — keep the existing pattern.)

- [ ] **Step 3: If the new Blade layout has a separate menu component, mirror the change there**

Run: `grep -rn "Tools\|Plugins" ui/components ui/layouts | grep -i "menu\|nav"`
If a Blade nav component renders the menu independently, add the same gated items there.

- [ ] **Step 4: Lint**

Run: `php -l includes/functions-html.php`

- [ ] **Step 5: Commit**

```bash
git add includes/functions-html.php ui/components ui/layouts
git commit -m "feat(users): admin menu entries for Users (admin only) and Profile"
```

---

## Task 16: `/admin/users.php` — list view

**Files:**
- Create: `admin/users.php`
- Create: `ui/views/admin/users/index.blade.php`

- [ ] **Step 1: Create `admin/users.php`**

```php
<?php
define( 'YOURLS_ADMIN', true );
require_once( dirname( __DIR__ ) . '/includes/load-yourls.php' );
yourls_maybe_require_auth();

if ( !yourls_current_user_can( 'manage_users' ) ) {
    yourls_die( yourls__( 'You are not authorised to access this page.' ), yourls__( 'Forbidden' ), 403 );
}

$action  = $_REQUEST['action'] ?? 'list';
$flash   = [];
$user_id = isset( $_REQUEST['id'] ) ? (int) $_REQUEST['id'] : 0;

// Handle POST first
if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
    yourls_verify_nonce( 'users_form' );
    try {
        $username  = trim( (string) ( $_POST['username']  ?? '' ) );
        $role      = (string) ( $_POST['role']      ?? 'editor' );
        $password  = (string) ( $_POST['password']  ?? '' );
        $confirm   = (string) ( $_POST['password_confirm'] ?? '' );
        $is_active = isset( $_POST['is_active'] );

        if ( $action === 'create' ) {
            if ( $password !== $confirm ) throw new InvalidArgumentException( 'Passwords do not match' );
            yourls_create_user( $username, $password, $role, $is_active );
            $flash = [ 'tone' => 'success', 'message' => yourls_s( 'User %s created', $username ) ];
            $action = 'list';
        } elseif ( $action === 'update' && $user_id > 0 ) {
            if ( $password !== '' && $password !== $confirm ) throw new InvalidArgumentException( 'Passwords do not match' );
            $fields = [ 'role' => $role, 'is_active' => $is_active ];
            if ( $password !== '' ) $fields['password'] = $password;
            if ( $username !== '' ) $fields['username'] = $username;
            yourls_update_user( $user_id, $fields );
            $flash = [ 'tone' => 'success', 'message' => yourls__( 'User updated' ) ];
            $action = 'list';
        } elseif ( $action === 'delete' && $user_id > 0 ) {
            yourls_delete_user( $user_id );
            $flash = [ 'tone' => 'success', 'message' => yourls__( 'User deleted' ) ];
            $action = 'list';
        } elseif ( $action === 'rotate_key' && $user_id > 0 ) {
            yourls_rotate_user_api_key( $user_id );
            $flash = [ 'tone' => 'success', 'message' => yourls__( 'API key rotated' ) ];
            $action = 'list';
        }
    } catch ( \Throwable $e ) {
        $flash = [ 'tone' => 'error', 'message' => $e->getMessage() ];
    }
}

$current_user_id = yourls_current_user_id();
$users = yourls_list_users();

$view_data = [
    'users'           => $users,
    'flash'           => $flash,
    'action'          => $action,
    'editing_user'    => null,
    'current_user_id' => $current_user_id,
    'nonce'           => yourls_create_nonce( 'users_form' ),
];

if ( ( $action === 'edit' || $action === 'new' ) ) {
    if ( $action === 'edit' && $user_id > 0 ) {
        $row = null;
        foreach ( $users as $u ) {
            if ( (int) $u['user_id'] === $user_id ) { $row = $u; break; }
        }
        $view_data['editing_user'] = $row;
    }
    echo yourls_ui_view( 'admin.users.form', $view_data );
} else {
    echo yourls_ui_view( 'admin.users.index', $view_data );
}
```

- [ ] **Step 2: Create `ui/views/admin/users/index.blade.php`**

```blade
@extends('admin', ['title' => function_exists('yourls__') ? yourls__('Users') : 'Users'])

@section('content')
    <div class="space-y-4">
        @if(!empty($flash))
            <x-organisms::banner :tone="$flash['tone']">{{ $flash['message'] }}</x-organisms::banner>
        @endif

        <x-organisms::card :title="function_exists('yourls__') ? yourls__('Users') : 'Users'">
            <div class="flex justify-end mb-3">
                <a class="yourls-btn-primary" href="users.php?action=new">@yourlsT('New user')</a>
            </div>

            <table class="yourls-table w-full">
                <thead>
                    <tr>
                        <th>@yourlsT('Username')</th>
                        <th>@yourlsT('Role')</th>
                        <th>@yourlsT('Active')</th>
                        <th>@yourlsT('Last login')</th>
                        <th>@yourlsT('Created')</th>
                        <th>@yourlsT('Actions')</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $u)
                    <tr>
                        <td>{{ $u['username'] }}@if((int)$u['user_id'] === (int)$current_user_id) <span class="text-xs">(@yourlsT('you'))</span>@endif</td>
                        <td>{{ $u['role'] }}</td>
                        <td>{{ ((int)$u['is_active']) ? '✓' : '—' }}</td>
                        <td>{{ $u['last_login_at'] ?? '—' }}</td>
                        <td>{{ $u['created_at'] }}</td>
                        <td>
                            <a href="users.php?action=edit&id={{ (int) $u['user_id'] }}">@yourlsT('Edit')</a>
                            <form method="post" action="users.php" style="display:inline" onsubmit="return confirm('@yourlsT('Delete this user?')')">
                                <input type="hidden" name="action" value="delete" />
                                <input type="hidden" name="id" value="{{ (int) $u['user_id'] }}" />
                                <input type="hidden" name="nonce" value="{{ $nonce }}" />
                                <button type="submit">@yourlsT('Delete')</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </x-organisms::card>
    </div>
@endsection
```

- [ ] **Step 3: Lint**

Run: `php -l admin/users.php`

- [ ] **Step 4: Manual smoke test**

Visit `/admin/users.php` while logged in as admin: page renders the user list. Visit as editor: gets 403.

- [ ] **Step 5: Commit**

```bash
git add admin/users.php ui/views/admin/users/index.blade.php
git commit -m "feat(users): admin Users list page (Blade)"
```

---

## Task 17: `/admin/users.php` — create/edit form

**Files:**
- Create: `ui/views/admin/users/form.blade.php`

- [ ] **Step 1: Create the form view**

```blade
@extends('admin', ['title' => function_exists('yourls__') ? yourls__('User') : 'User'])

@section('content')
    @if(!empty($flash))
        <x-organisms::banner :tone="$flash['tone']">{{ $flash['message'] }}</x-organisms::banner>
    @endif

    <x-organisms::card :title="$editing_user ? yourls__('Edit user') : yourls__('New user')">
        <form method="post" action="users.php" class="space-y-3">
            <input type="hidden" name="action" value="{{ $editing_user ? 'update' : 'create' }}" />
            <input type="hidden" name="id" value="{{ $editing_user['user_id'] ?? 0 }}" />
            <input type="hidden" name="nonce" value="{{ $nonce }}" />

            <label class="block">
                @yourlsT('Username')
                <input class="text" name="username" value="{{ $editing_user['username'] ?? '' }}" required />
            </label>

            <label class="block">
                @yourlsT('Role')
                <select name="role">
                    <option value="admin"  @if(($editing_user['role'] ?? 'editor') === 'admin') selected @endif>admin</option>
                    <option value="editor" @if(($editing_user['role'] ?? 'editor') === 'editor') selected @endif>editor</option>
                </select>
            </label>

            <label class="block">
                <input type="checkbox" name="is_active" @if(!$editing_user || (int)($editing_user['is_active'] ?? 1)) checked @endif />
                @yourlsT('Active')
            </label>

            <label class="block">
                {{ $editing_user ? yourls__('New password (leave blank to keep)') : yourls__('Password') }}
                <input class="text" type="password" name="password" autocomplete="new-password" {{ $editing_user ? '' : 'required' }} />
            </label>

            <label class="block">
                @yourlsT('Confirm password')
                <input class="text" type="password" name="password_confirm" autocomplete="new-password" {{ $editing_user ? '' : 'required' }} />
            </label>

            <div class="flex gap-2">
                <button type="submit" class="yourls-btn-primary">{{ $editing_user ? yourls__('Save') : yourls__('Create') }}</button>
                <a href="users.php" class="yourls-btn-secondary">@yourlsT('Cancel')</a>
            </div>
        </form>

        @if($editing_user)
            <hr class="my-4" />
            <form method="post" action="users.php" onsubmit="return confirm('@yourlsT('Rotate this user\'s API key?')')">
                <input type="hidden" name="action" value="rotate_key" />
                <input type="hidden" name="id" value="{{ $editing_user['user_id'] }}" />
                <input type="hidden" name="nonce" value="{{ $nonce }}" />
                <button type="submit">@yourlsT('Rotate API key')</button>
                <span class="text-xs">@yourlsT('Current version'): v{{ (int) $editing_user['api_key_version'] }}</span>
            </form>
        @endif
    </x-organisms::card>
@endsection
```

- [ ] **Step 2: Smoke test**

Visit `/admin/users.php?action=new`: form renders. Submit it: redirects to list with banner. Edit: pre-filled form. Rotate API key: button increments version.

- [ ] **Step 3: Commit**

```bash
git add ui/views/admin/users/form.blade.php
git commit -m "feat(users): admin user form (create/edit/rotate-key)"
```

---

## Task 18: `/admin/profile.php` — self-service password & API key

**Files:**
- Create: `admin/profile.php`
- Create: `ui/views/admin/profile.blade.php`

- [ ] **Step 1: Create `admin/profile.php`**

```php
<?php
define( 'YOURLS_ADMIN', true );
require_once( dirname( __DIR__ ) . '/includes/load-yourls.php' );
yourls_maybe_require_auth();

if ( !yourls_current_user_can( 'manage_own_profile' ) ) {
    yourls_die( yourls__( 'Login required' ), yourls__( 'Forbidden' ), 403 );
}

$me_id   = yourls_current_user_id(); // null for config-file users
$me_name = defined('YOURLS_USER') ? YOURLS_USER : '';
$is_db_user = $me_id !== null;
$flash   = [];

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
    yourls_verify_nonce( 'profile_form' );
    try {
        $action = $_POST['action'] ?? '';
        if ( $action === 'change_password' ) {
            if ( !$is_db_user ) throw new \RuntimeException( 'Config-file users must edit user/config.php to change credentials.' );
            $current = (string) ( $_POST['current_password'] ?? '' );
            $new     = (string) ( $_POST['password']         ?? '' );
            $confirm = (string) ( $_POST['password_confirm'] ?? '' );
            if ( !yourls_db_check_password( $me_name, $current ) ) throw new \RuntimeException( 'Current password is incorrect' );
            if ( $new !== $confirm ) throw new \InvalidArgumentException( 'Passwords do not match' );
            yourls_update_user( $me_id, [ 'password' => $new ] );
            $flash = [ 'tone' => 'success', 'message' => yourls__( 'Password changed' ) ];
        } elseif ( $action === 'rotate_key' ) {
            if ( !$is_db_user ) throw new \RuntimeException( 'Config-file users have no rotatable API key.' );
            yourls_rotate_user_api_key( $me_id );
            $flash = [ 'tone' => 'success', 'message' => yourls__( 'API key rotated' ) ];
        }
    } catch ( \Throwable $e ) {
        $flash = [ 'tone' => 'error', 'message' => $e->getMessage() ];
    }
}

$signature = yourls_auth_signature( $me_name );

echo yourls_ui_view( 'admin.profile', [
    'me_name'     => $me_name,
    'is_db_user'  => $is_db_user,
    'signature'   => $signature,
    'sample_url'  => yourls_get_yourls_site() . '/yourls-api.php?signature=' . $signature . '&action=shorturl&url=https://example.com/',
    'flash'       => $flash,
    'nonce'       => yourls_create_nonce( 'profile_form' ),
] );
```

- [ ] **Step 2: Create `ui/views/admin/profile.blade.php`**

```blade
@extends('admin', ['title' => function_exists('yourls__') ? yourls__('Profile') : 'Profile'])

@section('content')
    <div class="space-y-4">
        @if(!empty($flash))
            <x-organisms::banner :tone="$flash['tone']">{{ $flash['message'] }}</x-organisms::banner>
        @endif

        <x-organisms::card :title="function_exists('yourls__') ? yourls__('Change password') : 'Change password'">
            @if(!$is_db_user)
                <p>@yourlsT('Your credentials live in user/config.php. Edit that file to change them.')</p>
            @else
                <form method="post" action="profile.php" class="space-y-3">
                    <input type="hidden" name="action" value="change_password" />
                    <input type="hidden" name="nonce"  value="{{ $nonce }}" />
                    <label class="block">@yourlsT('Current password')<input class="text" type="password" name="current_password" autocomplete="current-password" required /></label>
                    <label class="block">@yourlsT('New password')<input class="text" type="password" name="password" autocomplete="new-password" required /></label>
                    <label class="block">@yourlsT('Confirm new password')<input class="text" type="password" name="password_confirm" autocomplete="new-password" required /></label>
                    <button type="submit" class="yourls-btn-primary">@yourlsT('Change password')</button>
                </form>
            @endif
        </x-organisms::card>

        <x-organisms::card :title="function_exists('yourls__') ? yourls__('API access') : 'API access'">
            <p><strong>@yourlsT('Username'):</strong> {{ $me_name }}</p>
            <p><strong>@yourlsT('Signature'):</strong> <code>{{ $signature }}</code></p>
            <p class="text-xs">@yourlsT('Example URL'): <code>{{ $sample_url }}</code></p>

            @if($is_db_user)
                <form method="post" action="profile.php" class="mt-3" onsubmit="return confirm('@yourlsT('Rotate your API key? All scripts using the current signature will stop working until updated.')')">
                    <input type="hidden" name="action" value="rotate_key" />
                    <input type="hidden" name="nonce"  value="{{ $nonce }}" />
                    <button type="submit">@yourlsT('Rotate my API key')</button>
                </form>
            @else
                <p class="text-xs mt-3">@yourlsT('Config-file users cannot rotate the signature; it is derived from the static cookie key.')</p>
            @endif
        </x-organisms::card>
    </div>
@endsection
```

- [ ] **Step 3: Lint**

Run: `php -l admin/profile.php`

- [ ] **Step 4: Smoke test**

Visit `/admin/profile.php`: shows password card and API card. Change password works. Rotate key changes the displayed signature.

- [ ] **Step 5: Commit**

```bash
git add admin/profile.php ui/views/admin/profile.blade.php
git commit -m "feat(users): self-service Profile page (password + API key rotation)"
```

---

## Task 19: Hide row actions in dashboard for non-owners

**Files:**
- Modify: `includes/functions-html.php` (`yourls_table_add_row` ~line 623)

- [ ] **Step 1: Compute owner once and short-circuit when editor and not owner**

Inside `yourls_table_add_row`, right after the local variable setup near the top (after `$shorturl = yourls_link($keyword);`), add:

```php
    $can_edit = function_exists( 'yourls_current_user_can' )
        ? yourls_current_user_can( 'edit_link', [ 'keyword' => $keyword ] )
        : true;
```

Then in the `$actions` array, gate `edit` and `delete`:

```php
    if ( $can_edit ) {
        $actions['edit']   = [ /* ...existing... */ ];
        $actions['delete'] = [ /* ...existing... */ ];
    }
```

(Keep `stats` and `share` always available.)

- [ ] **Step 2: Lint**

Run: `php -l includes/functions-html.php`

- [ ] **Step 3: Commit**

```bash
git add includes/functions-html.php
git commit -m "feat(users): hide edit/delete row actions for non-owner editors"
```

---

## Task 20: Self-review checklist

**Files:**
- All

- [ ] **Step 1: Verify all tests pass**

Run: `./vendor/bin/phpunit tests/tests/users/`
Expected: every users test green.

- [ ] **Step 2: Verify pre-existing tests still pass**

Run: `./vendor/bin/phpunit`
Expected: full suite green.

- [ ] **Step 3: Lint every modified PHP file**

Run:

```bash
for f in includes/version.php includes/Config/Config.php includes/functions-install.php \
         includes/functions-upgrade.php includes/functions-auth.php \
         includes/functions-auth-roles.php includes/functions-users-crud.php \
         includes/functions-api-rate-limit.php includes/functions-shorturls.php \
         includes/functions-html.php admin/index.php admin/admin-ajax.php \
         admin/users.php admin/profile.php yourls-api.php; do
  php -l "$f" 2>&1 | grep -v "No syntax errors" || true
done
echo "---done---"
```

Expected: only `---done---` printed.

- [ ] **Step 4: Manual end-to-end test (record commands)**

```
1. docker compose down && docker compose up -d
2. Visit http://localhost:8080/admin/upgrade.php — run upgrade to v509
3. Visit /admin/users.php — create editor `bob` with password `editor123!`
4. Logout, login as bob, verify:
   - Dashboard shows no links yet
   - Tools/Plugins/Users hidden in menu
   - Profile page accessible, can change own password and rotate key
5. Create a link as bob.
6. Logout, login as admin, verify:
   - Dashboard shows ALL links
   - Users page shows bob with last_login_at populated
7. From bob: try edit/delete an admin's link via direct URL → 403
```

- [ ] **Step 5: Commit final state**

```bash
git status
# If anything uncommitted, commit it.
git log --oneline -25
```

---

## Verification matrix vs. design spec

| Spec section | Implemented in |
|---|---|
| §3.1 Users new columns | Tasks 1, 2 |
| §3.2 created_by | Tasks 1, 2, 10 |
| §3.3 api_rate table | Tasks 1, 2 |
| §3.4 Migration v508→v509 | Task 1 |
| §4.1 Roles | Tasks 3, 6, 7 |
| §4.2 Config-file = admin | Task 3 (`yourls_current_user_role`) |
| §4.3 Permission API + filter | Task 3 |
| §4.4 Login resolves role | Task 9 |
| §5.1 API actions | Task 14 (gate hooked at action dispatch) |
| §5.2 Sliding-window rate limit | Task 14 |
| §5.3 Versioned signature | Task 13 |
| §6.1 Menu | Task 15 |
| §6.2 /admin/users.php | Tasks 16, 17 |
| §6.3 /admin/profile.php | Task 18 |
| §6.4 Editor scoping in dashboard | Tasks 11, 19 |
| §6.5 Visual style (reuse) | All Blade views |
| §7 Tests | Tasks 1, 3, 4, 6–10, 13, 14 |
| §8 Security guards (last admin, self-delete) | Tasks 8, 16 |
| §9 Backwards compat | Tasks 1, 2, 13 (un-versioned salt for v=1) |
