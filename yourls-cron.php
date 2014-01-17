<?php
define( 'YOURLS_CRON', true );

/**
 * There are two possible entry points to this script.
 * 1. The PHP command-line, as run by a system cron job.
 * 2. Called asynchronously over HTTP via fsockopen() in yourls_cron().
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

if ( defined('YOURLS_AJAX') || defined('YOURLS_CRON') ) {
	die();
}

if( isset( $_GET['yourls_cron_check'] ) )
    die();

if( !defined( 'YOURLS_ABSPATH' ) ) {
    require_once( dirname( __FILE__ ) . '/includes/load-yourls.php' );
}

// If cron is disabled per user choice, exit 
if( defined( 'YOURLS_DISABLE_CRON' ) && YOURLS_DISABLE_CRON ) {
    die();
}
    
// If no cron job is defined, exit 
if( false === $crons = yourls_get_option( 'cron' ) ) {
    die();
}

// Check elapsed time since last cronjob so we don't execute too often
if ( !yourls_shouldwe_cron() ) {
    die();
}

/**
 * TODO HERE: lock mechanism to make sure concurrent calls never fire twice the same job
 **/


/**
 * TODO HERE: execute each job that has to be run
 **/


die();
 
