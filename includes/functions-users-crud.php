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
