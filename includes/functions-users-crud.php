<?php
/**
 * CRUD operations for the yourls_users table.
 *
 * Pure data layer: no permission checks. Callers (admin/users.php, admin/profile.php)
 * are responsible for verifying yourls_current_user_can() before invoking these.
 *
 * Validation throws \InvalidArgumentException on bad input.
 * Persistence errors throw \RuntimeException.
 */

if ( !defined( 'YOURLS_USERNAME_REGEX' ) ) {
    define( 'YOURLS_USERNAME_REGEX', '/^[A-Za-z0-9_.\-]{1,64}$/' );
}

/**
 * Create a new DB user.
 *
 * @param string $username
 * @param string $password   plaintext, will be hashed with yourls_phpass_hash()
 * @param string $role       'admin' or 'editor' (default 'editor')
 * @param bool   $is_active  default true
 * @return int               new user_id (always positive)
 *
 * @throws \InvalidArgumentException on validation failure
 * @throws \RuntimeException on duplicate username or DB error
 */
function yourls_create_user( $username, $password, $role = 'editor', $is_active = true ) {
    yourls_validate_username( $username );
    yourls_validate_role( $role );
    yourls_validate_password_strength( $password );

    if ( yourls_get_user_by_username( $username ) !== null ) {
        throw new \RuntimeException( "Username '$username' already exists" );
    }

    $hash  = yourls_phpass_hash( $password );
    $ydb   = yourls_get_db( 'write-create_user' );
    $table = YOURLS_DB_TABLE_USERS;

    try {
        $ydb->perform(
            "INSERT INTO `$table` (`username`, `password_hash`, `role`, `is_active`, `api_key_version`) VALUES (:u, :h, :r, :a, 1)",
            [
                'u' => (string) $username,
                'h' => (string) $hash,
                'r' => (string) $role,
                'a' => $is_active ? 1 : 0,
            ]
        );
    } catch ( \Exception $e ) {
        throw new \RuntimeException( 'Failed to insert user: ' . $e->getMessage(), 0, $e );
    }

    $row = yourls_get_user_by_username( $username );
    if ( !$row ) {
        throw new \RuntimeException( 'User created but cannot be re-read' );
    }

    yourls_do_action( 'user_created', (int) $row['user_id'], $username, $role );
    return (int) $row['user_id'];
}

/**
 * Validate a username string.
 *
 * @throws \InvalidArgumentException
 */
function yourls_validate_username( $username ) {
    if ( !is_string( $username ) || !preg_match( YOURLS_USERNAME_REGEX, $username ) ) {
        throw new \InvalidArgumentException( 'Invalid username (allowed: A-Z, a-z, 0-9, _.-, 1..64 chars)' );
    }
}

/**
 * Validate a role string against the spec's enum.
 *
 * @throws \InvalidArgumentException
 */
function yourls_validate_role( $role ) {
    if ( !in_array( $role, [ 'admin', 'editor' ], true ) ) {
        throw new \InvalidArgumentException( "Invalid role '" . (string) $role . "' (allowed: admin, editor)" );
    }
}

/**
 * Validate password length against YOURLS_USER_PASSWORD_MIN_LENGTH (filterable).
 *
 * @throws \InvalidArgumentException
 */
function yourls_validate_password_strength( $password ) {
    $min = (int) yourls_apply_filter( 'user_password_min_length', YOURLS_USER_PASSWORD_MIN_LENGTH );
    if ( $min < 1 ) {
        $min = 1;
    }
    if ( !is_string( $password ) || strlen( $password ) < $min ) {
        throw new \InvalidArgumentException( "Password must be at least $min characters long" );
    }
}

/**
 * Partial update of a user.
 *
 * $fields may contain any subset of:
 *   'role'      => 'admin'|'editor'
 *   'is_active' => bool|int
 *   'password'  => plaintext (will be hashed; empty string = leave unchanged)
 *   'username'  => string (renames; new value must be unique)
 *
 * @throws \InvalidArgumentException on validation failure
 * @throws \RuntimeException when the user does not exist or DB write fails
 */
function yourls_update_user( $user_id, array $fields ) {
    $user_id = (int) $user_id;
    if ( $user_id <= 0 ) {
        throw new \InvalidArgumentException( 'Invalid user id' );
    }

    $ydb   = yourls_get_db( 'write-update_user' );
    $table = YOURLS_DB_TABLE_USERS;

    $existing = $ydb->fetchObject(
        "SELECT * FROM `$table` WHERE `user_id` = :id",
        [ 'id' => $user_id ]
    );
    if ( !$existing ) {
        throw new \RuntimeException( "User $user_id does not exist" );
    }

    $sets  = [];
    $binds = [ 'id' => $user_id ];

    if ( array_key_exists( 'role', $fields ) ) {
        yourls_validate_role( $fields['role'] );
        $sets[]        = '`role` = :role';
        $binds['role'] = $fields['role'];
    }
    if ( array_key_exists( 'is_active', $fields ) ) {
        $sets[]          = '`is_active` = :active';
        $binds['active'] = $fields['is_active'] ? 1 : 0;
    }
    if ( array_key_exists( 'password', $fields ) && $fields['password'] !== '' ) {
        yourls_validate_password_strength( $fields['password'] );
        $sets[]        = '`password_hash` = :hash';
        $binds['hash'] = yourls_phpass_hash( $fields['password'] );
    }
    if ( array_key_exists( 'username', $fields ) ) {
        yourls_validate_username( $fields['username'] );
        if ( $fields['username'] !== $existing->username
             && yourls_get_user_by_username( $fields['username'] ) !== null ) {
            throw new \RuntimeException( 'Username already in use' );
        }
        $sets[]            = '`username` = :username';
        $binds['username'] = $fields['username'];
    }

    if ( empty( $sets ) ) {
        return; // nothing to update
    }

    try {
        $ydb->perform(
            "UPDATE `$table` SET " . implode( ', ', $sets ) . " WHERE `user_id` = :id",
            $binds
        );
    } catch ( \Exception $e ) {
        throw new \RuntimeException( 'Failed to update user: ' . $e->getMessage(), 0, $e );
    }

    yourls_do_action( 'user_updated', $user_id, array_keys( $fields ) );
}

/**
 * Increment a user's api_key_version, invalidating any pre-existing API signatures
 * derived from the prior version. Silent no-op for unknown ids (no exception).
 */
function yourls_rotate_user_api_key( $user_id ) {
    $user_id = (int) $user_id;
    if ( $user_id <= 0 ) {
        return;
    }
    try {
        $ydb   = yourls_get_db( 'write-rotate_api_key' );
        $table = YOURLS_DB_TABLE_USERS;
        $ydb->perform(
            "UPDATE `$table` SET `api_key_version` = `api_key_version` + 1 WHERE `user_id` = :id",
            [ 'id' => $user_id ]
        );
        yourls_do_action( 'user_api_key_rotated', $user_id );
    } catch ( \Exception $e ) {
        yourls_debug_log( 'rotate_user_api_key failed: ' . $e->getMessage() );
    }
}

/**
 * Update last_login_at to NOW() for the given DB user. Non-fatal on error
 * (logging failure must not break the login flow).
 *
 * @param int|null $user_id  Null/0 are silently ignored (config-file users).
 */
function yourls_touch_last_login( $user_id ) {
    if ( !$user_id ) {
        return;
    }
    try {
        $ydb   = yourls_get_db( 'write-touch_last_login' );
        $table = YOURLS_DB_TABLE_USERS;
        $ydb->perform(
            "UPDATE `$table` SET `last_login_at` = current_timestamp() WHERE `user_id` = :id",
            [ 'id' => (int) $user_id ]
        );
    } catch ( \Exception $e ) {
        yourls_debug_log( 'touch_last_login failed: ' . $e->getMessage() );
    }
}

/**
 * Delete a user.
 *
 * Refuses to delete the last active admin (would lock everyone out of user management).
 *
 * @throws \RuntimeException when user does not exist or is the sole active admin
 */
function yourls_delete_user( $user_id ) {
    $user_id = (int) $user_id;
    $ydb    = yourls_get_db( 'write-delete_user' );
    $table  = YOURLS_DB_TABLE_USERS;

    $row = $ydb->fetchObject(
        "SELECT * FROM `$table` WHERE `user_id` = :id",
        [ 'id' => $user_id ]
    );
    if ( !$row ) {
        throw new \RuntimeException( "User $user_id does not exist" );
    }

    if ( $row->role === 'admin' && (int) $row->is_active === 1 ) {
        $other_active_admins = (int) $ydb->fetchValue(
            "SELECT COUNT(*) FROM `$table` WHERE `role` = 'admin' AND `is_active` = 1 AND `user_id` <> :id",
            [ 'id' => $user_id ]
        );
        if ( $other_active_admins === 0 ) {
            throw new \RuntimeException( 'Cannot delete the last active admin' );
        }
    }

    $ydb->perform(
        "DELETE FROM `$table` WHERE `user_id` = :id",
        [ 'id' => $user_id ]
    );
    yourls_do_action( 'user_deleted', $user_id, $row->username );
}

/**
 * Whether the given user is the only remaining active admin.
 *
 * Used by the UI to disable the "demote/disable" controls so we don't lock everyone out.
 * Returns false for non-admin users, inactive users, unknown users.
 */
function yourls_user_is_last_active_admin( $user_id ) {
    $user_id = (int) $user_id;
    $ydb    = yourls_get_db( 'read-last_admin_check' );
    $table  = YOURLS_DB_TABLE_USERS;

    $row = $ydb->fetchObject(
        "SELECT `role`, `is_active` FROM `$table` WHERE `user_id` = :id",
        [ 'id' => $user_id ]
    );
    if ( !$row || $row->role !== 'admin' || (int) $row->is_active !== 1 ) {
        return false;
    }

    $others = (int) $ydb->fetchValue(
        "SELECT COUNT(*) FROM `$table` WHERE `role` = 'admin' AND `is_active` = 1 AND `user_id` <> :id",
        [ 'id' => $user_id ]
    );
    return $others === 0;
}

/**
 * List users for the admin UI.
 *
 * @param int $limit
 * @param int $offset
 * @return array<int, array<string, mixed>>  Indexed array of associative rows
 */
function yourls_list_users( $limit = 100, $offset = 0 ) {
    $limit  = max( 1, (int) $limit );
    $offset = max( 0, (int) $offset );

    $ydb   = yourls_get_db( 'read-list_users' );
    $table = YOURLS_DB_TABLE_USERS;

    $rows = $ydb->fetchObjects(
        "SELECT `user_id`, `username`, `role`, `is_active`, `api_key_version`, `last_login_at`, `created_at`, `updated_at` ".
        "FROM `$table` ".
        "ORDER BY `username` ASC ".
        "LIMIT $limit OFFSET $offset"
    );

    return array_map( fn( $obj ) => (array) $obj, (array) $rows );
}
