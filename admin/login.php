<?php
### Require Files
require_once '../includes/config.php';


### Variables
$error_msg = '';


### Logout Or If Logged In Already, Redirect To /admin/
if($_GET['mode'] == 'logout') {
	setcookie('yourls_username', null, time() - 3600);
	$error_msg = 'Logout successfully';
} elseif(yourls_is_valid_user()) {
	header('Location: '.YOURLS_SITE.'/admin/');
	exit();
}


### Process Login
if(isset($_POST['submit']) && $_POST['submit'] == 'Login') {
	foreach($yourls_user_passwords as $user => $password) {
		if($user == $_POST['username'] && $password == $_POST['password']) {
			setcookie('yourls_username', $user, time() + (60*60*24*7));
			header('Location: '.YOURLS_SITE.'/admin/');
			exit();
		} else {
			$error_msg = 'Invalid username or password';
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Login &laquo; YOURLS &raquo; Your Own URL Shortener | <?php echo YOURLS_SITE; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="copyright" content="Copyright &copy; 2008-<?php echo date('Y'); ?> YOURS" />
	<meta name="author" content="Richard Ozh, Lester Chan" />
	<meta name="description" content="Insert URL &laquo; YOURLS &raquo; Your Own URL Shortener' | <?php echo YOURLS_SITE; ?>" />
	<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" />
	<script src="../js/jquery-1.3.1.min.js" type="text/javascript"></script>
</head>
<body>
<div id="login">
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<p>
			<img src="../images/yourls-logo.png" alt="YOURLS" title="YOURLS" />
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
</div>
</body>
</html>