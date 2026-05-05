# DB-backed User Management for YOURLS

**Status:** Draft, pending implementation
**Author/Maintainer:** maxabba
**Target branch:** `feature/ui-rewrite-filament` → upstream PR
**Related work:** completes the DB-users migration started in M7+ (commits `dc0abfc`, `9ab28ca`).

---

## 1. Goals & Non-Goals

### Goals

1. Provide a first-class admin UI to manage users stored in `yourls_users`: list, create, edit, delete, change role, toggle active, change password.
2. Introduce a two-role permission model (`admin`, `editor`) without breaking any existing single-admin install.
3. Track ownership of short URLs (`yourls_url.created_by`) so editors can be confined to their own links while admins keep full visibility.
4. Provide self-service "My profile" page (change own password, view/regenerate own API signature key).
5. Add a per-user sliding-window rate limit for editors hitting the API.
6. Keep all changes additive — every existing install (config-file users, single admin, API clients using legacy signature) must keep working with **zero** intervention after the DB upgrade runs.

### Non-Goals

- Email verification, password recovery flows via email, 2FA. Out of scope; can be added later as plugins.
- A `viewer` role (read-only). Deferrable.
- Public-facing user registration. The three surfaces (admin / API / infos) and their privacy semantics stay exactly as today.
- Policing third-party plugins that add `edit`/`delete` API actions. We expose a permission helper plus a `user_can` filter for opt-in; we do not block their actions if they don't use it.
- Audit trail / activity log. Out of scope for this PR; could land separately.

---

## 2. Context: Why this is additive

YOURLS exposes three independent surfaces, each with its own privacy switch:

| Surface | File | Privacy switch | Auth methods |
|---|---|---|---|
| Admin UI | `admin/*.php` | always private | username/password (cookie session) |
| Public API | `yourls-api.php` | `YOURLS_PRIVATE_API` (default false) | username/password, signature, signature+timestamp |
| Public infos | `yourls-infos.php` | `YOURLS_PRIVATE_INFOS` (default false) | username/password (form) |
| Redirect | `yourls-go.php` | always public | n/a |

Today, `yourls_user_passwords` (config-file array) is the only credential store. Recent work added a `yourls_users` DB table populated from that array on install, plus DB-aware checks in `functions-auth.php`. **This design completes that work** by adding (a) a UI, (b) a role concept, (c) ownership of links, (d) per-user API keys, (e) per-user rate limiting for editors.

The hard rule for the upstream PR: **everything must keep working unchanged for an install that never opens the new "Users" page.** Config-file users keep being admins. Existing signature URLs keep validating. No client-visible breakage.

---

## 3. Data model changes (DB v508 → v509)

### 3.1 `yourls_users` (alter)

Add columns:

| Column | Type | Default | Notes |
|---|---|---|---|
| `role` | `enum('admin','editor')` | `'admin'` | Backfilled to `admin` for all existing rows. |
| `api_key_version` | `int unsigned NOT NULL` | `1` | Used by `yourls_auth_signature()` so rotating it invalidates all prior signatures issued for that user. |
| `last_login_at` | `timestamp NULL` | `NULL` | Updated on successful login (web or API). Display-only, not security-load-bearing. |

`username`, `password_hash`, `is_active`, `created_at`, `updated_at`, `user_id` — unchanged.

### 3.2 `yourls_url` (alter)

Add column:

| Column | Type | Default | Notes |
|---|---|---|---|
| `created_by` | `int unsigned NULL` | `NULL` | FK semantics to `yourls_users.user_id` but **no DB-level FK constraint** (YOURLS doesn't use FKs anywhere; would break MyISAM compat). `NULL` = legacy/unowned link. |

Index: `KEY created_by (created_by)` for editor's "my links" filter.

### 3.3 `yourls_api_rate` (new)

```sql
CREATE TABLE `yourls_api_rate` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `called_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `action` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_window` (`user_id`, `called_at`)
) DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

Row per API call by an editor. Pruned opportunistically: on every insert we delete rows older than `2 * window_seconds` for the same user_id (cheap, bounded). Configurable; for installs that disable rate limiting this table never gets written to.

### 3.4 Migration step `yourls_upgrade_to_509()`

```
1. ALTER TABLE yourls_users ADD COLUMN role enum('admin','editor') NOT NULL DEFAULT 'admin';
   ALTER TABLE yourls_users ADD COLUMN api_key_version int unsigned NOT NULL DEFAULT 1;
   ALTER TABLE yourls_users ADD COLUMN last_login_at timestamp NULL;
2. ALTER TABLE yourls_url   ADD COLUMN created_by int unsigned NULL,
                             ADD KEY created_by (created_by);
3. CREATE TABLE IF NOT EXISTS yourls_api_rate (...);
```

All steps idempotent (`SHOW COLUMNS LIKE` guard before each ALTER, `IF NOT EXISTS` on the CREATE). Existing rows get `role='admin'` automatically via DEFAULT — **non-destructive backfill confirmed**. `yourls_create_sql_tables()` (used at fresh install) is updated to include the new columns directly.

---

## 4. Permission model

### 4.1 Roles

- `admin` — everything. Can manage users, can edit/delete any link (regardless of `created_by`), can read all stats, has no API rate limit.
- `editor` — can create new links via admin UI and via API (`shorturl` action). In admin UI can edit/delete **only** links where `created_by === user_id`. Can read stats of own links. No access to user management. Rate-limited on API.

### 4.2 Config-file users

Users defined in `$yourls_user_passwords` (`user/config.php`) are **always treated as `admin`**. They are not in the DB so they have no `user_id`; for ownership purposes they are recorded as `created_by = NULL` (i.e. their links look identical to legacy un-owned links). This preserves the "break-glass" semantic: editing the config file is the disaster-recovery path and must always grant full access.

### 4.3 Permission API

New file `includes/functions-auth-roles.php`:

```php
yourls_current_user_id()         // int|null   user_id of current DB user, null for config-file/anonymous
yourls_current_user_role()       // 'admin'|'editor'|null
yourls_current_user_can($cap, $ctx = [])  // bool

// Capabilities (initial set):
//   manage_users           → admin only
//   create_link            → admin, editor
//   edit_link   ($keyword) → admin always; editor iff link.created_by === current user_id
//   delete_link ($keyword) → same as edit_link
//   view_link_stats($kw)   → admin always; editor iff owner; otherwise reflects existing infos privacy
//   manage_own_profile     → any logged-in user
```

The check funnels through filter `yourls_user_can`:

```php
return (bool) yourls_apply_filter('user_can', $default, $cap, $user_id, $ctx);
```

Plugins that want to slot into the role system override here. **We do not call these helpers from `yourls_edit_link()` / `yourls_delete_link_by_keyword()`** — those stay open, exactly as today, so third-party plugins (API edit, API delete) keep working without modification. The checks are applied at our **own** call sites:

- `admin/admin-ajax.php` (edit/delete actions)
- `admin/users.php` (the new page)
- `admin/profile.php` (the new page)
- new admin UI controllers

If the upstream maintainers later want to push the check down into the core functions, that's a separate decision.

### 4.4 Login: priority and resolution

Current logic (post-fixes earlier in this branch): on login attempt, accept either DB user OR config-file user (whichever validates first). With roles:

1. Try DB lookup. If user found and password validates → set `YOURLS_USER` to username, set role to row's `role`, set `user_id` to row's `user_id`, update `last_login_at`. Return success.
2. Else try config-file. If matches → set `YOURLS_USER`, role = `admin`, `user_id = null`. Return success.
3. Else fail.

The role and user_id are exposed via the new helpers, **not** as new global constants (constants would be a migration headache and can't change between calls).

---

## 5. API hardening

### 5.1 Action-level

The core API still exposes only `shorturl, stats, db-stats, url-stats, expand, version`. Of these, `shorturl` is the only writer; the rest are reads. With this design:

- `shorturl`: any authenticated user (admin or editor). Newly created link has `created_by = current_user_id` (or `NULL` for config-file users). Subject to per-user rate limit if editor.
- `stats`, `db-stats`: returned data is **unfiltered** (admins always; editors get the same data they'd see today). Rationale: filtering "global stats" by ownership would break clients that depend on totals. Editors who want only their numbers can use `stats?filter=...` once we (or a plugin) add an owner filter — out of scope for this PR.
- `url-stats`, `expand`: behavior unchanged. The infos privacy switch still governs external reads.
- `version`: unchanged.

### 5.2 Per-user rate limit (sliding window)

```
yourls_check_user_api_rate($user_id, $action) :
  if no $user_id (config-file) or role == 'admin' or limit disabled → return true
  $now    = now
  $cutoff = $now - YOURLS_API_RATE_LIMIT_WINDOW
  prune: DELETE FROM yourls_api_rate WHERE user_id = ? AND called_at < (now - 2*window)
  count : SELECT COUNT(*) FROM yourls_api_rate WHERE user_id = ? AND called_at >= cutoff
  if count >= YOURLS_API_RATE_LIMIT_PER_WINDOW → emit 429, die
  insert: INSERT INTO yourls_api_rate(user_id, action) VALUES(?, ?)
  return true
```

New constants:

| Constant | Default | Meaning |
|---|---|---|
| `YOURLS_API_RATE_LIMIT_PER_WINDOW` | `60` | Max calls per editor in window. `0` disables. |
| `YOURLS_API_RATE_LIMIT_WINDOW` | `60` (seconds) | Window length. |

Hooked into `yourls-api.php` right after authentication, before action dispatch. If the action is `version` (no DB hit anyway), we skip the limit to keep healthchecks free.

### 5.3 API signature with key version

`yourls_auth_signature($user)` currently hashes the user salt. We extend the hash material with the user's `api_key_version` (DB users only):

```php
function yourls_auth_signature($user = false) {
    // ... resolve $user ...
    $version = yourls_get_user_api_key_version($user);  // 1 for config-file or unknown
    return substr(yourls_salt($user . '|v' . $version), 0, 10);
}
```

Bumping the row's `api_key_version` invalidates all old signatures for that user only. Existing installs after upgrade have all rows at `version=1`, so the new computation produces the same value as before for **existing config-file-rooted signatures only if** we keep `version=1` mapped to the un-versioned salt. To preserve byte-perfect backward compatibility:

```php
$material = $version > 1 ? "$user|v$version" : $user;
```

So pre-upgrade signatures still validate post-upgrade until the user actively rotates. Confirmed non-destructive.

---

## 6. UI: pages, navigation, components

### 6.1 Navigation entry

Add "Users" to the admin top menu (`yourls_html_menu()`), visible only when `yourls_current_user_can('manage_users')`. Add "Profile" entry (or user-name dropdown) visible to all logged-in users.

### 6.2 `/admin/users.php` (admin only)

Single page with three states driven by query string:

- **List** (`/admin/users.php`): table of all users (username, role badge, active, last login, created at, actions). Filter input (substring match on username). Sort by username/last_login/created.
- **Create** (`/admin/users.php?action=new`): form (username, role select, password, password confirm, active checkbox).
- **Edit** (`/admin/users.php?action=edit&id=N`): same form, password fields optional (empty = unchanged). Delete button (with confirm modal, the existing organism). Rotate-API-key button.

All POSTs go back to `/admin/users.php` and verify nonce. Server-side validation:

- username: `[a-zA-Z0-9_.-]{1,64}`, unique among DB users. Conflicts with config-file users are allowed (a DB row shadows the config-file user for login purposes — same behavior as today since DB is consulted first).
- role: must be `admin` or `editor`.
- password: min length 8 (plugin-overridable via `yourls_apply_filter('user_password_min_length', 8)`).
- Cannot delete self. Cannot demote self from admin if you are the only active admin (computed live).

Blade views: `ui/views/admin/users/index.blade.php`, `users/form.blade.php`. Reuse existing organisms (table, banner, modal, forms).

### 6.3 `/admin/profile.php` (any logged-in user)

Two cards:

1. **Change password** — current, new, confirm. Standard rules.
2. **API access** — shows the username and current signature (`yourls_auth_signature($current_user)`); button "Regenerate signature" with confirm. Disabled for config-file users (no DB row → no `api_key_version` to bump → no rotation possible without DB user). Shows constructed example URL for `action=shorturl`.

Both write through the same role/permission helpers (a config-file user editing the password page changes config-file? **No.** Config-file users see the password card disabled with a note "Your credentials live in `user/config.php`. Edit that file to change them." This avoids weird half-DB / half-file states.)

### 6.4 Existing pages: changes for editors

- **Dashboard (`admin/index.php`)**: editors see only their links. SQL filter `WHERE created_by = :uid` injected via existing `admin_list_where` filter (already designed for this). Admins see all (current behavior).
- **Tools / Plugins / Install / Upgrade**: admin only. Wrap the page bodies in `if (!yourls_current_user_can('manage_xxx')) yourls_die(...)`. For a single-admin install nothing changes.
- **Add-new form**: visible to both roles. The created link has `created_by` set on insert.
- **Edit/delete buttons in the list**: hidden by Blade for rows the editor doesn't own (defense-in-depth: even if shown, the AJAX endpoint refuses).

### 6.5 Visual style

Reuses the M1–M7 Blade components and tokens. No new design language. No new dist CSS classes — every page composes existing `yourls-card`, `yourls-table`, atoms/molecules/organisms.

---

## 7. Code organization

New files:

```
includes/functions-auth-roles.php       (capabilities helper, current_user_*, filter integration)
includes/functions-users-crud.php       (yourls_create_user, yourls_update_user, yourls_delete_user, listing)
includes/functions-api-rate-limit.php   (the sliding window logic)
admin/users.php                         (admin-only CRUD page, controller-style)
admin/profile.php                       (any-user self-service page, controller-style)
ui/views/admin/users/index.blade.php
ui/views/admin/users/form.blade.php
ui/views/admin/profile.blade.php
```

Modified:

```
includes/version.php                  (DB v509, rationale comment)
includes/Config/Config.php            (new constants: API_RATE_LIMIT_*, USER_PASSWORD_MIN_LENGTH default)
includes/functions-install.php        (yourls_create_sql_tables: new columns/table)
includes/functions-upgrade.php        (yourls_upgrade_to_509)
includes/functions-auth.php           (login resolves role/user_id; auth_signature uses key_version; last_login_at)
includes/functions-shorturls.php      (yourls_add_new_link sets created_by)
includes/functions-html.php           (menu adds Users/Profile when allowed; row actions hidden for non-owners)
admin/admin-ajax.php                  (edit/delete actions check edit_link capability)
admin/index.php                       (dashboard query filter for editors)
yourls-api.php                        (calls rate-limit gate post-auth, pre-dispatch)
ui/views/admin/dashboard.blade.php    (no change to template, only data is filtered)
```

Tests added in `tests/tests/users/`:

- `RoleResolutionTest`: login as DB admin, DB editor, config user; assert role + user_id helpers.
- `CapabilitiesTest`: matrix of (role × cap × context) → bool.
- `OwnershipTest`: editor A creates link, editor B cannot edit/delete via UI nor admin-ajax.
- `ApiRateLimitTest`: 60 calls pass, 61st returns 429; admin not throttled; config-file user not throttled; sliding window expires.
- `SignatureRotationTest`: rotating `api_key_version` invalidates old signature; pre-rotation signatures still validate when version=1.
- `UpgradeTest`: simulate install at v508, run upgrade, assert columns/tables/defaults.

---

## 8. Security considerations

- **No regression on config-file fallback** — verified; existing single-admin installs keep working with no DB user creation needed.
- **Self-demotion guard** — UI blocks "demote/disable yourself if last active admin". Server-side check repeats it (UI-only checks are not security).
- **Self-deletion guard** — same. You cannot delete the user you are logged in as.
- **Privilege escalation** — role updates go through `yourls_update_user` which checks `manage_users` first. The role enum is whitelisted server-side; HTML form is decorative.
- **Password storage** — uses the existing `yourls_phpass_hash` (PASSWORD_BCRYPT) so we inherit the configured cost. Min length filter-overridable.
- **Timing attacks on login** — `password_verify` is constant-time; the DB lookup short-circuit and config-file fallback are sequential, but both code paths execute on a wrong password (we don't reveal "user does not exist" vs "wrong password" — the existing UI message is the same).
- **Rate limit DoS surface** — if an attacker can flood an editor's API with bad auth, they hit `yourls_check_username_password` first, which doesn't write to `yourls_api_rate`. Only authenticated calls fill the table. Pruning of `2*window` rows per insert keeps the table bounded.
- **Plugin contract** — third-party plugins that previously called `yourls_edit_link` / `yourls_delete_link_by_keyword` directly continue to work without ACL checks. This is intentional. Plugins that want to integrate with roles call `yourls_current_user_can($cap)` themselves and/or use the `user_can` filter.

---

## 9. Backwards compatibility checklist

| Scenario | Before | After |
|---|---|---|
| Single admin in `user/config.php`, no DB users | Works | Works (config-file user is admin by rule §4.2) |
| Multi user in `user/config.php`, no DB users | Works | Works, all are admin |
| Existing API client using signature URL | Works | Works (key_version=1 keeps un-versioned salt material) |
| Existing API client using username/password | Works | Works |
| Plugin calling `yourls_add_new_link` directly | Works | Works (`created_by` defaults to current user, falls back to NULL) |
| Plugin calling `yourls_edit_link` directly | Works | Works (no ACL injected into the function) |
| Plugin registering custom API action via `api_actions` filter | Works | Works (we don't intercept dispatch beyond rate limit, and rate limit is admin-bypass) |
| Pre-upgrade `yourls_url` rows | Works | Works (`created_by` is NULL, admins still see them, editors don't) |
| `YOURLS_PRIVATE`, `YOURLS_PRIVATE_API`, `YOURLS_PRIVATE_INFOS` semantics | Works | Unchanged |

---

## 10. Out of scope / followups

- Email-based password recovery
- 2FA
- Audit log
- `viewer` role
- Per-user quotas (max links, max clicks/day) beyond rate limit
- Public-facing self-registration
- Linking config-file users to DB rows for unified ownership

These are clean follow-ups. None of them block this PR.

---

## 11. Open questions

None at design freeze. All decisions are recorded with chosen options:

| Question | Choice | Rationale |
|---|---|---|
| Scope of PR | A+B+C | One coherent push; avoid leaving half-systems behind |
| Ownership backfill | NULL | Conservative, no false history |
| Roles | `admin` + `editor` | Covers the realistic split; viewer deferrable |
| Config-file role | always `admin` | Preserves break-glass semantic |
| Editor on API | yes, with rate limit | Coherent role-not-surface model |
| API rate limit | sliding window, admin bypass | Real protection without admin self-gating |
| Plugins on edit/delete | hands-off | Don't break the ecosystem; plugins opt in |
| User UI scope | list + create + edit + delete + profile + API key | Full first iteration |
| User data backfill | all rows → admin, key v1 | Zero-disruption upgrade |
