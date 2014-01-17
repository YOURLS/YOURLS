<?php
/**
 * YOURLS
 * Cron emulation library
 *
 * TODO: document the whole process here, query params that matter, constants used or defined and options stored
 * 
 * How this works
 * ==============
 * 
 * It's black magic.
 * 
 * 
 * Options
 * =======
 * - cron : defined cronjobs. Structure TBD.
 *    WP structure, for reference:
 *      $crons[$event->timestamp][$event->hook][$key] = array(
 *        'schedule' => $event->schedule,
 *        'args' => $event->args,
 *        'interval' => $event->interval
 *      );
 * 
 * - yourls_last_cron : timestamp of last cronjob check
 * 
 * - yourls_can_cron : bool, whether the system can emulate cronjobs or not
 * 
 * 
 * Constants
 * =========
 * 
 * YOURLS_DISABLE_CRON : if set to true, disable the whole system
 * 
 * YOURLS_CRON : set to true when yourls-cron.php is loaded
 * 
 *   
 * Query params on yourls-cron.php
 * ===============================
 * 
 * - GET, yourls_cron_check=1 : aborts immediately output. Used for tests.
 * 
 *
 */
 
 
/**
 * Run scheduled jobs if applicable
 *
 * This function uses the HTTP requests lib to load yourls-cron.php which is where the
 * body of all desired cron jobs are run. This happens asynchronously so that events occurs
 * without any delay for the user.
 *
 * The HTTP call is only executed once enough time has elapsed since the last
 * cron job was run.
 *
 * @since 1.8
 * @return null when no cronjob to run
 */
function yourls_cron() {
    // If we got here from real crontab, abort immediately.
	if ( defined( 'YOURLS_CRON' ) ) {
		return;
	}
    
    // If cron is disabled per user choice, exit 
    if( defined( 'YOURLS_DISABLE_CRON' ) && YOURLS_DISABLE_CRON ) {
        return;
	}
    
    // If no cron job is defined, exit 
    if( false === $crons = yourls_get_option( 'cron' ) ) {
        return;
    }
    
    // TODO: completely revamp this.
	if ( yourls_shouldwe_cron() ) {
		$errno   = 0;
		$errstr  = '';
		$timeout = 0.01;
		
		$url       = YOURLS_SITE . '/yourls-cron.php';
		$url_parts = parse_url( $url );
		if ( !isset( $url_parts['port'] ) ) {
			$url_parts['port'] = ( $url_parts['scheme']==='https' ? 443 : 80 );
		}
		$conn_path = $url_parts['path'];
		$conn_port = $url_parts['port'];
		$real_host = $url_parts['host'];
		
		if ( preg_match( '/^[\d\.]*$/', $real_host ) ) {
			// If ServerName is an IP address, that's fine.
			$conn_host = $real_host;
		} else {
			// Confirm that the hostname is resolvable
			$resolved = gethostbyname( $real_host );
			if ( $resolved === $real_host ) {
				error_log( "DNS resolution failed for host $real_host" );
				return;
			} else {
				$conn_host = $resolved;
			}
		}
		
		$request   = "GET $conn_path HTTP/1.1\r\n";
		$headers   = array();
		$headers[] = 'User-Agent: YOURLS/' . YOURLS_VERSION;
		$headers[] = 'Host: ' . $real_host; // TODO: Is this safe?
		$request  .= implode("\r\n", $headers);
		$request  .= "\r\n\r\n";
		
		$fp = fsockopen( $conn_host, $conn_port, $errno, $errstr, $timeout );
		if ( false === $fp ) {
			error_log( $errstr );
			die( "fsockopen() returned an error with host=$conn_host" );
		}
		
		fwrite( $fp, $request );
		fclose( $fp );
	}
}

/**
 * Returns true if elapsed time since last cron job is longer than threshold for running cron jobs.
 *
 * @since 1.8
 * @return bool true if time for cron, false otherwise
 */
function yourls_shouldwe_cron() {
	$last_cron_time       = intval( yourls_get_option( 'yourls_last_cron' ));
	$time_since_last_cron = time() - $last_cron_time;
	return ( $time_since_last_cron > yourls_cron_min_interval() );
}

/**
 * Define the minimum number of seconds between 2 cron jobs.
 *
 * @since 1.8
 * @return int number of seconds
 */
/**
 * Define the minimum number of seconds between cron jobs.
 * TODO: Make this a configurable user option
 */
function yourls_cron_min_interval() {
	return (int) yourls_apply_filter( 'cron_min_interval', 60 );
}

/**
 * Cron feature check
 *
 * The whole cron system implies that YOURLS can send HTTP requests to itself. If for some reason it cannot 
 * (DNS problem or host configuration), we need to know.
 *
 * This function performs a HTTP request on /yourls-cron.php with a query parameter that will terminate it
 * before YOURLS is booted, to keep things fast and save server resources (should take about 0.02s).
 * The result of that query status (either success or failure) is saved into options.
 *
 * @since 1.8
 * @return bool true if cron emulation can work on the system, false otherwise
 */
function yourls_can_cron() {
    $can = yourls_get_option( 'yourls_can_cron', null );

    if( $can !== null ) {
        return (bool)$can;
    }
    
    $request = yourls_http_get( yourls_site_url( false, YOURLS_SITE . '/yourls-cron.php?yourls_cron_check=1' ) );
    yourls_update_option( 'yourls_can_cron', $request->success );
    return $request->success;
}