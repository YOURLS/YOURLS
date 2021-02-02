<?php
/**
 * YOURLS Config for local unit tests. Copy this file to yourls-test-config.php
 */

/*** YOURLS code base you want to test */
define( 'YOURLS_ABSPATH', '/home/you/yourls_directory' );

/*** URL of that YOURLS code base */
define( 'YOURLS_SITE', 'http://127.0.0.1/yourls_directory' );

/*** MySQL settings */
define( 'YOURLS_DB_USER', 'your DB username' );
define( 'YOURLS_DB_PASS', 'your DB password' );
define( 'YOURLS_DB_NAME', 'DB name for tests -- an empty one' ); // Must be an EMPTY DATABASE: everything will be erased
define( 'YOURLS_DB_HOST', 'localhost' );

/*** PHP binary - edit if the executable binary is not in system path and put full path ie 'c:/php/php.exe' */
define( 'YOURLS_PHP_BIN', 'php' );

/*** Most likely, don't edit anything else. Pretty much standard YOURLS config. */

define('YOURLS_HOURS_OFFSET', 5);
define('YOURLS_UNIQUE_URLS',  true);
define('YOURLS_PRIVATE',  true);
define('YOURLS_COOKIEKEY',  'I &hearts; unit tests');
define('YOURLS_URL_CONVERT',  62);
define('YOURLS_DB_PREFIX',  'yourls_');
define('YOURLS_FLOOD_DELAY_SECONDS',  0);
define('YOURLS_FLOOD_IP_WHITELIST',  '');
define('YOURLS_NO_HASH_PASSWORD',  true); // prevents rewriting config.php with encrypted passwords
define('YOURLS_LANG',  'fr_FR'); // locale of a sample translation file in the data dir
define('YOURLS_DEBUG', true);

$yourls_reserved_URL = array(
	'porn', 'sex', 'nigger', 'fuck', 'cunt', 'dick',
);

$yourls_user_passwords = array(
	'yourls'  => 'secret-ci-test',
	'clear'   => 'somepassword',
	'md5'     => 'md5:12373:e52e4488f79a740bd341f229e3c163c8',                          // password: '3cd6944201fa7bbc5e0fe852e36b1096' with md5 and salt
	'phpass'  => 'phpass:!2a!08!T1ptMlBSxu7g3odpbUXgd.9wbKvg8k7cJt.HbwSqUNrlLPudWnf/6', // password: '3cd6944201fa7bbc5e0fe852e36b1096' with PHPass
	'phpass2' => 'phpass:$2a$08$gt2bnpfUyuCX3hrp0RPOieFR1RwBnLsMzpq/NvPXwCdV3LqI3RGYi', // password: also '3cd6944201fa7bbc5e0fe852e36b1096' but without YOURLS internal char substitution
    '1994'    => '@$*',
    'special' => 'lol .\+*?[^]$(){}=!<>|:-/',
    'quote1'  => '"ahah"',
    'quote2'  => "'ahah'",
    'utf8fun' => 'أنا أحب النقانق',
);
