<?php
/*
 * YOURLS
 * Cron emulation library
 */

/**
 * This function uses fsockopen() to run yourls-cron.php which is where the
 * body of all desired cron jobs are run. This happens asynchronously so that
 * URL redirection occurs without any delay for the user.
 *
 * The HTTP call is only executed once enough time has elapsed since the last
 * cron job was run.
 *
 * TODO: Use a real HTTP library, like WordPress.
 */
function yourls_maybe_cron() {
	/**
	 * This function is called every time YOURLS is loaded, and autocron
	 * needs to load YOURLS so it can use the plugin architecture.
	 *
	 * If we got here from autocron, abort immediately.
	 */
	if ( defined( 'YOURLS_IN_CRON' ) ) {
		return;
	}
	
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
 * Returns true if elapsed time since last cron job is longer than
 * threshold for running cron jobs.
 */
function yourls_shouldwe_cron() {
	$lastCronTime      = intval( yourls_get_option( 'yourls_last_cron' ));
	$timeSinceLastCron = time() - $lastCronTime;
	$shouldCron        = ( $timeSinceLastCron > yourls_cron_interval() );
	
	return $shouldCron;
}

/**
 * Define the minimum number of seconds between cron jobs.
 * TODO: Make this a configurable user option
 */
function yourls_cron_interval() {
	return 60;
}

