<?php
/*
 * Functions relative to debugging
 */

/**
 * Add a message to the debug log
 *
 * When in debug mode ( YOURLS_DEBUG == true ) the debug log is echoed in yourls_html_footer()
 * Log messages are appended to $ydb->debug_log array, which is instanciated within class ezSQLcore_YOURLS
 *
 * @since 1.7
 * @param string $msg Message to add to the debug log
 * @return string The message itself
 */
function yourls_debug_log( $msg ) {
    yourls_do_action( 'debug_log', $msg );
    yourls_get_db()->getProfiler()->log( $msg );
    return $msg;
}

/**
 * Get the debug log
 *
 * @since  1.7.3
 * @return array
 */
function yourls_get_debug_log() {
    $profiler = yourls_get_db()->getProfiler();
    return $profiler instanceof \Aura\Sql\ProfilerInterface ? $profiler->get_log() : [];
}

/**
 * Debug mode set
 *
 * @since 1.7.3
 * @param bool $bool Debug on or off
 */
function yourls_debug_mode( $bool ) {
    // log queries if true
    yourls_get_db()->getProfiler()->setActive( (bool)$bool );

    // report notices if true
    $level = $bool ? -1 : ( E_ERROR | E_PARSE );
    error_reporting( $level );
}

/**
 * Return YOURLS debug mode
 *
 * @since 1.7.7
 * @return bool
 */
function yourls_get_debug_mode() {
    return defined( 'YOURLS_DEBUG' ) && YOURLS_DEBUG;
}
