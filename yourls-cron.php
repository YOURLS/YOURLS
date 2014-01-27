<?php
/**
 * YOURLS emulation of a cron system
 *
 * This file is supposed to be executed via one of the following call
 * 1. Direct call via Unix cronjob (either using the PHP CLI or a simple `wget http://sho.rt/yourls-cron.php`
 * 2. Asynchronous HTTP request performed when someone interacts with YOURLS (ie loads an admin page, or follows a short URL)
 *    When requested asynchronously, this file will not slow down the YOURLS user, even if this triggers the execution
 *    of a scheduled job
 */
 
// Allow the script to keep running, even if the client disconnects. This is key to making async HTTP requests
ignore_user_abort(true);

if ( defined('YOURLS_AJAX') || defined('YOURLS_CRON') ) {
    die();
}

if( isset( $_GET['yourls_cron_check'] ) ) {
    die();
}

// Load YOURLS
define( 'YOURLS_CRON', true );
if( !defined( 'YOURLS_ABSPATH' ) ) {
    require_once( dirname( __FILE__ ) . '/includes/load-yourls.php' );
}

// If cron is disabled per user choice, exit 
if( defined( 'YOURLS_DISABLE_CRON' ) && YOURLS_DISABLE_CRON ) {
    die();
}

// If no cron job is defined, exit 
if( false === $crons = yourls_get_cron_array() ) {
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
 
