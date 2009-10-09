<?php
// Check for valid user. Returns true or an error message
function yourls_is_valid_user() {

	// Kill old cookies from 1.3 and prior
	setcookie('yourls_username', null, time() - 3600 );
	setcookie('yourls_password', null, time() - 3600 );

	// Logout request
	if( isset( $_GET['mode'] ) && $_GET['mode'] == 'logout') {
		setcookie('yourls_username', null, time() - 3600, '/');
		setcookie('yourls_password', null, time() - 3600, '/');
		return 'Logged out successfully';
	}
	
	// Check cookies or login request. Login form has precedence.
	global $yourls_user_passwords;
	foreach($yourls_user_passwords as $valid_user => $valid_password) {
		if ( 
			// Checking against POST data
			( 	isset($_REQUEST['username'])
				&& $valid_user == $_REQUEST['username']
				&& isset($_REQUEST['password'])
				&& $valid_password == $_REQUEST['password']
			)
			or
			// Checking against encrypted COOKIE data
			( 	isset($_COOKIE['yourls_username'])
				&& yourls_salt($valid_user) == $_COOKIE['yourls_username']
				&& isset($_COOKIE['yourls_password'])
				&& yourls_salt($valid_password) == $_COOKIE['yourls_password'] 
			)
		) {
			// (Re)store encrypted cookie and tell it's ok
			if ( !defined('YOURLS_API') or YOURLS_API != true ) {
				// No need to store a cookie when used in API mode.
				setcookie('yourls_username', yourls_salt( $valid_user ), time() + (60*60*24*7), '/' );
				setcookie('yourls_password', yourls_salt( $valid_password ), time() + (60*60*24*7), '/' );
			}
			if( !defined('YOURLS_USER') )
				define('YOURLS_USER', $valid_user);
			return true;
		}
	}
	
	if ( isset($_REQUEST['username']) || isset($_REQUEST['password']) ) {
		return 'Invalid username or password';
	} else {
		return 'Please log in';
	}
}


// Return salted string
function yourls_salt( $string ) {
	$salt = defined('YOURLS_COOKIEKEY') ? YOURLS_COOKIEKEY : md5(__FILE__) ;
	return md5 ($string . $salt);
}

// Display the login screen. Nothing past this point.
function yourls_login_screen( $error_msg = '' ) {
	yourls_html_head( 'login' );
	
	$action = ( isset($_GET['mode']) && $_GET['mode'] == 'logout' ? '?' : '' );
?>
	<h1>
		<a href="<?php echo YOURLS_SITE; ?>/admin/index.php" title="YOURLS"><span>YOURLS</span>: <span>Y</span>our <span>O</span>wn <span>URL</span> <span>S</span>hortener<br/>
		<img src="<?php echo YOURLS_SITE; ?>/images/yourls-logo.png" alt="YOURLS" title="YOURLS" style="border: 0px;" /></a>
	</h1>

	<div id="login">
		<form method="post" action="<?php echo $action; ?>"> <?php // reset any QUERY parameters ?>
			<?php
				if(!empty($error_msg)) {
					echo '<p class="error">'.$error_msg.'</p>';
				}
			?>
			<p>
				<label for="username">Username</label><br />
				<input type="text" id="username" name="username" size="30" class="text" />
			</p>
			<p>
				<label for="password">Password</label><br />
				<input type="password" id="password" name="password" size="30" class="text" />
			</p>
			<p style="text-align: right;">
				<input type="submit" id="submit" name="submit" value="Login" class="button" />
			</p>
		</form>
		<script type="text/javascript">$('#username').focus();</script>
	</div>
	<?php
	yourls_html_footer();
	die();
}