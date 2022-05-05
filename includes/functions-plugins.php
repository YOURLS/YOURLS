<?php

/**
 * The filter/plugin API is located in this file, which allows for creating filters
 * and hooking functions, and methods. The functions or methods will be run when
 * the filter is called.
 *
 * Any of the syntaxes explained in the PHP documentation for the
 * {@link https://www.php.net/manual/en/language.types.callable.php 'callback'}
 * type are valid.
 *
 * This API is heavily inspired by the one I implemented in Zenphoto 1.3, which was heavily inspired by the one used in WordPress.
 *
 * @author Ozh
 * @since 1.5
 */

/**
 * This global var will collect filters with the following structure:
 * $yourls_filters['hook']['array of priorities']['serialized function names']['array of ['array (functions, accepted_args, filter or action)]']
 *
 * Real life example :
 * print_r($yourls_filters) :
 * Array
 *  (
 *      [plugins_loaded] => Array
 *          (
 *              [10] => Array
 *                  (
 *                      [yourls_kses_init] => Array
 *                          (
 *                              [function] => yourls_kses_init
 *                              [accepted_args] => 1
 *                              [type] => action
 *                          )
 *                      [yourls_tzp_config] => Array
 *                          (
 *                              [function] => yourls_tzp_config
 *                              [accepted_args] => 1
 *                              [type] => action
 *                          )
 *                  )
 *          )
 *      [admin_menu] => Array
 *          (
 *              [10] => Array
 *                  (
 *                      [ozh_show_db] => Array
 *                          (
 *                              [function] => ozh_show_db
 *                              [accepted_args] =>
 *                              [type] => filter
 *                          )
 *                  )
 *          )
 *  )
 *
 * @var array $yourls_filters
 */
if ( !isset( $yourls_filters ) ) {
    $yourls_filters = [];
}

/**
 * This global var will collect 'done' actions with the following structure:
 * $yourls_actions['hook'] => number of time this action was done
 *
 * @var array $yourls_actions
 */
if ( !isset( $yourls_actions ) ) {
    $yourls_actions = [];
}

/**
 * Registers a filtering function
 *
 * Typical use:
 *        yourls_add_filter('some_hook', 'function_handler_for_hook');
 *
 * @link  https://docs.yourls.org/development/plugins.html
 * @param string   $hook           the name of the YOURLS element to be filtered or YOURLS action to be triggered
 * @param callable $function_name  the name of the function that is to be called.
 * @param int      $priority       optional. Used to specify the order in which the functions associated with a
 *                                 particular action are executed (default=10, lower=earlier execution, and functions
 *                                 with the same priority are executed in the order in which they were added to the
 *                                 filter)
 * @param int      $accepted_args  optional. The number of arguments the function accept (default is the number
 *                                 provided).
 * @param string   $type
 * @global array   $yourls_filters Storage for all of the filters
 * @return void
 */
function yourls_add_filter( $hook, $function_name, $priority = 10, $accepted_args = NULL, $type = 'filter' ) {
    global $yourls_filters;
    // At this point, we cannot check if the function exists, as it may well be defined later (which is OK)
    $id = yourls_filter_unique_id($function_name);

    $yourls_filters[ $hook ][ $priority ][ $id ] = [
        'function'      => $function_name,
        'accepted_args' => $accepted_args,
        'type'          => $type,
    ];
}

/**
 * Hooks a function on to a specific action.
 *
 * Actions are the hooks that YOURLS launches at specific points
 * during execution, or when specific events occur. Plugins can specify that
 * one or more of its PHP functions are executed at these points, using the
 * Action API.
 *
 * Typical use:
 *        yourls_add_action('some_hook', 'function_handler_for_hook');
 *
 * @link  https://docs.yourls.org/development/plugins.html
 * @param string   $hook           The name of the action to which the $function_to_add is hooked.
 * @param callable $function_name  The name of the function you wish to be called.
 * @param int      $priority       Optional. Used to specify the order in which the functions associated with a particular action
 *                                 are executed (default: 10). Lower numbers correspond with earlier execution, and functions
 *                                 with the same priority are executed in the order in which they were added to the action.
 * @param int      $accepted_args  Optional. The number of arguments the function accept (default 1).
 * @return void
 */
function yourls_add_action( $hook, $function_name, $priority = 10, $accepted_args = 1 ) {
	yourls_add_filter( $hook, $function_name, $priority, $accepted_args, 'action' );
}

/**
 * Build Unique ID for storage and retrieval.
 *
 * Simply using a function name is not enough, as several functions can have the same name when they are enclosed in classes.
 * Possible ways to attach a function to a hook (filter or action):
 *   - strings:
 *     yourls_add_filter('my_hook_test', 'my_callback_function');
 *     yourls_add_filter('my_hook_test', 'My_Class::my_callback_function');
 *
 *   - arrays:
 *     yourls_add_filter('my_hook_test', array('My_Class','my_callback_function'));
 *     yourls_add_filter('my_hook_test', array($class_instance, 'my_callback_function'));
 *
 *   - objects:
 *     yourls_add_filter('my_hook_test', $class_instance_with_invoke_method);
 *     yourls_add_filter('my_hook_test', $my_callback_function);
 *
 * @link https://docs.yourls.org/development/hooks.html
 * @param  string|array|object $function  The callable used in a filter or action.
 * @return string  unique ID for usage as array key
 */
function yourls_filter_unique_id($function) {
    // If given a string (function name)
    if ( is_string( $function ) ) {
        return $function;
    }

    if ( is_object( $function ) ) {
        // Closures are implemented as objects
        $function = [ $function, '' ];
    }
    else {
        $function = (array)$function;
    }

    // Object Class Calling
    if ( is_object( $function[0] ) ) {
        return spl_object_hash( $function[0] ).$function[1];
    }

    // Last case, static Calling : $function[0] is a string (Class Name) and $function[1] is a string (Method Name)
    return $function[0].'::'.$function[1];
}

/**
 * Performs a filtering operation on a value or an event.
 *
 * Typical use:
 *
 * 		1) Modify a variable if a function is attached to hook 'yourls_hook'
 *		$yourls_var = "default value";
 *		$yourls_var = yourls_apply_filter( 'yourls_hook', $yourls_var );
 *
 *		2) Trigger functions is attached to event 'yourls_event'
 *		yourls_apply_filter( 'yourls_event' );
 *      (see yourls_do_action() )
 *
 * Returns a value which may have been modified by a filter.
 *
 * @global array $yourls_filters storage for all of the filters
 * @param string $hook the name of the YOURLS element or action
 * @param mixed $value the value of the element before filtering
 * @param true|mixed $is_action true if the function is called by yourls_do_action() - otherwise may be the second parameter of an arbitrary number of parameters
 * @return mixed
 */
function yourls_apply_filter( $hook, $value = '', $is_action = false ) {
    global $yourls_filters;

    $args = func_get_args();

    // Do 'all' filters first. We check if $is_action to avoid calling `yourls_call_all_hooks()` twice
    if ( !$is_action && isset($yourls_filters['all']) ) {
        yourls_call_all_hooks('filter', $hook, $args);
    }

    // If we have no hook attached to that filter, just return unmodified $value
    if ( !isset( $yourls_filters[ $hook ] ) ) {
        return $value;
    }

    // Sort filters by priority
    ksort( $yourls_filters[ $hook ] );

    // Loops through each filter
    reset( $yourls_filters[ $hook ] );
    do {
        foreach ( (array)current( $yourls_filters[ $hook ] ) as $the_ ) {
            $_value = '';
            if ( !is_null($the_[ 'function' ]) ) {
                $args[ 1 ] = $value;
                $count = $the_[ 'accepted_args' ];
                if ( is_null( $count ) ) {
                    $_value = call_user_func_array( $the_[ 'function' ], array_slice( $args, 1 ) );
                }
                else {
                    $_value = call_user_func_array( $the_[ 'function' ], array_slice( $args, 1, (int)$count ) );
                }
            }
            if ( $the_[ 'type' ] == 'filter' ) {
                $value = $_value;
            }
        }
    } while ( next( $yourls_filters[ $hook ] ) !== false );

    // Return the value - this will be actually used only for filters, not for actions (see `yourls_do_action()`)
    return $value;
}

/**
 * Performs an action triggered by a YOURLS event.
 *
 * @param string $hook the name of the YOURLS action
 * @param mixed $arg action arguments
 * @return void
 */
function yourls_do_action( $hook, $arg = '' ) {
    global $yourls_actions, $yourls_filters;

    // Keep track of actions that are "done"
    if ( !isset( $yourls_actions ) ) {
        $yourls_actions = [];
    }
    if ( !isset( $yourls_actions[ $hook ] ) ) {
        $yourls_actions[ $hook ] = 1;
    }
    else {
        ++$yourls_actions[ $hook ];
    }

    $args = [];
    if ( is_array( $arg ) && 1 == count( $arg ) && isset( $arg[ 0 ] ) && is_object( $arg[ 0 ] ) ) { // array(&$this)
        $args[] =& $arg[ 0 ];
    }
    else {
        $args[] = $arg;
    }

    for ( $a = 2 ; $a < func_num_args() ; $a++ ) {
        $args[] = func_get_arg( $a );
    }

    // Do 'all' actions first
    if ( isset($yourls_filters['all']) ) {
        yourls_call_all_hooks('action', $hook, $args);
    }

    yourls_apply_filter( $hook, $args, true );
}

/**
 * Retrieve the number times an action is fired.
 *
 * @param string $hook Name of the action hook.
 * @return int The number of times action hook <tt>$hook</tt> is fired
 */
function yourls_did_action( $hook ) {
    global $yourls_actions;
    return empty( $yourls_actions[ $hook ] ) ? 0 : $yourls_actions[ $hook ];
}

/**
 * Execute the 'all' hook, with all of the arguments or parameters that were used for the hook
 *
 * Internal function used by yourls_do_action() and yourls_apply_filter() - not meant to be used from
 * outside these functions.
 * This is mostly a debugging function to understand the flow of events.
 * See https://docs.yourls.org/development/debugging.html to learn how to use the 'all' hook
 *
 * @link   https://docs.yourls.org/development/debugging.html
 * @since  1.8.1
 * @param  string $type Either 'action' or 'filter'
 * @param  string $hook The hook name, eg 'plugins_loaded'
 * @param  mixed  $args Variable-length argument lists that were passed to the action or filter
 * @return void
 */
function yourls_call_all_hooks($type, $hook, ...$args) {
    global $yourls_filters;

    // Loops through each filter or action hooked with the 'all' hook
    reset( $yourls_filters['all'] );
    do {
        foreach ( (array) current($yourls_filters['all']) as $the_ )
            // Call the hooked function only if it's hooked to the current type of hook (eg 'filter' or 'action')
            if ( $the_['type'] == $type && !is_null($the_['function']) ) {
                call_user_func_array( $the_['function'], array($type, $hook, $args) );
                /**
                 * Note that we don't return a value here, regardless of $type being an action (obviously) but also
                 * a filter. Indeed it would not make sense to actually "filter" and return values when we're
                 * feeding the same function every single hook in YOURLS, no matter their parameters.
                 */
            }

    } while ( next($yourls_filters['all']) !== false );

}

/**
 * Removes a function from a specified filter hook.
 *
 * This function removes a function attached to a specified filter hook. This
 * method can be used to remove default functions attached to a specific filter
 * hook and possibly replace them with a substitute.
 *
 * To remove a hook, the $function_to_remove and $priority arguments must match
 * when the hook was added.
 *
 * @global array $yourls_filters storage for all of the filters
 * @param string $hook The filter hook to which the function to be removed is hooked.
 * @param callable $function_to_remove The name of the function which should be removed.
 * @param int $priority optional. The priority of the function (default: 10).
 * @return bool Whether the function was registered as a filter before it was removed.
 */
function yourls_remove_filter( $hook, $function_to_remove, $priority = 10 ) {
    global $yourls_filters;

    $function_to_remove = yourls_filter_unique_id($function_to_remove);

    $remove = isset( $yourls_filters[ $hook ][ $priority ][ $function_to_remove ] );

    if ( $remove === true ) {
        unset ( $yourls_filters[ $hook ][ $priority ][ $function_to_remove ] );
        if ( empty( $yourls_filters[ $hook ][ $priority ] ) ) {
            unset( $yourls_filters[ $hook ] );
        }
    }
    return $remove;
}

/**
 * Removes a function from a specified action hook.
 *
 * @see yourls_remove_filter()
 * @since 1.7.1
 * @param string   $hook               The action hook to which the function to be removed is hooked.
 * @param callable $function_to_remove The name of the function which should be removed.
 * @param int      $priority           optional. The priority of the function (default: 10).
 * @return bool                        Whether the function was registered as an action before it was removed.
 */
function yourls_remove_action( $hook, $function_to_remove, $priority = 10 ) {
    return yourls_remove_filter( $hook, $function_to_remove, $priority );
}

/**
 * Removes all functions from a specified action hook.
 *
 * @see   yourls_remove_all_filters()
 * @since 1.7.1
 * @param string    $hook     The action to remove hooks from
 * @param int|false $priority optional. The priority of the functions to remove
 * @return bool true when it's finished
 */
function yourls_remove_all_actions( $hook, $priority = false ) {
    return yourls_remove_all_filters( $hook, $priority );
}

/**
 * Removes all functions from a specified filter hook.
 *
 * @since 1.7.1
 * @param string    $hook     The filter to remove hooks from
 * @param int|false $priority optional. The priority of the functions to remove
 * @return bool true when it's finished
 */
function yourls_remove_all_filters( $hook, $priority = false ) {
    global $yourls_filters;

    if ( isset( $yourls_filters[ $hook ] ) ) {
        if ( $priority === false ) {
            unset( $yourls_filters[ $hook ] );
        }
        elseif ( isset( $yourls_filters[ $hook ][ $priority ] ) ) {
            unset( $yourls_filters[ $hook ][ $priority ] );
        }
    }

    return true;
}

/**
 * Return filters for a specific hook.
 *
 * If hook has filters (or actions, see yourls_has_action()), this will return an array priorities => callbacks.
 * See the structure of yourls_filters on top of this file for details.
 *
 * @since 1.8.3
 * @param string $hook The hook to retrieve filters for
 * @return array
 */
function yourls_get_filters($hook) {
    global $yourls_filters;
    return $yourls_filters[$hook] ?? array();
}

/**
 * Return actions for a specific hook.
 *
 * @since 1.8.3
 * @param string $hook The hook to retrieve actions for
 * @return array
 */
function yourls_get_actions($hook) {
    return yourls_get_filters($hook);
}
/**
 * Check if any filter has been registered for a hook.
 *
 * @since 1.5
 * @global array         $yourls_filters    storage for all of the filters
 * @param string         $hook              The name of the filter hook.
 * @param callable|false $function_to_check optional. If specified, return the priority of that function on this hook or false if not attached.
 * @return int|bool Optionally returns the priority on that hook for the specified function.
 */
function yourls_has_filter( $hook, $function_to_check = false ) {
    global $yourls_filters;

    $has = !empty( $yourls_filters[ $hook ] );
    if ( false === $function_to_check || false === $has ) {
        return $has;
    }

    if ( !$idx = yourls_filter_unique_id($function_to_check) ) {
        return false;
    }

    foreach ( array_keys( $yourls_filters[ $hook ] ) as $priority ) {
        if ( isset( $yourls_filters[ $hook ][ $priority ][ $idx ] ) ) {
            return $priority;
        }
    }
    return false;
}


/**
 * Check if any action has been registered for a hook.
 *
 * @since 1.5
 * @param string         $hook
 * @param callable|false $function_to_check
 * @return bool|int
 */
function yourls_has_action( $hook, $function_to_check = false ) {
    return yourls_has_filter( $hook, $function_to_check );
}

/**
 * Return number of active plugins
 *
 * @return int Number of activated plugins
 */
function yourls_has_active_plugins() {
    return count( yourls_get_db()->get_plugins() );
}

/**
 * List plugins in /user/plugins
 *
 * @return array Array of [/plugindir/plugin.php]=>array('Name'=>'Ozh', 'Title'=>'Hello', )
 */
function yourls_get_plugins() {
    $plugins = (array)glob( YOURLS_PLUGINDIR.'/*/plugin.php' );

    if ( is_array( $plugins ) ) {
        foreach ( $plugins as $key => $plugin ) {
            $plugins[ yourls_plugin_basename( $plugin ) ] = yourls_get_plugin_data( $plugin );
            unset( $plugins[ $key ] );
        }
    }

    return empty( $plugins ) ? [] : $plugins;
}

/**
 * Check if a plugin is active
 *
 * @param string $plugin Physical path to plugin file
 * @return bool
 */
function yourls_is_active_plugin( $plugin ) {
    return yourls_has_active_plugins() > 0 ?
        in_array( yourls_plugin_basename( $plugin ), yourls_get_db()->get_plugins() )
        : false;
}

/**
 * Parse a plugin header
 *
 * The plugin header has the following form:
 *      /*
 *      Plugin Name: <plugin name>
 *      Plugin URI: <plugin home page>
 *      Description: <plugin description>
 *      Version: <plugin version number>
 *      Author: <author name>
 *      Author URI: <author home page>
 *      * /
 *
 * Or in the form of a phpdoc block
 *      /**
 *       * Plugin Name: <plugin name>
 *       * Plugin URI: <plugin home page>
 *       * Description: <plugin description>
 *       * Version: <plugin version number>
 *       * Author: <author name>
 *       * Author URI: <author home page>
 *       * /
 *
 * @since 1.5
 * @param string $file Physical path to plugin file
 * @return array Array of 'Field'=>'Value' from plugin comment header lines of the form "Field: Value"
 */
function yourls_get_plugin_data( $file ) {
    $fp = fopen( $file, 'r' ); // assuming $file is readable, since yourls_load_plugins() filters this
    $data = fread( $fp, 8192 ); // get first 8kb
    fclose( $fp );

    // Capture all the header within first comment block
    if ( !preg_match( '!.*?/\*(.*?)\*/!ms', $data, $matches ) ) {
        return [];
    }

    // Capture each line with "Something: some text"
    unset( $data );
    $lines = preg_split( "[\n|\r]", $matches[ 1 ] );
    unset( $matches );

    $plugin_data = [];
    foreach ( $lines as $line ) {
        if ( !preg_match( '!(\s*)?\*?(\s*)?(.*?):\s+(.*)!', $line, $matches ) ) {
            continue;
        }

        $plugin_data[ trim($matches[3]) ] = yourls_esc_html(trim($matches[4]));
    }

    return $plugin_data;
}

/**
 * Include active plugins
 *
 * This function includes every 'YOURLS_PLUGINDIR/plugin_name/plugin.php' found in option 'active_plugins'
 * It will return a diagnosis array with the following keys:
 *    (bool)'loaded' : true if plugin(s) loaded, false otherwise
 *    (string)'info' : extra information
 *
 * @since 1.5
 * @return array    Array('loaded' => bool, 'info' => string)
 */
function yourls_load_plugins() {
    // Don't load plugins when installing or updating
    if ( yourls_is_installing() OR yourls_is_upgrading() OR !yourls_is_installed() ) {
        return [
            'loaded' => false,
            'info'   => 'install/upgrade'
        ];
    }

    $active_plugins = (array)yourls_get_option( 'active_plugins' );
    if ( empty( $active_plugins ) ) {
        return [
            'loaded' => false,
            'info'   => 'no active plugin'
        ];
    }

    $plugins = [];
    foreach ( $active_plugins as $key => $plugin ) {
        $file = YOURLS_PLUGINDIR . '/' . $plugin;
        if ( yourls_is_a_plugin_file($file) && yourls_activate_plugin_sandbox( $file ) === true ) {
            $plugins[] = $plugin;
            unset( $active_plugins[ $key ] );
        }
    }

    // Replace active plugin list with list of plugins we just activated
    yourls_get_db()->set_plugins( $plugins );
    $info = count( $plugins ).' activated';

    // $active_plugins should be empty now, if not, a plugin could not be found, or is erroneous : remove it
    $missing_count = count( $active_plugins );
    if ( $missing_count > 0 ) {
        yourls_update_option( 'active_plugins', $plugins );
        $message = yourls_n( 'Could not find and deactivate plugin :', 'Could not find and deactivate plugins :', $missing_count );
        $missing = '<strong>'.implode( '</strong>, <strong>', $active_plugins ).'</strong>';
        yourls_add_notice( $message.' '.$missing );
        $info .= ', '.$missing_count.' removed';
    }

    return [
        'loaded' => true,
        'info'   => $info
    ];
}

/**
 * Check if a file is a plugin file
 *
 * This doesn't check if the file is a valid PHP file, only that it's correctly named.
 *
 * @since 1.5
 * @param string $file Full pathname to a file
 * @return bool
 */
function yourls_is_a_plugin_file($file) {
    return false === strpos( $file, '..' )
           && false === strpos( $file, './' )
           && 'plugin.php' === substr( $file, -10 )
           && is_readable( $file );
}

/**
 * Activate a plugin
 *
 * @since 1.5
 * @param string $plugin Plugin filename (full or relative to plugins directory)
 * @return string|true  string if error or true if success
 */
function yourls_activate_plugin( $plugin ) {
    // validate file
    $plugin = yourls_plugin_basename( $plugin );
    $plugindir = yourls_sanitize_filename( YOURLS_PLUGINDIR );
    if ( !yourls_is_a_plugin_file($plugindir . '/' . $plugin ) ) {
        return yourls__( 'Not a valid plugin file' );
    }

    // check not activated already
    $ydb = yourls_get_db();
    if ( yourls_is_active_plugin( $plugin ) ) {
        return yourls__( 'Plugin already activated' );
    }

    // attempt activation.
    $attempt = yourls_activate_plugin_sandbox( $plugindir.'/'.$plugin );
    if( $attempt !== true ) {
        return yourls_s( 'Plugin generated unexpected output. Error was: <br/><pre>%s</pre>', $attempt );
    }

    // so far, so good: update active plugin list
    $ydb->add_plugin( $plugin );
    yourls_update_option( 'active_plugins', $ydb->get_plugins() );
    yourls_do_action( 'activated_plugin', $plugin );
    yourls_do_action( 'activated_'.$plugin );

    return true;
}

/**
 * Plugin activation sandbox
 *
 * @since 1.8.3
 * @param string $pluginfile Plugin filename (full path)
 * @return string|true  string if error or true if success
 */
function yourls_activate_plugin_sandbox( $pluginfile ) {
    try {
        include_once $pluginfile;
        return true;
    } catch ( \Throwable $e ) {
        return $e->getMessage();
    }
}

/**
 * Deactivate a plugin
 *
 * @since 1.5
 * @param string $plugin Plugin filename (full relative to plugins directory)
 * @return string|true  string if error or true if success
 */
function yourls_deactivate_plugin( $plugin ) {
    $plugin = yourls_plugin_basename( $plugin );

    // Check plugin is active
    if ( !yourls_is_active_plugin( $plugin ) ) {
        return yourls__( 'Plugin not active' );
    }

    // Check if we have an uninstall file - load if so
    $uninst_file = YOURLS_PLUGINDIR . '/' . dirname($plugin) . '/uninstall.php';
    if ( file_exists($uninst_file) ) {
        define('YOURLS_UNINSTALL_PLUGIN', true);
        $attempt = yourls_activate_plugin_sandbox( $uninst_file );
        if( $attempt !== true ) {
            return yourls_s( 'Plugin generated unexpected output. Error was: <br/><pre>%s</pre>', $attempt );
        }
    }

    // Deactivate the plugin
    $ydb = yourls_get_db();
    $plugins = $ydb->get_plugins();
    $key = array_search( $plugin, $plugins );
    if ( $key !== false ) {
        array_splice( $plugins, $key, 1 );
    }

    $ydb->set_plugins( $plugins );
    yourls_update_option( 'active_plugins', $plugins );
    yourls_do_action( 'deactivated_plugin', $plugin );
    yourls_do_action( 'deactivated_'.$plugin );

    return true;
}

/**
 * Return the path of a plugin file, relative to the plugins directory
 *
 * @since 1.5
 * @param string $file
 * @return string
 */
function yourls_plugin_basename( $file ) {
	return trim( str_replace( yourls_sanitize_filename( YOURLS_PLUGINDIR ), '', yourls_sanitize_filename( $file ) ), '/' );
}

/**
 * Return the URL of the directory a plugin
 *
 * @since 1.5
 * @param string $file
 * @return string
 */
function yourls_plugin_url( $file ) {
    $url = YOURLS_PLUGINURL.'/'.yourls_plugin_basename( $file );
    if ( yourls_is_ssl() or yourls_needs_ssl() ) {
        $url = str_replace( 'http://', 'https://', $url );
    }
    return (string)yourls_apply_filter( 'plugin_url', $url, $file );
}

/**
 * Build list of links to plugin admin pages, if any
 *
 * @since 1.5
 * @return array  Array of arrays of URL and anchor of plugin admin pages, or empty array if no plugin page
 */
function yourls_list_plugin_admin_pages() {
    $plugin_links = [];
    foreach ( yourls_get_db()->get_plugin_pages() as $plugin => $page ) {
        $plugin_links[ $plugin ] = [
            'url'    => yourls_admin_url( 'plugins.php?page='.$page[ 'slug' ] ),
            'anchor' => $page[ 'title' ],
        ];
    }
    return $plugin_links;
}

/**
 * Register a plugin administration page
 *
 * @since 1.5
 * @param string   $slug
 * @param string   $title
 * @param callable $function
 * @return void
 */
function yourls_register_plugin_page( $slug, $title, $function ) {
    yourls_get_db()->add_plugin_page( $slug, $title, $function );
}

/**
 * Handle plugin administration page
 *
 * @since 1.5
 * @param string $plugin_page
 * @return void
 */
function yourls_plugin_admin_page( $plugin_page ) {
    // Check the plugin page is actually registered
    $pages = yourls_get_db()->get_plugin_pages();
    if ( !isset( $pages[ $plugin_page ] ) ) {
        yourls_die( yourls__( 'This page does not exist. Maybe a plugin you thought was activated is inactive?' ), yourls__( 'Invalid link' ) );
    }

    // Check the plugin page function is actually callable
    $page_function = $pages[ $plugin_page ][ 'function' ];
    if (!is_callable($page_function)) {
        yourls_die( yourls__( 'This page cannot be displayed because the displaying function is not callable.' ), yourls__( 'Invalid code' ) );
    }

    // Draw the page itself
    yourls_do_action( 'load-'.$plugin_page );
    yourls_html_head( 'plugin_page_'.$plugin_page, $pages[ $plugin_page ][ 'title' ] );
    yourls_html_logo();
    yourls_html_menu();

    $page_function( );

    yourls_html_footer();
}

/**
 * Callback function: Sort plugins
 *
 * @link http://php.net/uasort
 * @codeCoverageIgnore
 *
 * @since 1.5
 * @param array $plugin_a
 * @param array $plugin_b
 * @return int 0, 1 or -1, see uasort()
 */
function yourls_plugins_sort_callback( $plugin_a, $plugin_b ) {
    $orderby = yourls_apply_filter( 'plugins_sort_callback', 'Plugin Name' );
    $order = yourls_apply_filter( 'plugins_sort_callback', 'ASC' );

    $a = isset( $plugin_a[ $orderby ] ) ? $plugin_a[ $orderby ] : '';
    $b = isset( $plugin_b[ $orderby ] ) ? $plugin_b[ $orderby ] : '';

    if ( $a == $b ) {
        return 0;
    }

    if ( 'DESC' == $order ) {
        return ( $a < $b ) ? 1 : -1;
    }
    else {
        return ( $a < $b ) ? -1 : 1;
    }
}

/**
 * Shutdown function, runs just before PHP shuts down execution. Stolen from WP
 *
 * This function is automatically tied to the script execution end at startup time, see
 * var $actions->register_shutdown in includes/Config/Init.php
 *
 * You can use this function to fire one or several actions when the PHP execution ends.
 * Example of use:
 *   yourls_add_action('shutdown', 'my_plugin_action_this');
 *   yourls_add_action('shutdown', 'my_plugin_action_that');
 *   // functions my_plugin_action_this() and my_plugin_action_that() will be triggered
 *   // after YOURLS is completely executed
 *
 * @codeCoverageIgnore
 * @since 1.5.1
 * @return void
 */
function yourls_shutdown() {
    yourls_do_action( 'shutdown' );
}

/**
 * Returns true.
 *
 * Useful for returning true to filters easily.
 *
 * @since 1.7.1
 * @return bool True.
 */
function yourls_return_true() {
    return true;
}

/**
 * Returns false.
 *
 * Useful for returning false to filters easily.
 *
 * @since 1.7.1
 * @return bool False.
 */
function yourls_return_false() {
    return false;
}

/**
 * Returns 0.
 *
 * Useful for returning 0 to filters easily.
 *
 * @since 1.7.1
 * @return int 0.
 */
function yourls_return_zero() {
    return 0;
}

/**
 * Returns an empty array.
 *
 * Useful for returning an empty array to filters easily.
 *
 * @since 1.7.1
 * @return array Empty array.
 */
function yourls_return_empty_array() {
    return [];
}

/**
 * Returns null.
 *
 * Useful for returning null to filters easily.
 *
 * @since 1.7.1
 * @return null Null value.
 */
function yourls_return_null() {
    return null;
}

/**
 * Returns an empty string.
 *
 * Useful for returning an empty string to filters easily.
 *
 * @since 1.7.1
 * @return string Empty string.
 */
function yourls_return_empty_string() {
    return '';
}
