<?php
/**
 * YOURLS Config for CI
 */
define('YOURLS_TESTS_CI', getenv('CI') || false);
define('YOURLS_ABSPATH', getenv('GITHUB_WORKSPACE'));

define( 'YOURLS_SITE', 'http://localhost/YOURLS' );

/*** MySQL settings */
define( 'YOURLS_DB_USER', 'root' );
define( 'YOURLS_DB_PASS', 'secret' );
define( 'YOURLS_DB_NAME', 'yourls_tests' );
define( 'YOURLS_DB_HOST', '127.0.0.1:' . getenv('DB_PORT') );

/*** Site options */
define( 'YOURLS_PHP_BIN', 'php' );

/*** Standard YOURLS config. */

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
