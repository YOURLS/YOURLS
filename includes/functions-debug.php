<?php
/*
 * Functions relative to debugging
 *
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
    global $ydb;
    yourls_do_action('debug_log', $msg);
    $ydb->getProfiler()->log($msg);
    return $msg;
}

/**
 * Get the debug log
 *
 * @since  1.7.3
 * @return array
 */
function yourls_get_debug_log() {
    global $ydb;

    // Check if we have a profiler registered (will not be the case if the DB hasn't been properly connected to)
    if ($ydb->getProfiler()) {
        return $ydb->getProfiler()->get_log();
    }

    return array();
}

/**
 * Debug mode set
 *
 * @since 1.7.3
 * @param bool $bool  Debug on or off
 */
function yourls_debug_mode($bool) {
    global $ydb;
    $bool = (bool)$bool;

    // log queries if true
    $ydb->getProfiler()->setActive($bool);

    // report notices if true
    if ($bool === true) {
        error_reporting(-1);
    } else {
        error_reporting(E_ERROR | E_PARSE);
    }
}

/**
 * Return YOURLS debug mode
 *
 * @since 1.7.7
 * @return bool
 */
function yourls_get_debug_mode() {
    return ( defined( 'YOURLS_DEBUG' ) && YOURLS_DEBUG == true );
}
