<?php
/**
 * Function related to authentication functions and nonces
 */


/**
 * Show login form if required
 *
 * @return void
 */
function yourls_maybe_require_auth() {
    if( yourls_is_private() ) {
        yourls_do_action( 'require_auth' );
        require_once( YOURLS_INC.'/auth.php' );
    } else {
        yourls_do_action( 'require_no_auth' );
    }
}

/**
 * Check for valid user via login form or stored cookie. Returns true or an error message
 *
 * @return bool|string|mixed true if valid user, error message otherwise. Can also call yourls_die() or redirect to login page. Oh my.
 */
function yourls_is_valid_user() {
    // Allow plugins to short-circuit the whole function
    $pre = yourls_apply_filter( 'shunt_is_valid_user', null );
    if ( null !== $pre ) {
        return $pre;
    }

    // $unfiltered_valid : are credentials valid? Boolean value. It's "unfiltered" to allow plugins to eventually filter it.
    $unfiltered_valid = false;

    // Logout request
    if( isset( $_GET['action'] ) && $_GET['action'] == 'logout' && isset( $_REQUEST['nonce'] ) ) {
        // The logout nonce is associated to fake user 'logout' since at this point we don't know the real user
        yourls_verify_nonce('admin_logout', $_REQUEST['nonce'], 'logout');
        yourls_do_action( 'logout' );
        yourls_store_cookie( '' );
        return yourls__( 'Logged out successfully' );
    }

    // Check cookies or login request. Login form has precedence.

    yourls_do_action( 'pre_login' );

    // Determine auth method and check credentials
    if
        // API only: Secure (no login or pwd) and time limited token
        // ?timestamp=12345678&signature=md5(totoblah12345678)
        ( yourls_is_API() &&
          isset( $_REQUEST['timestamp'] ) && !empty($_REQUEST['timestamp'] ) &&
          isset( $_REQUEST['signature'] ) && !empty($_REQUEST['signature'] )
        )
        {
            yourls_do_action( 'pre_login_signature_timestamp' );
            $unfiltered_valid = yourls_check_signature_timestamp();
        }

    elseif
        // API only: Secure (no login or pwd)
        // ?signature=md5(totoblah)
        ( yourls_is_API() &&
          !isset( $_REQUEST['timestamp'] ) &&
          isset( $_REQUEST['signature'] ) && !empty( $_REQUEST['signature'] )
        )
        {
            yourls_do_action( 'pre_login_signature' );
            $unfiltered_valid = yourls_check_signature();
        }

    elseif
        // API or normal: login with username & pwd
        ( isset( $_REQUEST['username'] ) && isset( $_REQUEST['password'] )
          && !empty( $_REQUEST['username'] ) && !empty( $_REQUEST['password']  ) )
        {
            yourls_do_action( 'pre_login_username_password' );
            $unfiltered_valid = yourls_check_username_password();
        }

    elseif
        // Normal only: cookies
        ( !yourls_is_API() &&
          isset( $_COOKIE[ yourls_cookie_name() ] ) )
        {
            yourls_do_action( 'pre_login_cookie' );
            $unfiltered_valid = yourls_check_auth_cookie();
        }

    // Regardless of validity, allow plugins to filter the boolean and have final word
    $valid = yourls_apply_filter( 'is_valid_user', $unfiltered_valid );

    // Login for the win!
    if ( $valid ) {
        yourls_do_action( 'login' );

        // (Re)store encrypted cookie if needed
        if ( !yourls_is_API() ) {
            yourls_store_cookie( YOURLS_USER );

            // Login form : redirect to requested URL to avoid re-submitting the login form on page reload
            if( isset( $_REQUEST['username'] ) && isset( $_REQUEST['password'] ) && isset( $_SERVER['REQUEST_URI'] ) ) {
                // The return makes sure we exit this function before waiting for redirection.
                // See #3189 and note in yourls_redirect()
                return yourls_redirect( yourls_sanitize_url_safe($_SERVER['REQUEST_URI']) );
            }
        }

        // Login successful
        return true;
    }

    // Login failed
    yourls_do_action( 'login_failed' );

    if ( isset( $_REQUEST['username'] ) || isset( $_REQUEST['password'] ) ) {
        return yourls__( 'Invalid username or password' );
    } else {
        return yourls__( 'Please log in' );
    }
}

/**
 * Check auth against list of login=>pwd. Sets user if applicable, returns bool
 *
 * @return bool  true if login/pwd pair is valid (and sets user if applicable), false otherwise
 */
function yourls_check_username_password() {
    global $yourls_user_passwords;

    // If login form (not API), check for nonce
    if(!yourls_is_API()) {
        yourls_verify_nonce('admin_login');
    }

    if( isset( $yourls_user_passwords[ $_REQUEST['username'] ] ) && yourls_check_password_hash( $_REQUEST['username'], $_REQUEST['password'] ) ) {
        yourls_set_user( $_REQUEST['username'] );
        return true;
    }
    return false;
}

/**
 * Check a submitted password sent in plain text against stored password which can be a salted hash
 *
 * @param string $user
 * @param string $submitted_password
 * @return bool
 */
function yourls_check_password_hash($user, $submitted_password ) {
    global $yourls_user_passwords;

    if( !isset( $yourls_user_passwords[ $user ] ) )
        return false;

    if ( yourls_has_phpass_password( $user ) ) {
        // Stored password is hashed
        list( , $hash ) = explode( ':', $yourls_user_passwords[ $user ] );
        $hash = str_replace( '!', '$', $hash );
        return ( yourls_phpass_check( $submitted_password, $hash ) );
    } else if( yourls_has_md5_password( $user ) ) {
        // Stored password is a salted md5 hash: "md5:<$r = rand(10000,99999)>:<md5($r.'thepassword')>"
        list( , $salt, ) = explode( ':', $yourls_user_passwords[ $user ] );
        return( $yourls_user_passwords[ $user ] == 'md5:'.$salt.':'.md5( $salt . $submitted_password ) );
    } else {
        // Password stored in clear text
        return( $yourls_user_passwords[ $user ] === $submitted_password );
    }
}

/**
 * Overwrite plaintext passwords in config file with hashed versions.
 *
 * @since 1.7
 * @param string $config_file Full path to file
 * @return true|string  if overwrite was successful, an error message otherwise
 */
function yourls_hash_passwords_now( $config_file ) {
    if( !is_readable( $config_file ) ) {
        yourls_debug_log( 'Cannot hash passwords: cannot read file ' . $config_file );
        return 'cannot read file'; // not sure that can actually happen...
    }

    if( !is_writable( $config_file ) ) {
        yourls_debug_log( 'Cannot hash passwords: cannot write file ' . $config_file );
        return 'cannot write file';
    }

    $yourls_user_passwords = [];
    // Include file to read value of $yourls_user_passwords
    // Temporary suppress error reporting to avoid notices about redeclared constants
    $errlevel = error_reporting();
    error_reporting( 0 );
    require $config_file;
    error_reporting( $errlevel );

    $configdata = file_get_contents( $config_file );

    if( $configdata == false ) {
        yourls_debug_log('Cannot hash passwords: file_get_contents() false with ' . $config_file);
        return 'could not read file';
    }

    $to_hash = 0; // keep track of number of passwords that need hashing
    foreach ( $yourls_user_passwords as $user => $password ) {
        // avoid "deprecated" warning when password is null -- see test case in tests/data/auth/preg_replace_problem.php
        $password ??= '';
        if ( !yourls_has_phpass_password( $user ) && !yourls_has_md5_password( $user ) ) {
            $to_hash++;
            $hash = yourls_phpass_hash( $password );
            // PHP would interpret $ as a variable, so replace it in storage.
            $hash = str_replace( '$', '!', $hash );
            $quotes = "'" . '"';
            $pattern = "/[$quotes]" . preg_quote( $user, '/' ) . "[$quotes]\s*=>\s*[$quotes]" . preg_quote( $password, '/' ) . "[$quotes]/";
            $replace = "'$user' => 'phpass:$hash' /* Password encrypted by YOURLS */ ";
            $count = 0;
            $configdata = preg_replace( $pattern, $replace, $configdata, -1, $count );
            // There should be exactly one replacement. Otherwise, fast fail.
            if ( $count != 1 ) {
                yourls_debug_log( "Problem with preg_replace for password hash of user $user" );
                return 'preg_replace problem';
            }
        }
    }

    if( $to_hash == 0 ) {
        yourls_debug_log('Cannot hash passwords: no password found in ' . $config_file);
        return 'no password found';
    }

    $success = file_put_contents( $config_file, $configdata );
    if ( $success === FALSE ) {
        yourls_debug_log( 'Failed writing to ' . $config_file );
        return 'could not write file';
    }

    yourls_debug_log('Successfully encrypted passwords in ' . basename($config_file));
    return true;
}

/**
 * Create a password hash
 *
 * @since 1.7
 * @param string $password password to hash
 * @return string hashed password
 */
function yourls_phpass_hash( $password ) {
    /**
     * Filter for hashing algorithm. See https://www.php.net/manual/en/function.password-hash.php
     * Hashing algos are available if PHP was compiled with it.
     * PASSWORD_BCRYPT is always available.
     */
    $algo    = yourls_apply_filter('hash_algo', PASSWORD_BCRYPT);

    /**
     * Filter for hashing options. See https://www.php.net/manual/en/function.password-hash.php
     * A typical option for PASSWORD_BCRYPT would be ['cost' => <int in range 4-31> ]
     * We're leaving the options at default values, which means a cost of 10 for PASSWORD_BCRYPT.
     *
     * If willing to modify this, be warned about the computing time, as there is a 2^n factor.
     * See https://gist.github.com/ozh/65a75392b7cb254131cc55afd28de99b for examples.
     */
    $options = yourls_apply_filter('hash_options', [] );

    return password_hash($password, $algo, $options);
}

/**
 * Verify that a password matches a hash
 *
 * @since 1.7
 * @param string $password clear (eg submitted in a form) password
 * @param string $hash hash
 * @return bool true if the hash matches the password, false otherwise
 */
function yourls_phpass_check( $password, $hash ) {
    return password_verify($password, $hash);
}


/**
 * Check to see if any passwords are stored as cleartext.
 *
 * @since 1.7
 * @return bool true if any passwords are cleartext
 */
function yourls_has_cleartext_passwords() {
    global $yourls_user_passwords;
    foreach ( $yourls_user_passwords as $user => $pwdata ) {
        if ( !yourls_has_md5_password( $user ) && !yourls_has_phpass_password( $user ) ) {
            return true;
        }
    }
    return false;
}

/**
 * Check if a user has a md5 hashed password
 *
 * Check if a user password is 'md5:[38 chars]'.
 * TODO: deprecate this when/if we have proper user management with password hashes stored in the DB
 *
 * @since 1.7
 * @param string $user user login
 * @return bool true if password hashed, false otherwise
 */
function yourls_has_md5_password( $user ) {
    global $yourls_user_passwords;
    return(    isset( $yourls_user_passwords[ $user ] )
            && substr( $yourls_user_passwords[ $user ], 0, 4 ) == 'md5:'
            && strlen( $yourls_user_passwords[ $user ] ) == 42 // http://www.google.com/search?q=the+answer+to+life+the+universe+and+everything
           );
}

/**
 * Check if a user's password is hashed with password_hash
 *
 * Check if a user password is 'phpass:[lots of chars]'.
 * (For historical reason we're using 'phpass' as an identifier.)
 * TODO: deprecate this when/if we have proper user management with password hashes stored in the DB
 *
 * @since 1.7
 * @param string $user user login
 * @return bool true if password hashed with password_hash, otherwise false
 */
function yourls_has_phpass_password( $user ) {
    global $yourls_user_passwords;
    return( isset( $yourls_user_passwords[ $user ] )
            && substr( $yourls_user_passwords[ $user ], 0, 7 ) == 'phpass:'
    );
}

/**
 * Check auth against encrypted COOKIE data. Sets user if applicable, returns bool
 *
 * @return bool true if authenticated, false otherwise
 */
function yourls_check_auth_cookie() {
    global $yourls_user_passwords;
    foreach( $yourls_user_passwords as $valid_user => $valid_password ) {
        if ( yourls_cookie_value( $valid_user ) === $_COOKIE[ yourls_cookie_name() ] ) {
            yourls_set_user( $valid_user );
            return true;
        }
    }
    return false;
}

/**
 * Check auth against signature and timestamp. Sets user if applicable, returns bool
 *
 * Original usage :
 *   http://sho.rt/yourls-api.php?timestamp=<timestamp>&signature=<md5 hash>&action=...
 * Since 1.7.7 we allow a `hash` parameter and an arbitrary hashed signature, hashed
 * with the `hash` function. Examples :
 *   http://sho.rt/yourls-api.php?timestamp=<timestamp>&signature=<sha512 hash>&hash=sha512&action=...
 *   http://sho.rt/yourls-api.php?timestamp=<timestamp>&signature=<crc32 hash>&hash=crc32&action=...
 *
 * @since 1.4.1
 * @return bool False if signature or timestamp missing or invalid, true if valid
 */
function yourls_check_signature_timestamp() {
    if(   !isset( $_REQUEST['signature'] ) OR empty( $_REQUEST['signature'] )
       OR !isset( $_REQUEST['timestamp'] ) OR empty( $_REQUEST['timestamp'] )
    ) {
        return false;
    }

    // Exit if the timestamp argument is outdated or invalid
    if( !yourls_check_timestamp( $_REQUEST['timestamp'] )) {
        return false;
    }

    // if there is a hash argument, make sure it's part of the availables algos
    $hash_function = isset($_REQUEST['hash']) ? (string)$_REQUEST['hash'] : 'md5';
    if( !in_array($hash_function, hash_algos()) ) {
        return false;
    }

    // Check signature & timestamp against all possible users
    global $yourls_user_passwords;
    foreach( $yourls_user_passwords as $valid_user => $valid_password ) {
        if (
            hash( $hash_function, $_REQUEST['timestamp'].yourls_auth_signature( $valid_user ) ) === $_REQUEST['signature']
            or
            hash( $hash_function, yourls_auth_signature( $valid_user ).$_REQUEST['timestamp'] ) === $_REQUEST['signature']
            ) {
            yourls_set_user( $valid_user );
            return true;
        }
    }

    // Signature doesn't match known user
    return false;
}

/**
 * Check auth against signature. Sets user if applicable, returns bool
 *
 * @since 1.4.1
 * @return bool False if signature missing or invalid, true if valid
 */
function yourls_check_signature() {
    if( !isset( $_REQUEST['signature'] ) OR empty( $_REQUEST['signature'] ) )
        return false;

    // Check signature against all possible users
    global $yourls_user_passwords;
    foreach( $yourls_user_passwords as $valid_user => $valid_password ) {
        if ( yourls_auth_signature( $valid_user ) === $_REQUEST['signature'] ) {
            yourls_set_user( $valid_user );
            return true;
        }
    }

    // Signature doesn't match known user
    return false;
}

/**
 * Generate secret signature hash
 *
 * @param false|string $username  Username to generate signature for, or false to use current user
 * @return string                 Signature
 */
function yourls_auth_signature( $username = false ) {
    if( !$username && defined('YOURLS_USER') ) {
        $username = YOURLS_USER;
    }
    return ( $username ? substr( yourls_salt( $username ), 0, 10 ) : 'Cannot generate auth signature: no username' );
}

/**
 * Check if timestamp is not too old
 *
 * @param int $time  Timestamp to check
 * @return bool      True if timestamp is valid
 */
function yourls_check_timestamp( $time ) {
    $now = time();
    // Allow timestamp to be a little in the future or the past -- see Issue 766
    return yourls_apply_filter( 'check_timestamp', abs( $now - (int)$time ) < yourls_get_nonce_life(), $time );
}

/**
 * Store new cookie. No $user will delete the cookie.
 *
 * @param string $user  User login, or empty string to delete cookie
 * @return void
 */
function yourls_store_cookie( $user = '' ) {

    // No user will delete the cookie with a cookie time from the past
    if( !$user ) {
        $time = time() - 3600;
    } else {
        $time = time() + yourls_get_cookie_life();
    }

    $path     = yourls_apply_filter( 'setcookie_path',     '/' );
    $domain   = yourls_apply_filter( 'setcookie_domain',   parse_url( yourls_get_yourls_site(), PHP_URL_HOST ) );
    $secure   = yourls_apply_filter( 'setcookie_secure',   yourls_is_ssl() );
    $httponly = yourls_apply_filter( 'setcookie_httponly', true );

    // Some browsers refuse to store localhost cookie
    if ( $domain == 'localhost' )
        $domain = '';

    yourls_do_action( 'pre_setcookie', $user, $time, $path, $domain, $secure, $httponly );

    if ( !headers_sent( $filename, $linenum ) ) {
        yourls_setcookie( yourls_cookie_name(), yourls_cookie_value( $user ), $time, $path, $domain, $secure, $httponly );
    } else {
        // For some reason cookies were not stored: action to be able to debug that
        yourls_do_action( 'setcookie_failed', $user );
        yourls_debug_log( "Could not store cookie: headers already sent in $filename on line $linenum" );
    }
}

/**
 * Replacement for PHP's setcookie(), with support for SameSite cookie attribute
 *
 * @see https://github.com/GoogleChromeLabs/samesite-examples/blob/master/php.md
 * @see https://stackoverflow.com/a/59654832/36850
 * @see https://www.php.net/manual/en/function.setcookie.php
 *
 * @since  1.7.7
 * @param  string  $name       cookie name
 * @param  string  $value      cookie value
 * @param  int     $expire     time the cookie expires as a Unix timestamp (number of seconds since the epoch)
 * @param  string  $path       path on the server in which the cookie will be available on
 * @param  string  $domain     (sub)domain that the cookie is available to
 * @param  bool    $secure     if cookie should only be transmitted over a secure HTTPS connection
 * @param  bool    $httponly   if cookie will be made accessible only through the HTTP protocol
 * @return bool                setcookie() result : false if output sent before, true otherwise. This does not indicate whether the user accepted the cookie.
 */
function yourls_setcookie($name, $value, $expire, $path, $domain, $secure, $httponly) {
    $samesite = yourls_apply_filter('setcookie_samesite', 'Lax' );

    return(setcookie($name, $value, array(
        'expires'  => $expire,
        'path'     => $path,
        'domain'   => $domain,
        'samesite' => $samesite,
        'secure'   => $secure,
        'httponly' => $httponly,
    )));
}

/**
 * Set user name
 *
 * @param string $user  Username
 * @return void
 */
function yourls_set_user( $user ) {
    if( !defined( 'YOURLS_USER' ) )
        define( 'YOURLS_USER', $user );
}

/**
 * Get YOURLS_COOKIE_LIFE value (ie the life span of an auth cookie in seconds)
 *
 * Use this function instead of directly using the constant. This way, its value can be modified by plugins
 * on a per case basis
 *
 * @since 1.7.7
 * @see includes/Config/Config.php
 * @return integer     cookie life span, in seconds
 */
function yourls_get_cookie_life() {
    return yourls_apply_filter( 'get_cookie_life', YOURLS_COOKIE_LIFE );
}

/**
 * Get YOURLS_NONCE_LIFE value (ie life span of a nonce in seconds)
 *
 * Use this function instead of directly using the constant. This way, its value can be modified by plugins
 * on a per case basis
 *
 * @since 1.7.7
 * @see includes/Config/Config.php
 * @see https://en.wikipedia.org/wiki/Cryptographic_nonce
 * @return integer     nonce life span, in seconds
 */
function yourls_get_nonce_life() {
    return yourls_apply_filter( 'get_nonce_life', YOURLS_NONCE_LIFE );
}

/**
 * Get YOURLS cookie name
 *
 * The name is unique for each install, to prevent mismatch between sho.rt and very.sho.rt -- see #1673
 *
 * TODO: when multi user is implemented, the whole cookie stuff should be reworked to allow storing multiple users
 *
 * @since 1.7.1
 * @return string  unique cookie name for a given YOURLS site
 */
function yourls_cookie_name() {
    return yourls_apply_filter( 'cookie_name', 'yourls_' . yourls_salt( yourls_get_yourls_site() ) );
}

/**
 * Get auth cookie value
 *
 * @since 1.7.7
 * @param string $user     user name
 * @return string          cookie value
 */
function yourls_cookie_value( $user ) {
    return yourls_apply_filter( 'set_cookie_value', yourls_salt( $user ?? '' ), $user );
}

/**
 * Return a time-dependent string for nonce creation
 *
 * Actually, this returns a float: ceil rounds up a value but is of type float, see https://www.php.net/ceil
 *
 * @return float
 */
function yourls_tick() {
    return ceil( time() / yourls_get_nonce_life() );
}

/**
 * Return hashed string
 *
 * This function is badly named, it's not a salt or a salted string : it's a cryptographic hash.
 *
 * @since 1.4.1
 * @param string $string   string to salt
 * @return string          hashed string
 */
function yourls_salt( $string ) {
    $salt = defined('YOURLS_COOKIEKEY') ? YOURLS_COOKIEKEY : md5(__FILE__) ;
    return yourls_apply_filter( 'yourls_salt', hash_hmac( yourls_hmac_algo(), $string,  $salt), $string );
}

/**
 * Return an available hash_hmac() algorithm
 *
 * @since 1.8.3
 * @return string  hash_hmac() algorithm
 */
function yourls_hmac_algo() {
    $algo = yourls_apply_filter( 'hmac_algo', 'sha256' );
    if( !in_array( $algo, hash_hmac_algos() ) ) {
        $algo = 'sha256';
    }
    return $algo;
}

/**
 * Create a time limited, action limited and user limited token
 *
 * @param string $action      Action to create nonce for
 * @param false|string $user  Optional user string, false for current user
 * @return string             Nonce token
 */
function yourls_create_nonce($action, $user = false ) {
    if( false === $user ) {
        $user = defined('YOURLS_USER') ? YOURLS_USER : '-1';
    }
    $tick = yourls_tick();
    $nonce = substr( yourls_salt($tick . $action . $user), 0, 10 );
    // Allow plugins to alter the nonce
    return yourls_apply_filter( 'create_nonce', $nonce, $action, $user );
}

/**
 * Echoes or returns a nonce field for inclusion into a form
 *
 * @param string $action      Action to create nonce for
 * @param string $name        Optional name of nonce field -- defaults to 'nonce'
 * @param false|string $user  Optional user string, false if unspecified
 * @param bool $echo          True to echo, false to return nonce field
 * @return string             Nonce field
 */
function yourls_nonce_field($action, $name = 'nonce', $user = false, $echo = true ) {
    $field = '<input type="hidden" id="'.$name.'" name="'.$name.'" value="'.yourls_create_nonce( $action, $user ).'" />';
    if( $echo )
        echo $field."\n";
    return $field;
}

/**
 * Add a nonce to a URL. If URL omitted, adds nonce to current URL
 *
 * @param string $action      Action to create nonce for
 * @param string $url         Optional URL to add nonce to -- defaults to current URL
 * @param string $name        Optional name of nonce field -- defaults to 'nonce'
 * @param false|string $user  Optional user string, false if unspecified
 * @return string             URL with nonce added
 */
function yourls_nonce_url($action, $url = false, $name = 'nonce', $user = false ) {
    $nonce = yourls_create_nonce( $action, $user );
    return yourls_add_query_arg( $name, $nonce, $url );
}

/**
 * Check validity of a nonce (ie time span, user and action match).
 *
 * Returns true if valid, dies otherwise (yourls_die() or die($return) if defined).
 * If $nonce is false or unspecified, it will use $_REQUEST['nonce']
 *
 * @param string $action
 * @param false|string $nonce  Optional, string: nonce value, or false to use $_REQUEST['nonce']
 * @param false|string $user   Optional, string user, false for current user
 * @param string $return       Optional, string: message to die with if nonce is invalid
 * @return bool|void           True if valid, dies otherwise
 */
function yourls_verify_nonce($action, $nonce = false, $user = false, $return = '' ) {
    // Get user
    if( false === $user ) {
        $user = defined('YOURLS_USER') ? YOURLS_USER : '-1';
    }

    // Get nonce value from $_REQUEST if not specified
    if( false === $nonce && isset( $_REQUEST['nonce'] ) ) {
        $nonce = $_REQUEST['nonce'];
    }

    // Allow plugins to short-circuit the rest of the function
    if (yourls_apply_filter( 'verify_nonce', false, $action, $nonce, $user, $return ) === true) {
        return true;
    }

    // What nonce should be
    $valid = yourls_create_nonce( $action, $user );

    if( $nonce === $valid ) {
        return true;
    } else {
        if( $return )
            die( $return );
        yourls_die( yourls__( 'Unauthorized action or expired link' ), yourls__( 'Error' ), 403 );
    }
}

/**
 * Check if YOURLS_USER comes from environment variables
 *
 * @since 1.8.2
 * @return bool  true if YOURLS_USER and YOURLS_PASSWORD are defined as environment variables
 */
function yourls_is_user_from_env() {
    return yourls_apply_filter('is_user_from_env', getenv('YOURLS_USER') && getenv('YOURLS_PASSWORD'));

}

/**
 * Check if we should hash passwords in the config file
 *
 * By default, passwords are hashed. They are not if
 *    - there is no password in clear text in the config file (ie everything is already hashed)
 *    - the user defined constant YOURLS_NO_HASH_PASSWORD is true, see https://docs.yourls.org/guide/essentials/credentials.html#i-don-t-want-to-encrypt-my-password
 *    - YOURLS_USER and YOURLS_PASSWORD are provided by the environment, not the config file
 *
 * @since 1.8.2
 * @return bool
 */
function yourls_maybe_hash_passwords() {
    $hash = true;

    if ( !yourls_has_cleartext_passwords()
         OR (yourls_skip_password_hashing())
         OR (yourls_is_user_from_env())
    ) {
        $hash = false;
    }

    return yourls_apply_filter('maybe_hash_password', $hash );
}

/**
 * Check if user setting for skipping password hashing is set
 *
 * @since 1.8.2
 * @return bool
 */
function yourls_skip_password_hashing() {
    return yourls_apply_filter('skip_password_hashing', defined('YOURLS_NO_HASH_PASSWORD') && YOURLS_NO_HASH_PASSWORD);
}
