<?php
if(!yourls_is_valid_user()) {
	header('Location: '.YOURLS_SITE.'/admin/login.php');
	exit();
}