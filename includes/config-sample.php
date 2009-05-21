<?php
// ** MySQL settings - You can get this info from your web host ** //
/** MySQL database username */
define('YOURLS_DB_USER', 'dbuser');

/** MySQL database password */
define('YOURLS_DB_PASS', 'dbpassword');

/** The name of the database for YOURLS */
define('YOURLS_DB_NAME', 'shorturl');

/** MySQL hostname */
define('YOURLS_DB_HOST', 'localhost');

/** MySQL URL table name. Don't change this if in doubt. */
define('YOURLS_DB_TABLE_URL', 'url');

/** MySQL Next ID table name. Don't change this if in doubt. */
define('YOURLS_DB_TABLE_NEXTDEC', 'next_id');

// ** Site settings ** //
/** Short domain URL, no trailing slash */
define('YOURLS_SITE', 'http://site.com'); //

/** Timezone GMT offset */
define('YOURLS_HOURS_OFFSET', 0); 

/** Private means protected with login/pass as defined below. Set to false for public usage. */
define('YOURLS_PRIVATE', true);

/** A random secret hash used to encrypt cookies. You don't have to remember it, make it long and complicated **/
define('YOURLS_COOKIEKEY', 'qQ4KhL_pu|s@Zm7n#%:b^{A[vhm');


/**  Username(s) and password(s) allowed to access the site */
$yourls_user_passwords = array(
	'username' => 'password',
	'username2' => 'password2'	// You can have one or more 'login'=>'password' lines
	);

/**
* URL shortening method: 36 or 62.
*
* 36: generates case insentitive lowercase keywords (ie: 13jkm)
* 62: generate case sensitive keywords (ie: 13jKm or 13JKm)
* Stick to one setting, don't change after you've created links as it will change all your short URLs!
* Base 36 should be picked. Use 62 only if you understand what it implies.
* Using base 62 means you *need* PHP extension BCCOMP
*/
define('YOURLS_URL_CONVERT', 36);

/** 
* Reserved keywords (so that generated URLs won't match them)
* Define here negative, unwanted or potentially misleading keywords.
*/
$yourls_reserved_URL = array(
	'porn', 'faggot', 'sex', 'nigger', 'fuck', 'cunt', 'dick', 'gay',
);


/******************** DO NOT EDIT ANYTHING ELSE ********************/

// Include everything except auth functions
require_once (dirname(__FILE__).'/functions.php');
require_once (dirname(__FILE__).'/functions-baseconvert.php');
require_once (dirname(__FILE__).'/class-mysql.php');
