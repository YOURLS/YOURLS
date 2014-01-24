<?php
/**
 * YOURLS
 * Cron emulation library, heavily inspired by WordPress' feature
 *
 * TODO: document the whole process here, query params that matter, constants used or defined and options stored
 * 
 * How this works
 * ==============
 * 
 * It's black magic. TODO: explain.
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
    if( false === $crons = yourls_get_cron_array() ) {
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
function yourls_cron_min_interval() {
    return (int) yourls_apply_filter( 'cron_min_interval', YOURLS_MINUTE * 5 );
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

/**
 * Return the array of timestamped scheduled jobs, or false if no job defined
 *
 * This function is not supposed to be used otherwise than internally by the Cron API. Plugins, use
 * the yourls_schedule* functions
 *
 * @since 1.8
 * @return mixed array of scheduled jobs, false if no job
 */
function yourls_get_cron_array() {
    $cron = yourls_get_option( 'cron' );
    if ( !is_array( $cron ) or !$cron )
        return false;
    return $cron;   
}

/**
 * Set the array of timestamped scheduled jobs
 *
 * This function is not supposed to be used otherwise than internally by the Cron API. Plugins, use
 * the yourls_schedule* functions
 *
 * @since 1.8
 * @param array $cron array of timestamped scheduled jobs
 */
function yourls_set_cron_array( $cron ) {
    yourls_update_option( 'cron', $cron );
}

/**
 * Retrieve supported and filtered Cron recurrences.
 *
 * The 'interval' is a number in seconds of when the cron job should run, the 'description' is its description.
 *
 * Plugins can define custom schedules by hooking into 'get_cron_schedules' and returning an array with a
 * custom interval and description, like in the following:
 *
 * yourls_add_filter( 'get_cron_schedules', 'my_custom_schedules' );
 * function my_custom_schedules() {
 *      return array(
 *          'every3days' => array( 'interval' => 3 * YOURLS_DAY, 'description' => 'Every three days' ),
 *      );
 * }
 *
 * @since 1.8
 *
 * @return array
 */
function yourls_get_cron_schedules() {
    $schedules = array(
        'hourly'     => array( 'interval' => YOURLS_HOUR,      'description' => yourls__( 'Once hourly' ) ),
        'daily'      => array( 'interval' => YOURLS_DAY,       'description' => yourls__( 'Once daily' ) ),
        'twicedaily' => array( 'interval' => 12 * YOURLS_HOUR, 'description' => yourls__( 'Twice daily' ) ),
        'weekly'     => array( 'interval' => YOURLS_WEEK,      'description' => yourls__( 'Once weekly' ) ),
    );
    
    // Give plugins the possibility to add more, but not to override default schedules
    return array_merge( yourls_apply_filters( 'get_cron_schedules', array() ), $schedules );
}

/**
 * Return shortest valid cron recurrence, in seconds
 *
 * @since 1.8
 * @return int shortest cron recurrence
 */
function yourls_get_shortest_cron_schedule() {
    $min = YOURLS_HOUR; // this one is the shortest defined by YOURLS -- maybe a plugin set a shorter recurrence
    foreach( yourls_get_cron_schedules() as $interval => $array ) {
        $min = min( $min, $array['interval'] );
    }
    return $min;
}
 
/**
 * Return the next timestamp for a scheduled event.
 *
 * @since 1.8
 * @param string $hook action hook to execute when cron is run.
 * @param array $args optional arguments to pass to the hook's callback function.
 * @return bool|int timestamp of the next time the scheduled event will occur, false if no schedule found
 */
function yourls_get_next_scheduled( $hook, $args = array() ) {
    $crons = yourls_get_cron_array();
    if ( !$crons  )
        return false;

    $key = md5( serialize( $args ) );
    foreach ( $crons as $timestamp => $cron ) {
        if ( isset( $cron[ $hook ][ $key ] ) )
            return $timestamp;
    }
    return false;
}

/**
 * Schedule a periodic event.
 * 
 * The event must use a valid recurrence (see yourls_get_cron_schedules() ) and will be associated to a hook.
 * The even will occur when someone interacts with YOURLS (loads an admin page, or follows a shortened URL) if the
 * scheduled time has passed
 *
 * Example of use :
 *
 * // define a custom hook and its associated custom function
 * yourls_add_action( 'my_custom_hook', 'my_custom_function' );
 * function my_custom_function() { // do something }
 *
 * // schedule this custom function to run in one hour and then once a day at the same hour
 * yourls_schedule_event( YOURLS_HOUR + time(), 'daily', 'my_custom_hook' );
 *
 * @since 1.8
 * @param int $timestamp timestamp for when to run the event.
 * @param string $recurrence how often the event should recur -- see yourls_get_cron_schedules()
 * @param string $hook action hook to execute when cron is run.
 * @param array $args optional arguments to pass to the hook's callback function.
 * @return bool false on failure, true if event scheduled
 */
function yourls_schedule_event( $timestamp, $recurrence, $hook, $args = array() ) {
    $crons = yourls_get_cron_array();
    $schedules = yourls_get_cron_schedules();

    // the recurrence must exist, or be false (case for an event scheduled once, see yourls_schedule_event_once() )
    if ( $recurrence !== false && !isset( $schedules[$recurrence] ) )
        return false;
    
    $event = (object) array(
        'hook'      => $hook,
        'timestamp' => $timestamp,
        'schedule'  => $recurrence,
        'args'      => $args,
        'interval'  => $recurrence !== false ? $schedules[$recurrence]['interval'] : false,
    );
    $event = yourls_apply_filters( 'schedule_event', $event );

    // A plugin disallowed this event !
    if ( ! $event )
        return false;

    $key = md5( serialize( $event->args ) );

    $crons[ $event->timestamp ][ $event->hook ][ $key ] = array(
        'schedule' => $event->schedule,
        'args' => $event->args,
        'interval' => $event->interval
    );
    uksort( $crons, "strnatcasecmp" );
    yourls_set_cron_array( $crons );
    
    return true;
}

/**
 * Schedule an event to run once
 *
 * @since 1.8
 * @param int $timestamp timestamp for when to run the event.
 * @param string $hook action hook to execute when cron is run.
 * @param array $args optional arguments to pass to the hook's callback function.
 * @return bool false on failure, true if event scheduled

 */
function yourls_schedule_event_once( $timestamp, $hook, $args = array() ) {
    // don't schedule a duplicate event if there's already an identical event due within the next 10 mn
    // TODO : not sure about that limit of 10 mn. Think.
    $next = yourls_get_next_scheduled( $hook, $args );
    if ( $next && $next <= $timestamp + 10 * YOURLS_MINUTE )
        return false;
    
    return yourls_schedule_event( $timestamp, false, $hook, $args );
}

/**
 * Unschedule an event
 *
 * The optional arguments $args are not passed to any callback, they are just used to uniquely identify
 * the scheduled event
 *
 * @since 1.8
 * @param int $timestamp timestamp for when to run the event.
 * @param string $hook action hook to execute when cron is run.
 * @param array $args optional arguments to pass to the hook's callback function.
 * @return bool true if event unscheduled, false if event not found
 */
function yourls_unschedule_event( $timestamp, $hook, $args = array() ) {
    $crons = yourls_get_cron_array();
    $key = md5( serialize( $args ) );
    
    if( isset( $crons[ $timestamp ][ $hook ][ $key ] ) ) {
        unset( $crons[ $timestamp ][ $hook ][ $key ] );
    } else {
        return false;
    }
    
    if ( empty( $crons[ $timestamp ][ $hook ]) )
        unset( $crons[ $timestamp ][ $hook ] );
    
    if ( empty( $crons[ $timestamp ] ) )
        unset( $crons[ $timestamp ] );
    
    yourls_set_cron_array( $crons );
    return true;
}

