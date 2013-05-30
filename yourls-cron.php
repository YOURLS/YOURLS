<?php
define( 'YOURLS_CURRENT_PAGE', 'cron' );
define( 'YOURLS_IN_CRON', true );

/**
 * There are two possible entry points to this script.
 * 1. The PHP command-line, as run by a system cron job.
 * 2. Called asynchronously over HTTP via fsockopen() in yourls_maybe_cron().
 *
 * This script will update the timestamp of the last cron job, then
 * fire off an action called "cron" with the YOURLS plugin API.
 *
 * TODO: Maybe change the max execution time for this script?
 */
 
/**
 * Allow the script to keep running, even if the client disconnects.
 * This is key to making async HTTP calls work correctly.
 */
ignore_user_abort(true);

require_once( dirname( __FILE__ ) . '/includes/load-yourls.php' );

// Check elapsed time since last cronjob so we don't execute too often
if ( yourls_shouldwe_cron() ) {
	/**
	 * Immediate update the last_cron timestamp. Why here?
	 *
	 * 1. If we updated the timestamp AFTER firing the action, that could allow
	 *    multiple cron tasks to spawn in quick succession and run in parallel.
	 * 2. It needs to be here so that system cron jobs also update the timestamp.
	 */
	yourls_update_option( 'yourls_last_cron', time() );
	yourls_do_action( 'cron' );
}
