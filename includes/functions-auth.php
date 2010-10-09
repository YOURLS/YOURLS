<?php
// Check for valid user. Returns true or an error message
function yourls_is_valid_user() {
	static $valid = false;
	
	if( $valid )
		return true;

	// Logout request
	if( isset( $_GET['action'] ) && $_GET['action'] == 'logout') {
		yourls_store_cookie( null );
		return 'Logged out successfully';
	}
	
	// Check cookies or login request. Login form has precedence.
	global $yourls_user_passwords;
	
	// In the future maybe I'll implement nonces like in WP. Will be something like
	// ?nonce=fn(login,pwd,action)
	
	// Determine auth method and check credentials
	if
		// API only: Secure (no login or pwd) and time limited token
		// ?timestamp=12345678&signature=md5(totoblah12345678)
		( yourls_is_API() &&
		  isset($_REQUEST['timestamp']) && !empty($_REQUEST['timestamp']) &&
		  isset($_REQUEST['signature']) && !empty($_REQUEST['signature'])
		)
		{
			$valid = yourls_check_signature_timestamp();
		}
		
	elseif
		// API only: Secure (no login or pwd)
		// ?signature=md5(totoblah)
		( yourls_is_API() &&
		  !isset($_REQUEST['timestamp']) &&
		  isset($_REQUEST['signature']) && !empty($_REQUEST['signature'])
		)
		{
			$valid = yourls_check_signature();
		}
	
	elseif
		// API or normal: login with username & pwd
		( isset($_REQUEST['username']) && isset($_REQUEST['password'])
		  && !empty( $_REQUEST['username'] ) && !empty( $_REQUEST['password']  ) )
		{
			$valid = yourls_check_username_password();
		}
	
	elseif
		// Normal only: cookies
		( !yourls_is_API() && 
		  isset($_COOKIE['yourls_username']) && isset($_COOKIE['yourls_password']) )
		{
			$valid = yourls_check_auth_cookie();
		}

	// Login for the win!
	if ( $valid ) {
		// (Re)store encrypted cookie and tell it's ok
		if ( !yourls_is_API() ) // No need to store a cookie when used in API mode.
			yourls_store_cookie( YOURLS_USER );
		return true;
	}
	
	// Login failed
	if ( isset($_REQUEST['username']) || isset($_REQUEST['password']) ) {
		return 'Invalid username or password';
	} else {
		return 'Please log in';
	}
}

// Check auth against list of login=>pwd. Sets user if applicable, returns bool
function yourls_check_username_password() {
	global $yourls_user_passwords;
	if( isset( $yourls_user_passwords[ $_REQUEST['username'] ] ) && $yourls_user_passwords[ $_REQUEST['username'] ] == $_REQUEST['password'] ) {
		yourls_set_user( $_REQUEST['username'] );
		return true;
	}
	return false;
}

// Check auth against encrypted COOKIE data. Sets user if applicable, returns bool
function yourls_check_auth_cookie() {
	global $yourls_user_passwords;
	foreach( $yourls_user_passwords as $valid_user => $valid_password ) {
		if( 
			yourls_salt($valid_user) == $_COOKIE['yourls_username']
			&& yourls_salt($valid_password) == $_COOKIE['yourls_password'] 
		) {
			yourls_set_user( $valid_user );
			return true;
		}
	}
	return false;
}

// Check auth against signature and timestamp. Sets user if applicable, returns bool
function yourls_check_signature_timestamp() {
	// Timestamp in PHP : time()
	// Timestamp in JS: parseInt(new Date().getTime() / 1000)
	global $yourls_user_passwords;
	foreach( $yourls_user_passwords as $valid_user => $valid_password ) {
		if (
			(
				md5( $_REQUEST['timestamp'].yourls_auth_signature( $valid_user ) ) == $_REQUEST['signature']
				or
				md5( yourls_auth_signature( $valid_user ).$_REQUEST['timestamp'] ) == $_REQUEST['signature']
			)
			&&
			yourls_check_timestamp( $_REQUEST['timestamp'] )
			) {
			yourls_set_user( $valid_user );
			return true;
		}
	}
	return false;
}

// Check auth against signature. Sets user if applicable, returns bool
function yourls_check_signature() {
	global $yourls_user_passwords;
	foreach( $yourls_user_passwords as $valid_user => $valid_password ) {
		if ( yourls_auth_signature( $valid_user ) == $_REQUEST['signature'] ) {
			yourls_set_user( $valid_user );
			return true;
		}
	}
	return false;
}

// Generate secret signature hash
function yourls_auth_signature( $username = false ) {
	if( !$username && defined('YOURLS_USER') ) {
		$username = YOURLS_USER;
	}
	return ( $username ? substr( yourls_salt( $username ), 0, 10 ) : 'Cannot generate auth signature: no username' );
}

// Check a timestamp is from the past and not too old
function yourls_check_timestamp( $time ) {
	$now = time();
	return ( $now >= $time && ceil( $now - $time ) < YOURLS_NONCE_LIFE );
}

// Store new cookie. No $user will delete the cookie.
function yourls_store_cookie( $user = null ) {
	if( !$user ) {
		$pass = null;
		$time = time() - 3600;
	} else {
		global $yourls_user_passwords;
		if( isset($yourls_user_passwords[$user]) ) {
			$pass = $yourls_user_passwords[$user];
		} else {
			die('Stealing cookies?'); // This should never happen
		}
		$time = time() + YOURLS_COOKIE_LIFE;
	}
	
	$domain   = yourls_apply_filter( 'setcookie_domain',   parse_url( YOURLS_SITE, 1 ) );
	$secure   = yourls_apply_filter( 'setcookie_secure',   yourls_is_ssl() );
	$httponly = yourls_apply_filter( 'setcookie_httponly', true );
		
	if ( !headers_sent() ) {
		// Set httponly if the php version is >= 5.2.0
		if( version_compare( phpversion(), '5.2.0', 'ge' ) ) {
			setcookie('yourls_username', yourls_salt( $user ), $time, '/', $domain, $secure, $httponly );
			setcookie('yourls_password', yourls_salt( $pass ), $time, '/', $domain, $secure, $httponly );
		} else {
			setcookie('yourls_username', yourls_salt( $user ), $time, '/', $domain, $secure );
			setcookie('yourls_password', yourls_salt( $pass ), $time, '/', $domain, $secure );
		}
	}
}

// Set user name
function yourls_set_user( $user ) {
	if( !defined('YOURLS_USER') )
		define('YOURLS_USER', $user);
}
