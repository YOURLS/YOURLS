<?php
// Check for valid user. Returns true or an error message
function yourls_is_valid_user() {

	// Logout request
	if($_GET['mode'] == 'logout') {
		setcookie('yourls_username', null, time() - 3600);
		setcookie('yourls_password', null, time() - 3600);
		return 'Logged out successfully';
	}
	
	// Check cookies or login request. Login form has precedence.
	global $yourls_user_passwords;
	foreach($yourls_user_passwords as $valid_user => $valid_password) {
		if ( 
			// Checking against POST data
			( 	isset($_POST['username'])
				&& $valid_user == $_POST['username']
				&& isset($_POST['password'])
				&& $valid_password == $_POST['password']
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
			setcookie('yourls_username', yourls_salt( $valid_user ), time() + (60*60*24*7));
			setcookie('yourls_password', yourls_salt( $valid_password ), time() + (60*60*24*7));
			define('YOURLS_USER', $valid_user);
			return true;
			
		}
	}
	
	if ( isset($_POST['username']) || isset($_POST['password']) ) {
		return 'Invalid username or password';
	} else {
		return 'Fill this form';
	}
}


// Return salted string
function yourls_salt( $string ) {
	$salt = defined('YOURLS_COOKIEKEY') ? YOURLS_COOKIEKEY : md5(__FILE__) ;
	return md5 ($string . YOURLS_COOKIEKEY);
}

// Display the login screen. Nothing past this point.
function yourls_login_screen($error_msg = '') {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Login &laquo; YOURLS &raquo; Your Own URL Shortener | <?php echo YOURLS_SITE; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="copyright" content="Copyright &copy; 2008-<?php echo date('Y'); ?> YOURS" />
	<meta name="author" content="Ozh RICHARD, Lester Chan" />
	<meta name="description" content="Insert URL &laquo; YOURLS &raquo; Your Own URL Shortener' | <?php echo YOURLS_SITE; ?>" />
	<link rel="stylesheet" href="<?php echo YOURLS_SITE; ?>/css/style.css" type="text/css" media="screen" />
	<script src="<?php echo YOURLS_SITE; ?>/js/jquery-1.3.1.min.js" type="text/javascript"></script>
</head>
<body>
<div id="login">
	<form method="post" action="?"> <?php // reset any QUERY parameters ?>
		<p>
			<img src="<?php echo YOURLS_SITE; ?>/images/yourls-logo.png" alt="YOURLS" title="YOURLS" />
		</p>
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
</body>
</html>
<?php
die();
}