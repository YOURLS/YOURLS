<?php
// MySQL settings : auth
define('YOURLS_DB_USER', 'dbuser');
define('YOURLS_DB_PASS', 'dbpassword');
define('YOURLS_DB_NAME', 'shorturl');
define('YOURLS_DB_HOST', 'localhost');

// MySQL settings : table names
define('YOURLS_DB_TABLE_URL', 'url');
define('YOURLS_DB_TABLE_NEXTDEC', 'next_id');

// Site settings
define('YOURLS_SITE', 'http://site.com'); // Short domain URL, no trailing slash
define('YOURLS_HOURS_OFFSET', 0); // Sort of timezone, number of hours ahead of GMT
define('YOURLS_PRIVATE', true); // Private means protected with login/pass as defined below. Set to false for public
$yourls_user_passwords = array(
	'joe' => 'mypass',
	'toto' => '123'
	); // array of login/password to access the site (can be just one 'key'=>'value')

// URL shortening method: 36 or 62.
// 		36: generates case insentitive lowercase keywords (ie: 13jkm)
// 		64: generate case sensitive keywords (ie: 13jKm or 13JKm)
// 		Stick to one setting, don't change after you've created links as it will change all your short URLs!
// 		Base 36 should be picked. Use 62 only if you understand what it implies.
//		Using base 62 means you *need* PHP extension BCCOMP
define('YOURLS_URL_CONVERT', 36);

// Reserved keywords (so that generated URLs won't match them)
// 		Define here negative, unwanted or potentially misleading keywords
$yourls_reserved_URL = array(
	'porn', 'faggot', 'sex', 'nigger', 'fuck', 'cunt', 'dick', 'gay',
);

/******************** DO NOT EDIT ANYTHING ELSE ********************/

// Include everything except auth functions
require_once 'functions.php';
require_once 'functions-baseconvert.php';
require_once 'class-mysql.php';

