<?php
define( 'YOURLS_CURRENT_PAGE', 'cron' );
define( 'YOURLS_IN_CRON', true );

// This script, when run, will trigger any pending cron tasks.
// Generally executed in 1 of 2 days:
// - from the OS via crontab or scheduled task
// - from yourls_maybe_cron() via fsockopen()

// keep running even after a disconnect
ignore_user_abort(true);
// maybe change the max execution time for this script?

// Load YOURLS
require_once( dirname( __FILE__ ) . '/includes/load-yourls.php' );

function yourls_do_cron() {
	// Verify that now actually is a good time to run cron
	if ( yourls_shouldwe_cron() ) {
        // finally, record that we handled the cron request
		// it needs to be here, not in the autocron handler
		// because calling from CLI should still reset timer
		// we need to record that the cron has been handled right away
		// otherwise, cron might be called dozens of times on a busy site
		// while waiting for the first one to finish
        yourls_update_option( 'yourls_last_cron', time() );

        yourls_do_action( 'cron' );
	}
}

yourls_do_cron();