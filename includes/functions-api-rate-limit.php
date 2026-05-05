<?php
/**
 * Sliding-window per-user API rate limit.
 *
 * Editors are throttled; admins and config-file users (no user_id) are exempt
 * by design (see spec §5.2). Configurable via:
 *   YOURLS_API_RATE_LIMIT_PER_WINDOW (default 60; 0 disables)
 *   YOURLS_API_RATE_LIMIT_WINDOW     (default 60 seconds)
 *
 * Both can be overridden by the filters 'user_api_rate_limit_per_window' and
 * 'user_api_rate_limit_window' respectively.
 */

/**
 * Record an API call and decide whether to allow it.
 *
 * @param int|null $user_id    DB user id, or null for config-file / anonymous (exempt).
 * @param string   $action     API action name (logged for auditability).
 * @param bool     $test_mode  When true, returns false on throttle instead of yourls_die().
 *                             Production callers leave it false (HTTP 429 + die).
 * @return bool  true on accepted call; false on throttle (test mode); never returns on throttle (production).
 */
function yourls_check_user_api_rate( $user_id, $action, $test_mode = false ) {
    $per_window = (int) yourls_apply_filter( 'user_api_rate_limit_per_window', YOURLS_API_RATE_LIMIT_PER_WINDOW );
    $window     = (int) yourls_apply_filter( 'user_api_rate_limit_window', YOURLS_API_RATE_LIMIT_WINDOW );

    // Disabled
    if ( $per_window <= 0 || $window <= 0 ) {
        return true;
    }

    // Anonymous / config-file users: exempt
    if ( $user_id === null ) {
        return true;
    }

    // Resolve role; admins are exempt
    try {
        $ydb  = yourls_get_db( 'read-rate_limit_role' );
        $role = $ydb->fetchValue(
            "SELECT `role` FROM `".YOURLS_DB_TABLE_USERS."` WHERE `user_id` = :id LIMIT 1",
            [ 'id' => (int) $user_id ]
        );
    } catch ( \Exception $e ) {
        // If the lookup fails (e.g. migration not yet run), fail-open: don't throttle.
        return true;
    }
    if ( $role === 'admin' ) {
        return true;
    }

    $table = YOURLS_DB_TABLE_API_RATE;
    $ydb   = yourls_get_db( 'write-rate_limit' );

    // Prune rows older than 2× window for this user (cheap O(window) bound on table size).
    $ydb->perform(
        "DELETE FROM `$table` WHERE `user_id` = :id AND `called_at` < (CURRENT_TIMESTAMP - INTERVAL :twice SECOND)",
        [ 'id' => (int) $user_id, 'twice' => 2 * $window ]
    );

    $count = (int) $ydb->fetchValue(
        "SELECT COUNT(*) FROM `$table` WHERE `user_id` = :id AND `called_at` >= (CURRENT_TIMESTAMP - INTERVAL :w SECOND)",
        [ 'id' => (int) $user_id, 'w' => $window ]
    );

    if ( $count >= $per_window ) {
        if ( $test_mode ) {
            return false;
        }
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
