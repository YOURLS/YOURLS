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
 * @since 1.4.5
 */

$yourls_filters = array();
/* This global var will collect filters with the following structure:
 * $yourls_filters['hook']['array of priorities']['serialized function names']['array of ['array (functions, accepted_args)]']
 */
 
 
// Scan "user/plugins" directory and include plugins
function yourls_load_plugins() {
	$plugins = glob( YOURLS_ABSPATH .'/user/plugins/*/plugin.php');
	
	if( !$plugins )
		return;
	
	global $ydb;
	foreach( $plugins as $plugin ) {
		if( is_readable( $plugin ) ) {
			include_once( $plugin );
			$ydb->plugins[] = $plugin;
		}
	}
	
	/* TODO : move list of registered plugins to a DB entry, a la WP? This would
	   save the glob() call on every YOURLS instance
	*/
}


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
 */
function yourls_add_filter( $hook, $function_name, $priority = 10, $accepted_args = NULL ) {
	global $yourls_filters;
	// At this point, we cannot check if the function exists, as it may well be defined later (which is OK)
	$id = yourls_filter_unique_id( $hook, $function_name, $priority );
	
	$yourls_filters[$hook][$priority][$id] = array(
		'function' => $function_name,
		'accepted_args' => $accepted_args,
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
	return yourls_add_filter( $hook, $function_name, $priority, $accepted_args );
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
 * @param string $type filter or action
 * @return string unique ID for usage as array key
 */
function yourls_filter_unique_id( $hook, $function, $priority ) {
	global $yourls_filters;

	// If function then just skip all of the tests and not overwrite the following.
	if ( is_string($function) )
		return $function;
	// Object Class Calling
	else if (is_object($function[0]) ) {
		$obj_idx = get_class($function[0]).$function[1];
		if ( !isset($function[0]->_yourls_filters_id) ) {
			if ( false === $priority )
				return false;
			$count = isset($yourls_filters[$hook][$priority]) ? count((array)$yourls_filters[$hook][$priority]) : 0;
			$function[0]->_yourls_filters_id = $count;
			$obj_idx .= $count;
			unset($count);
		} else
			$obj_idx .= $function[0]->_yourls_filters_id;
		return $obj_idx;
	}
	// Static Calling
	else if ( is_string($function[0]) )
		return $function[0].$function[1];

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
	if ( !isset( $yourls_filters[$hook] ) )
		return $value;
	
	$args = func_get_args();

	// Sort filters by priority
	ksort( $yourls_filters[$hook] );
	
	// Loops through each filter
	reset( $yourls_filters[$hook] );
	do {
		foreach( (array) current($yourls_filters[$hook]) as $the_ )
			if ( !is_null($the_['function']) ){
				$args[1] = $value;
				$count = $the_['accepted_args'];
				if (is_null($count)) {
					$value = call_user_func_array($the_['function'], array_slice($args, 1));
				} else {
					$value = call_user_func_array($the_['function'], array_slice($args, 1, (int) $count));
				}
			}

	} while ( next($yourls_filters[$hook]) !== false );
	
	return $value;
}

function yourls_do_action( $hook, $arg = '' ) {
	$args = array();
	if ( is_array($arg) && 1 == count($arg) && isset($arg[0]) && is_object($arg[0]) ) // array(&$this)
		$args[] =& $arg[0];
	else
		$args[] = $arg;
	for ( $a = 2; $a < func_num_args(); $a++ )
		$args[] = func_get_arg($a);

	yourls_apply_filter( $hook, $args );
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
 * @param int $accepted_args optional. The number of arguments the function accpets (default: 1).
 * @return boolean Whether the function was registered as a filter before it was removed.
 */
function yourls_remove_filter( $hook, $function_to_remove, $priority = 10, $accepted_args = 1 ) {
	global $yourls_filters;
	
	$function_to_remove = yourls_filter_unique_id($hook, $function_to_remove, $priority);

	$remove = isset ($yourls_filters[$hook][$priority][$function_to_remove]);

	if ( $remove === true ) {
		unset ($yourls_filters[$hook][$priority][$function_to_remove]);
		if ( empty($yourls_filters[$hook][$priority]) )
			unset ($yourls_filters[$hook]);
	}
	return $remove;
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

	$has = !empty($yourls_filters[$hook]);
	if ( false === $function_to_check || false == $has ) {
		return $has;
	}
	if ( !$idx = yourls_filter_unique_id($hook, $function_to_check, false) ) {
		return false;
	}

	foreach ( (array) array_keys($yourls_filters[$hook]) as $priority ) {
		if ( isset($yourls_filters[$hook][$priority][$idx]) )
			return $priority;
	}
	return false;
}

function yourls_has_action( $hook, $function_to_check = false ) {
	return yourls_has_filter( $hook, $function_to_check );
}

