<?php
/**
 * Check for valid user via login form or stored cookie. Returns true or an error message
 *
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
	if( isset( $_GET['action'] ) && $_GET['action'] == 'logout' ) {
		yourls_do_action( 'logout' );
		yourls_store_cookie( null );
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
				$url = yourls_match_current_protocol(yourls_sanitize_url(sprintf("%s%s", $_SERVER['SERVER_NAME'], $_SERVER['REQUEST_URI'])));
				yourls_redirect( yourls_sanitize_url_safe($url) );
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
 */
function yourls_check_username_password() {
	global $yourls_user_passwords;
	if( isset( $yourls_user_passwords[ $_REQUEST['username'] ] ) && yourls_check_password_hash( $_REQUEST['username'], $_REQUEST['password'] ) ) {
		yourls_set_user( $_REQUEST['username'] );
		return true;
	}
	return false;
}

/**
 * Check a submitted password sent in plain text against stored password which can be a salted hash
 *
 */
function yourls_check_password_hash( $user, $submitted_password ) {
	global $yourls_user_passwords;
	
	if( !isset( $yourls_user_passwords[ $user ] ) )
		return false;
	
	if ( yourls_has_phpass_password( $user ) ) {
		// Stored password is hashed with phpass
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
 * Overwrite plaintext passwords in config file with phpassed versions.
 *
 * @since 1.7
 * @param string $config_file Full path to file
 * @return true if overwrite was successful, an error message otherwise
 */
function yourls_hash_passwords_now( $config_file ) {
	if( !is_readable( $config_file ) )
		return 'cannot read file'; // not sure that can actually happen...
		
	if( !is_writable( $config_file ) )
		return 'cannot write file';	
	
	// Include file to read value of $yourls_user_passwords
	// Temporary suppress error reporting to avoid notices about redeclared constants
	$errlevel = error_reporting();
	error_reporting( 0 );
	require $config_file;
	error_reporting( $errlevel );
	
	$configdata = file_get_contents( $config_file );
	if( $configdata == false )
		return 'could not read file';

	$to_hash = 0; // keep track of number of passwords that need hashing
	foreach ( $yourls_user_passwords as $user => $password ) {
		if ( !yourls_has_phpass_password( $user ) && !yourls_has_md5_password( $user ) ) {
			$to_hash++;
			$hash = yourls_phpass_hash( $password );
			// PHP would interpret $ as a variable, so replace it in storage.
			$hash = str_replace( '$', '!', $hash );
			$quotes = "'" . '"';
			$pattern = "/[$quotes]${user}[$quotes]\s*=>\s*[$quotes]" . preg_quote( $password, '/' ) . "[$quotes]/";
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
	
	if( $to_hash == 0 )
		return 0; // There was no password to encrypt
	
	$success = file_put_contents( $config_file, $configdata );
	if ( $success === FALSE ) {
		yourls_debug_log( 'Failed writing to ' . $config_file );
		return 'could not write file';
	}
	return true;
}

/**
 * Hash a password using phpass
 *
 * @since 1.7
 * @param string $password password to hash
 * @return string hashed password
 */
function yourls_phpass_hash( $password ) {
	$hasher = yourls_phpass_instance();
	return $hasher->HashPassword( $password );
}

/**
 * Check a clear password against a phpass hash
 *
 * @since 1.7
 * @param string $password clear (eg submitted in a form) password
 * @param string $hash hash supposedly generated by phpass
 * @return bool true if the hash matches the password once hashed by phpass, false otherwise
 */
function yourls_phpass_check( $password, $hash ) {
	$hasher = yourls_phpass_instance();
	return $hasher->CheckPassword( $password, $hash );
}

/**
 * Helper function: create new instance or return existing instance of phpass class
 *
 * @since 1.7
 * @param int $iteration iteration count - 8 is default in phpass
 * @param bool $portable flag to force portable (cross platform and system independant) hashes - false to use whatever the system can do best
 * @return object a PasswordHash instance
 */
function yourls_phpass_instance( $iteration = 8, $portable = false ) {
	$iteration = yourls_apply_filter( 'phpass_new_instance_iteration', $iteration );
	$portable  = yourls_apply_filter( 'phpass_new_instance_portable', $portable );
    
	static $instance = false;
	if( $instance == false ) {
		$instance = new \Ozh\Phpass\PasswordHash( $iteration, $portable );
	}
	
	return $instance;
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
 * Check if a user has a hashed password
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
 * Check if a user's password is hashed with PHPASS.
 *
 * Check if a user password is 'phpass:[lots of chars]'.
 * TODO: deprecate this when/if we have proper user management with password hashes stored in the DB
 *
 * @since 1.7
 * @param string $user user login
 * @return bool true if password hashed with PHPASS, otherwise false
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
 */
function yourls_check_auth_cookie() {
	global $yourls_user_passwords;
	foreach( $yourls_user_passwords as $valid_user => $valid_password ) {
		if ( yourls_salt( $valid_user ) === $_COOKIE[ yourls_cookie_name() ] ) {
			yourls_set_user( $valid_user );
			return true;
		}
	}
	return false;
}

/**
 * Check auth against signature and timestamp. Sets user if applicable, returns bool
 *
 *
 * @since 1.4.1
 * @return bool False if signature or timestamp missing or invalid, true if valid
 */
function yourls_check_signature_timestamp() {
    if(   !isset( $_REQUEST['signature'] ) OR empty( $_REQUEST['signature'] )
       OR !isset( $_REQUEST['timestamp'] ) OR empty( $_REQUEST['timestamp'] )
    )
        return false;

	// Timestamp in PHP : time()
	// Timestamp in JS: parseInt(new Date().getTime() / 1000)
    
	// Check signature & timestamp against all possible users
	global $yourls_user_passwords;
	foreach( $yourls_user_passwords as $valid_user => $valid_password ) {
		if (
			(
				md5( $_REQUEST['timestamp'].yourls_auth_signature( $valid_user ) ) === $_REQUEST['signature']
				or
				md5( yourls_auth_signature( $valid_user ).$_REQUEST['timestamp'] ) === $_REQUEST['signature']
			)
			&&
			yourls_check_timestamp( $_REQUEST['timestamp'] )
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
 */
function yourls_check_timestamp( $time ) {
	$now = time();
	// Allow timestamp to be a little in the future or the past -- see Issue 766
	return yourls_apply_filter( 'check_timestamp', abs( $now - $time ) < YOURLS_NONCE_LIFE, $time );
}

/**
 * Store new cookie. No $user will delete the cookie.
 *
 * @param mixed $user  String, user login, or null to delete cookie
 */
function yourls_store_cookie( $user = null ) {

    // No user will delete the cookie with a cookie time from the past
	if( !$user ) {
		$time = time() - 3600;
	} else {
		$time = time() + YOURLS_COOKIE_LIFE;
	}
	
	$domain   = yourls_apply_filter( 'setcookie_domain',   parse_url( YOURLS_SITE, PHP_URL_HOST ) );
	$secure   = yourls_apply_filter( 'setcookie_secure',   yourls_is_ssl() );
	$httponly = yourls_apply_filter( 'setcookie_httponly', true );

	// Some browsers refuse to store localhost cookie
	if ( $domain == 'localhost' ) 
		$domain = '';
   
    if ( !headers_sent( $filename, $linenum ) ) {
        setcookie( yourls_cookie_name(), yourls_salt( $user ), $time, '/', $domain, $secure, $httponly );
	} else {
		// For some reason cookies were not stored: action to be able to debug that
		yourls_do_action( 'setcookie_failed', $user );
        yourls_debug_log( "Could not store cookie: headers already sent in $filename on line $linenum" );
	}
}

/**
 * Set user name
 *
 */
function yourls_set_user( $user ) {
	if( !defined( 'YOURLS_USER' ) )
		define( 'YOURLS_USER', $user );
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
    return 'yourls_' . yourls_salt( YOURLS_SITE );
}
