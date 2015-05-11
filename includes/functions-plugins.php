<?php

/**
 * The filter/plugin API is located in this file, which allows for creating filters
 * and hooking functions, and methods. The functions or methods will be run when
 * the filter is called.
 *
 * Any of the syntaxes explained in the PHP documentation for the
 * {@link http://us2.php.net/manual/en/language.pseudo-types.php#language.types.callback 'callback'}
 * type are valid.
 *
 * This API is heavily inspired by the one I implemented in Zenphoto 1.3, which was heavily inspired by the one used in WordPress.
 *
 * @author Ozh
 * @since 1.5
 */

if( !isset( $yourls_filters ) )
    $yourls_filters = array();
/* This global var will collect filters with the following structure:
 * $yourls_filters['hook']['array of priorities']['serialized function names']['array of ['array (functions, accepted_args, filter or action)]']
 */

if( !isset( $yourls_actions ) )
    $yourls_actions = array();
/* This global var will collect 'done' actions with the following structure:
 * $yourls_actions['hook'] => number of time this action was done
 */

/**
 * Registers a filtering function
 * 
 * Typical use:
 *		yourls_add_filter('some_hook', 'function_handler_for_hook');
 *
 * @global array $yourls_filters Storage for all of the filters
 * @param string $hook the name of the YOURLS element to be filtered or YOURLS action to be triggered
 * @param callback $function_name the name of the function that is to be called.
 * @param integer $priority optional. Used to specify the order in which the functions associated with a particular action are executed (default=10, lower=earlier execution, and functions with the same priority are executed in the order in which they were added to the filter)
 * @param int $accepted_args optional. The number of arguments the function accept (default is the number provided).
 * @param string $type
 */
function yourls_add_filter( $hook, $function_name, $priority = 10, $accepted_args = NULL, $type = 'filter' ) {
	global $yourls_filters;
	// At this point, we cannot check if the function exists, as it may well be defined later (which is OK)
	$id = yourls_filter_unique_id( $hook, $function_name, $priority );
	
	$yourls_filters[ $hook ][ $priority ][ $id ] = array(
		'function'      => $function_name,
		'accepted_args' => $accepted_args,
		'type'          => $type,
	);
}

/**
 * Hooks a function on to a specific action.
 *
 * Actions are the hooks that YOURLS launches at specific points
 * during execution, or when specific events occur. Plugins can specify that
 * one or more of its PHP functions are executed at these points, using the
 * Action API.
 *
 * @param string $hook The name of the action to which the $function_to_add is hooked.
 * @param callback $function_name The name of the function you wish to be called.
 * @param int $priority optional. Used to specify the order in which the functions associated with a particular action are executed (default: 10). Lower numbers correspond with earlier execution, and functions with the same priority are executed in the order in which they were added to the action.
 * @param int $accepted_args optional. The number of arguments the function accept (default 1).
 */
function yourls_add_action( $hook, $function_name, $priority = 10, $accepted_args = 1 ) {
	return yourls_add_filter( $hook, $function_name, $priority, $accepted_args, 'action' );
}



/**
 * Build Unique ID for storage and retrieval.
 *
 * Simply using a function name is not enough, as several functions can have the same name when they are enclosed in classes.
 *
 * @global array $yourls_filters storage for all of the filters
 * @param string $hook hook to which the function is attached
 * @param string|array $function used for creating unique id
 * @param int|bool $priority used in counting how many hooks were applied.  If === false and $function is an object reference, we return the unique id only if it already has one, false otherwise.
 * @return string unique ID for usage as array key
 */
function yourls_filter_unique_id( $hook, $function, $priority ) {
	global $yourls_filters;

	// If function then just skip all of the tests and not overwrite the following.
	if ( is_string( $function ) ) {
		return $function;
    }
    
	if( is_object($function) ) {
		// Closures are currently implemented as objects
		$function = array( $function, '' );
	} else {
		$function = (array) $function;
	}

	// Object Class Calling
	if ( is_object( $function[0] ) ) {
        return spl_object_hash( $function[0] ) . $function[1];
	}
    
    // Static Calling
    if ( is_string( $function[0] ) ) {
		return $function[0]. '::' .$function[1];
    }

}

/**
 * Performs a filtering operation on a YOURLS element or event.
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
 * Returns an element which may have been filtered by a filter.
 *
 * @global array $yourls_filters storage for all of the filters
 * @param string $hook the name of the YOURLS element or action
 * @param mixed $value the value of the element before filtering
 * @return mixed
 */
function yourls_apply_filter( $hook, $value = '' ) {
	global $yourls_filters;
	if ( !isset( $yourls_filters[ $hook ] ) )
		return $value;
	
	$args = func_get_args();
	
	// Sort filters by priority
	ksort( $yourls_filters[ $hook ] );
	
	// Loops through each filter
	reset( $yourls_filters[ $hook ] );
	do {
		foreach( (array) current( $yourls_filters[ $hook ] ) as $the_ ) {
			if ( !is_null( $the_['function'] ) ){
				$args[1] = $value;
				$count = $the_['accepted_args'];
				if ( is_null( $count ) ) {
					$_value = call_user_func_array( $the_['function'], array_slice( $args, 1 ) );
				} else {
					$_value = call_user_func_array( $the_['function'], array_slice( $args, 1, (int) $count ) );
				}
			}
			if( $the_['type'] == 'filter' )
				$value = $_value;
		}

	} while ( next( $yourls_filters[ $hook ] ) !== false );
	
	if( $the_['type'] == 'filter' )
		return $value;
}

/**
 * Performs an action triggered by a YOURLS event.
* 
 * @param string $hook the name of the YOURLS action
 * @param mixed $arg action arguments
 */
function yourls_do_action( $hook, $arg = '' ) {
	global $yourls_actions;
	
	// Keep track of actions that are "done"
	if ( !isset( $yourls_actions ) )
		$yourls_actions = array();
	if ( !isset( $yourls_actions[ $hook ] ) ) {
		$yourls_actions[ $hook ] = 1;
    } else {
		++$yourls_actions[ $hook ];
    }

	$args = array();
	if ( is_array( $arg ) && 1 == count( $arg ) && isset( $arg[0] ) && is_object( $arg[0] ) ) // array(&$this)
		$args[] =& $arg[0];
	else
		$args[] = $arg;
	for ( $a = 2; $a < func_num_args(); $a++ )
		$args[] = func_get_arg( $a );
	
	yourls_apply_filter( $hook, $args );
}

/**
* Retrieve the number times an action is fired.
*
* @param string $hook Name of the action hook.
* @return int The number of times action hook <tt>$hook</tt> is fired
*/
function yourls_did_action( $hook ) {
	global $yourls_actions;
	if ( !isset( $yourls_actions ) || !isset( $yourls_actions[ $hook ] ) )
		return 0;
	return $yourls_actions[ $hook ];
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
 * @param callback $function_to_remove The name of the function which should be removed.
 * @param int $priority optional. The priority of the function (default: 10).
 * @return boolean Whether the function was registered as a filter before it was removed.
 */
function yourls_remove_filter( $hook, $function_to_remove, $priority = 10 ) {
	global $yourls_filters;
	
	$function_to_remove = yourls_filter_unique_id( $hook, $function_to_remove, $priority );

	$remove = isset( $yourls_filters[ $hook ][ $priority ][ $function_to_remove ] );

	if ( $remove === true ) {
		unset ( $yourls_filters[$hook][$priority][$function_to_remove] );
		if ( empty( $yourls_filters[$hook][$priority] ) )
			unset( $yourls_filters[$hook] );
	}
	return $remove;
}

/**
 * Removes a function from a specified action hook.
 *
 * @see yourls_remove_filter()
 *
 * @param string $hook The action hook to which the function to be removed is hooked.
 * @param callback $function_to_remove The name of the function which should be removed.
 * @param int $priority optional. The priority of the function (default: 10).
 * @return boolean Whether the function was registered as an action before it was removed.
 */

function yourls_remove_action( $hook, $function_to_remove, $priority = 10 ) {
    return yourls_remove_filter( $hook, $function_to_remove, $priority );
}

/**
 * Removes all functions from a specified action hook.
 *
 * @see yourls_remove_all_filters()
 * @since 1.7.1
 *
 * @param string $hook The action to remove hooks from
 * @param int $priority optional. The priority of the functions to remove
 * @return boolean true when it's finished
 */

function yourls_remove_all_actions( $hook, $priority = false ) {
    return yourls_remove_all_filters( $hook, $priority );
}

/**
 * Removes all functions from a specified filter hook.
 *
 * @since 1.7.1
 *
 * @param string $hook The filter to remove hooks from
 * @param int $priority optional. The priority of the functions to remove
 * @return boolean true when it's finished
 */

function yourls_remove_all_filters( $hook, $priority = false ) {
    global $yourls_filters;
    
    if( isset( $yourls_filters[ $hook ] ) ) {
        if( $priority === false ) {
            unset( $yourls_filters[ $hook ] );
        } else if ( isset( $yourls_filters[ $hook ][ $priority ] ) ) {
            unset( $yourls_filters[ $hook ][ $priority ] );
        }
    }
    
    return true;
}

/**
 * Check if any filter has been registered for a hook.
 *
 * @global array $yourls_filters storage for all of the filters
 * @param string $hook The name of the filter hook.
 * @param callback $function_to_check optional.  If specified, return the priority of that function on this hook or false if not attached.
 * @return int|boolean Optionally returns the priority on that hook for the specified function.
 */
function yourls_has_filter( $hook, $function_to_check = false ) {
	global $yourls_filters;

	$has = !empty( $yourls_filters[ $hook ] );
	if ( false === $function_to_check || false == $has ) {
		return $has;
	}
    
	if ( !$idx = yourls_filter_unique_id( $hook, $function_to_check, false ) )
		return false;

	foreach ( (array) array_keys( $yourls_filters[ $hook ] ) as $priority ) {
		if ( isset( $yourls_filters[ $hook ][ $priority ][ $idx ] ) )
			return $priority;
	}
	return false;
}

function yourls_has_action( $hook, $function_to_check = false ) {
	return yourls_has_filter( $hook, $function_to_check );
}

/**
 * Return number of active plugins
 *
 * @return integer Number of activated plugins
 */
function yourls_has_active_plugins( ) {
	global $ydb;
	
	if( !property_exists( $ydb, 'plugins' ) || !$ydb->plugins )
		$ydb->plugins = array();
		
	return count( $ydb->plugins );
}


/**
 * List plugins in /user/plugins
 *
 * @return array Array of [/plugindir/plugin.php]=>array('Name'=>'Ozh', 'Title'=>'Hello', )
 */
function yourls_get_plugins( ) {
	$plugins = (array) glob( YOURLS_PLUGINDIR .'/*/plugin.php');
	
	if( !$plugins )
		return array();
	
	foreach( $plugins as $key => $plugin ) {
		$_plugin = yourls_plugin_basename( $plugin );
		$plugins[ $_plugin ] = yourls_get_plugin_data( $plugin );
		unset( $plugins[ $key ] );
	}
	
	return $plugins;
}

/**
 * Check if a plugin is active
 *
 * @param string $plugin Physical path to plugin file
 * @return bool
 */
function yourls_is_active_plugin( $plugin ) {
	if( !yourls_has_active_plugins( ) )
		return false;
	
	global $ydb;
	$plugin = yourls_plugin_basename( $plugin );
	
	return in_array( $plugin, $ydb->plugins );

}

/**
 * Parse a plugin header
 *
 * @param string $file Physical path to plugin file
 * @return array Array of 'Field'=>'Value' from plugin comment header lines of the form "Field: Value"
 */
function yourls_get_plugin_data( $file ) {
	$fp = fopen( $file, 'r' ); // assuming $file is readable, since yourls_load_plugins() filters this
	$data = fread( $fp, 8192 ); // get first 8kb
	fclose( $fp );
	
	// Capture all the header within first comment block
	if( !preg_match( '!.*?/\*(.*?)\*/!ms', $data, $matches ) )
		return array();
	
	// Capture each line with "Something: some text"
	unset( $data );
	$lines = preg_split( "[\n|\r]", $matches[1] );
	unset( $matches );

	$plugin_data = array();
	foreach( $lines as $line ) {
		if( !preg_match( '!(.*?):\s+(.*)!', $line, $matches ) )
			continue;
		
		list( $null, $field, $value ) = array_map( 'trim', $matches);
		$plugin_data[ $field ] = $value;
	}
	
	return $plugin_data;
}

// Include active plugins
function yourls_load_plugins() {
	// Don't load plugins when installing or updating
	if( yourls_is_installing() OR yourls_is_upgrading() )
		return;
	
	$active_plugins = yourls_get_option( 'active_plugins' );
	if( false === $active_plugins )
		return;
	
	global $ydb;
	$ydb->plugins = array();
	
	foreach( (array)$active_plugins as $key=>$plugin ) {
		if( yourls_validate_plugin_file( YOURLS_PLUGINDIR.'/'.$plugin ) ) {
			include_once( YOURLS_PLUGINDIR.'/'.$plugin );
			$ydb->plugins[] = $plugin;
			unset( $active_plugins[$key] );
		}
	}
	
	// $active_plugins should be empty now, if not, a plugin could not be find: remove it
	if( count( $active_plugins ) ) {
		yourls_update_option( 'active_plugins', $ydb->plugins );
		$message = yourls_n( 'Could not find and deactivated plugin :', 'Could not find and deactivated plugins :', count( $active_plugins ) );
		$missing = '<strong>'.join( '</strong>, <strong>', $active_plugins ).'</strong>';
		yourls_add_notice( $message .' '. $missing );
	}
}

/**
 * Check if a file is safe for inclusion (well, "safe", no guarantee)
 *
 * @param string $file Full pathname to a file
 * @return bool
 */
function yourls_validate_plugin_file( $file ) {
	if (
		false !== strpos( $file, '..' )
		OR
		false !== strpos( $file, './' )
		OR
		'plugin.php' !== substr( $file, -10 )	// a plugin must be named 'plugin.php'
		OR
		!is_readable( $file )
	)
		return false;
		
	return true;
}

/**
 * Activate a plugin
 *
 * @param string $plugin Plugin filename (full or relative to plugins directory)
 * @return mixed string if error or true if success
 */
function yourls_activate_plugin( $plugin ) {
	// validate file
	$plugin = yourls_plugin_basename( $plugin );
	$plugindir = yourls_sanitize_filename( YOURLS_PLUGINDIR );
	if( !yourls_validate_plugin_file( $plugindir.'/'.$plugin ) )
		return yourls__( 'Not a valid plugin file' );
		
	// check not activated already
	global $ydb;
	if( yourls_has_active_plugins() && in_array( $plugin, $ydb->plugins ) )
		return yourls__( 'Plugin already activated' );
	
	// attempt activation. TODO: uber cool fail proof sandbox like in WP.
	ob_start();
	include_once( YOURLS_PLUGINDIR.'/'.$plugin );
	if ( ob_get_length() > 0 ) {
		// there was some output: error
        // @codeCoverageIgnoreStart
		$output = ob_get_clean();
		return yourls_s( 'Plugin generated unexpected output. Error was: <br/><pre>%s</pre>', $output );
        // @codeCoverageIgnoreEnd
	}
    ob_end_clean();

	// so far, so good: update active plugin list
	$ydb->plugins[] = $plugin;
	yourls_update_option( 'active_plugins', $ydb->plugins );
	yourls_do_action( 'activated_plugin', $plugin );
	yourls_do_action( 'activated_' . $plugin );
	
	return true;
}

/**
 * Deactivate a plugin
 *
 * @param string $plugin Plugin filename (full relative to plugins directory)
 * @return mixed string if error or true if success
 */
function yourls_deactivate_plugin( $plugin ) {
	$plugin = yourls_plugin_basename( $plugin );

	// Check plugin is active
	if( !yourls_is_active_plugin( $plugin ) )
		return yourls__( 'Plugin not active' );
	
	// Deactivate the plugin
	global $ydb;
	$key = array_search( $plugin, $ydb->plugins );
	if( $key !== false ) {
		array_splice( $ydb->plugins, $key, 1 );
	}
	
	yourls_update_option( 'active_plugins', $ydb->plugins );
	yourls_do_action( 'deactivated_plugin', $plugin );
	yourls_do_action( 'deactivated_' . $plugin );
	
	return true;
}

/**
 * Return the path of a plugin file, relative to the plugins directory
 */
function yourls_plugin_basename( $file ) {
	$file = yourls_sanitize_filename( $file );
	$plugindir = yourls_sanitize_filename( YOURLS_PLUGINDIR );
	$file = str_replace( $plugindir, '', $file );
	return trim( $file, '/' );
}

/**
 * Return the URL of the directory a plugin
 */
function yourls_plugin_url( $file ) {
	$url = YOURLS_PLUGINURL . '/' . yourls_plugin_basename( $file );
	if( yourls_is_ssl() or yourls_needs_ssl() )
		$url = str_replace( 'http://', 'https://', $url );
	return yourls_apply_filter( 'plugin_url', $url, $file );
}

/**
 * Display list of links to plugin admin pages, if any
 */
function yourls_list_plugin_admin_pages() {
	global $ydb;
	
	if( !property_exists( $ydb, 'plugin_pages' ) || !$ydb->plugin_pages )
		return;
	
	$plugin_links = array();
	foreach( (array)$ydb->plugin_pages as $plugin => $page ) {
		$plugin_links[ $plugin ] = array(
			'url'    => yourls_admin_url( 'plugins.php?page='.$page['slug'] ),
			'anchor' => $page['title'],
		);
	}
	return $plugin_links;
}

/**
 * Register a plugin administration page
 */
function yourls_register_plugin_page( $slug, $title, $function ) {
	global $ydb;
	
	if( !property_exists( $ydb, 'plugin_pages' ) || !$ydb->plugin_pages )
		$ydb->plugin_pages = array();

	$ydb->plugin_pages[ $slug ] = array(
		'slug'     => $slug,
		'title'    => $title,
		'function' => $function,
	);
}

/**
 * Handle plugin administration page
 *
 */
function yourls_plugin_admin_page( $plugin_page ) {
	global $ydb;

	// Check the plugin page is actually registered
	if( !isset( $ydb->plugin_pages[$plugin_page] ) ) {
		yourls_die( yourls__( 'This page does not exist. Maybe a plugin you thought was activated is inactive?' ), yourls__( 'Invalid link' ) );
	}
	
	// Draw the page itself
	yourls_do_action( 'load-' . $plugin_page);
	yourls_html_head( 'plugin_page_' . $plugin_page, $ydb->plugin_pages[$plugin_page]['title'] );
	yourls_html_logo();
	yourls_html_menu();
	
	call_user_func( $ydb->plugin_pages[$plugin_page]['function'] );
	
	yourls_html_footer();
}


/**
 * Callback function: Sort plugins 
 *
 * @link http://php.net/uasort
 * @codeCoverageIgnore
 *
 * @param array $plugin_a
 * @param array $plugin_b
 * @return int 0, 1 or -1, see uasort()
 */
function yourls_plugins_sort_callback( $plugin_a, $plugin_b ) {
	$orderby = yourls_apply_filter( 'plugins_sort_callback', 'Plugin Name' );
	$order   = yourls_apply_filter( 'plugins_sort_callback', 'ASC' );

	$a = isset( $plugin_a[ $orderby ] ) ? $plugin_a[ $orderby ] : '';
	$b = isset( $plugin_b[ $orderby ] ) ? $plugin_b[ $orderby ] : '';

	if ( $a == $b )
		return 0;

	if ( 'DESC' == $order )
		return ( $a < $b ) ? 1 : -1;
	else
		return ( $a < $b ) ? -1 : 1;		
}
