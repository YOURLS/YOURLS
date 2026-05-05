<?php
/**
 * Role-aware authentication helpers.
 *
 * Resolves the current user's role and user_id, exposes a capability check,
 * and provides DB-row lookup helpers used by the user CRUD layer and admin pages.
 *
 * Resolution rules (spec §4.2):
 *   - Anonymous (no YOURLS_USER):  id = null, role = null
 *   - Config-file user (YOURLS_USER set, no DB row):  id = null, role = 'admin'
 *   - DB user:  id = row.user_id, role = row.role
 */

/**
 * Internal cache for the resolved current user row.
 *
 * @param bool $reset  When true, clears the cache (used when YOURLS_USER changes).
 * @return array|null  Associative DB row, or null when no DB row exists for YOURLS_USER.
 */
function yourls_current_user_row( $reset = false ) {
    static $cache = false; // false = unresolved sentinel

    if ( $reset ) {
        $cache = false;
        return null;
    }
    if ( $cache !== false ) {
        return $cache;
    }
    if ( !defined( 'YOURLS_USER' ) ) {
        return $cache = null;
    }
    $cache = yourls_get_user_by_username( YOURLS_USER );
    return $cache;
}

/**
 * Get a DB user row by username.
 *
 * @param string|null $username
 * @return array|null  Associative row, or null when not found / table missing / invalid input.
 */
function yourls_get_user_by_username( $username ) {
    if ( $username === null || $username === '' ) {
        return null;
    }
    try {
        $ydb   = yourls_get_db( 'read-get_user_by_username' );
        $table = YOURLS_DB_TABLE_USERS;
        $row   = $ydb->fetchObject(
            "SELECT * FROM `$table` WHERE `username` = :u LIMIT 1",
            [ 'u' => (string) $username ]
        );
        return $row ? (array) $row : null;
    } catch ( \Exception $e ) {
        return null;
    }
}

/**
 * @return int|null  user_id of current DB user, or null for config-file/anonymous.
 */
function yourls_current_user_id() {
    $row = yourls_current_user_row();
    return $row ? (int) $row['user_id'] : null;
}

/**
 * @return string|null  'admin' | 'editor' | null (anonymous)
 */
function yourls_current_user_role() {
    if ( !defined( 'YOURLS_USER' ) ) {
        return null;
    }
    $row = yourls_current_user_row();
    if ( $row ) {
        return (string) $row['role'];
    }
    // Logged in but not in DB → config-file user → admin by spec §4.2
    return 'admin';
}

/**
 * Capability check. Initial set:
 *   manage_users           admin only
 *   create_link            admin, editor
 *   edit_link  ($keyword)  admin always; editor iff link.created_by === current user_id
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
    if ( !$user_id ) {
        return false;
    }
    if ( !is_string( $keyword ) || $keyword === '' ) {
        return false;
    }
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
