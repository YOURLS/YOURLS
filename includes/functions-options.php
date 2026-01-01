<?php
/*
 * Functions to deal with the option API
 *
 */

/**
 * Read an option from DB (or from cache if available). Return value or $default if not found
 *
 * Pretty much stolen from WordPress
 *
 * @since 1.4
 * @param string $option_name Option name. Expected to not be SQL-escaped.
 * @param mixed $default Optional value to return if option doesn't exist. Default false.
 * @return mixed Value set for the option.
 */
function yourls_get_option( $option_name, $default = false ) {
    // Allow plugins to short-circuit options
    $pre = yourls_apply_filter( 'shunt_option_'.$option_name, false );
    if ( false !== $pre ) {
        return $pre;
    }

    $option = new \YOURLS\Database\Options(yourls_get_db('read-get_option'));
    $value  = $option->get($option_name, $default);

    return yourls_apply_filter( 'get_option_'.$option_name, $value );
}

/**
 * Read all options from DB at once
 *
 * The goal is to read all options at once and then populate array $ydb->option, to prevent further
 * SQL queries if we need to read an option value later.
 * It's also a simple check whether YOURLS is installed or not (no option = assuming not installed) after
 * a check for DB server reachability has been performed
 *
 * @since 1.4
 * @return void
 */
function yourls_get_all_options() {
    // Allow plugins to short-circuit all options. (Note: regular plugins are loaded after all options)
    $pre = yourls_apply_filter( 'shunt_all_options', false );
    if ( false !== $pre ) {
        return $pre;
    }

    $options = new \YOURLS\Database\Options(yourls_get_db('read-get_all_options'));

    if ($options->get_all_options() === false) {
        // Zero option found but no unexpected error so far: YOURLS isn't installed
        yourls_set_installed(false);
        return;
    }

    yourls_set_installed(true);
}

/**
 * Update (add if doesn't exist) an option to DB
 *
 * Pretty much stolen from WordPress
 *
 * @since 1.4
 * @param string $option_name Option name. Expected to not be SQL-escaped.
 * @param mixed $newvalue Option value. Must be serializable if non-scalar. Expected to not be SQL-escaped.
 * @return bool False if value was not updated, true otherwise.
 */
function yourls_update_option( $option_name, $newvalue ) {
    $option = new \YOURLS\Database\Options(yourls_get_db('write-update_option'));
    $update = $option->update($option_name, $newvalue);

    return $update;
}

/**
 * Add an option to the DB
 *
 * Pretty much stolen from WordPress
 *
 * @since 1.4
 * @param string $name Name of option to add. Expected to not be SQL-escaped.
 * @param mixed $value Optional option value. Must be serializable if non-scalar. Expected to not be SQL-escaped.
 * @return bool False if option was not added and true otherwise.
 */
function yourls_add_option( $name, $value = '' ) {
    $option = new \YOURLS\Database\Options(yourls_get_db('write-add_option'));
    $add    = $option->add($name, $value);

    return $add;
}

/**
 * Delete an option from the DB
 *
 * Pretty much stolen from WordPress
 *
 * @since 1.4
 * @param string $name Option name to delete. Expected to not be SQL-escaped.
 * @return bool True, if option is successfully deleted. False on failure.
 */
function yourls_delete_option( $name ) {
    $option = new \YOURLS\Database\Options(yourls_get_db('write-delete_option'));
    $delete = $option->delete($name);

    return $delete;
}

/**
 * Serialize data if needed. Stolen from WordPress
 *
 * @since 1.4
 * @param mixed $data Data that might be serialized.
 * @return mixed A scalar data
 */
function yourls_maybe_serialize( $data ) {
    if ( is_array( $data ) || is_object( $data ) )
        return serialize( $data );

    if ( yourls_is_serialized( $data, false ) )
        return serialize( $data );

    return $data;
}

/**
 * Unserialize value only if it was serialized. Stolen from WP
 *
 * @since 1.4
 * @param string $original Maybe unserialized original, if is needed.
 * @return mixed Unserialized data can be any type.
 */
function yourls_maybe_unserialize( $original ) {
    if ( yourls_is_serialized( $original ) ) // don't attempt to unserialize data that wasn't serialized going in
        return @unserialize( $original );
    return $original;
}

/**
 * Check value to find if it was serialized. Stolen from WordPress
 *
 * @since 1.4
 * @param mixed $data Value to check to see if was serialized.
 * @param bool $strict Optional. Whether to be strict about the end of the string. Defaults true.
 * @return bool False if not serialized and true if it was.
 */
function yourls_is_serialized( $data, $strict = true ) {
    // if it isn't a string, it isn't serialized
    if ( ! is_string( $data ) )
        return false;
    $data = trim( $data );
     if ( 'N;' == $data )
        return true;
    $length = strlen( $data );
    if ( $length < 4 )
        return false;
    if ( ':' !== $data[1] )
        return false;
    if ( $strict ) {
        $lastc = $data[ $length - 1 ];
        if ( ';' !== $lastc && '}' !== $lastc )
            return false;
    } else {
        $semicolon = strpos( $data, ';' );
        $brace     = strpos( $data, '}' );
        // Either ; or } must exist.
        if ( false === $semicolon && false === $brace )
            return false;
        // But neither must be in the first X characters.
        if ( false !== $semicolon && $semicolon < 3 )
            return false;
        if ( false !== $brace && $brace < 4 )
            return false;
    }
    $token = $data[0];
    switch ( $token ) {
        case 's' :
            if ( $strict ) {
                if ( '"' !== $data[ $length - 2 ] )
                    return false;
            } elseif ( false === strpos( $data, '"' ) ) {
                return false;
            }
            // or else fall through
        case 'a' :
        case 'O' :
            return (bool) preg_match( "/^{$token}:[0-9]+:/s", $data );
        case 'b' :
        case 'i' :
        case 'd' :
            $end = $strict ? '$' : '';
            return (bool) preg_match( "/^{$token}:[0-9.E-]+;$end/", $data );
    }
    return false;
}
