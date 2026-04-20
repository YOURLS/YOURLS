<?php
/**
 * YOURLS Config for unit tests (Docker dev and CI)
 *
 * Environment variables override defaults. Defaults match the Docker dev setup.
 */

define('YOURLS_TESTS_CI', (bool) getenv('CI'));
define('YOURLS_ABSPATH', getenv('YOURLS_ABSPATH') ?: '/var/www/html');
define('YOURLS_SITE', getenv('YOURLS_SITE') ?: 'http://localhost');

/*** MySQL settings */
define('YOURLS_DB_USER', getenv('YOURLS_DB_USER') ?: 'yourlsUser');
define('YOURLS_DB_PASS', getenv('YOURLS_DB_PASS') ?: 'yourlsUserPassword');
define('YOURLS_DB_NAME', getenv('YOURLS_DB_NAME') ?: 'yourlsDB');
define('YOURLS_DB_HOST', getenv('YOURLS_DB_HOST') ?: 'db-test');

/*** Standard test config */
define('YOURLS_PHP_BIN', 'php');
define('YOURLS_HOURS_OFFSET', 5);
define('YOURLS_UNIQUE_URLS', true);
define('YOURLS_PRIVATE', true);
define('YOURLS_COOKIEKEY', 'I &hearts; unit tests');
define('YOURLS_URL_CONVERT', 62);
define('YOURLS_DB_PREFIX', 'yourls_');
define('YOURLS_FLOOD_DELAY_SECONDS', 0);
define('YOURLS_FLOOD_IP_WHITELIST', '');
define('YOURLS_LANG', 'fr_FR');
define('YOURLS_DEBUG', true);

$yourls_reserved_URL = array(
    'porn', 'sex', 'nigger', 'fuck', 'cunt', 'dick',
);

$yourls_user_passwords = array(
    'yourls'  => 'secret-ci-test',
    'clear'   => 'somepassword',
    'md5'     => 'md5:12373:e52e4488f79a740bd341f229e3c163c8',                          // password: '3cd6944201fa7bbc5e0fe852e36b1096' with md5 and salt
    'phpass'  => 'phpass:!2a!08!T1ptMlBSxu7g3odpbUXgd.9wbKvg8k7cJt.HbwSqUNrlLPudWnf/6', // password: '3cd6944201fa7bbc5e0fe852e36b1096' with old PHPass library
    'phpass2' => 'phpass:$2a$08$gt2bnpfUyuCX3hrp0RPOieFR1RwBnLsMzpq/NvPXwCdV3LqI3RGYi', // password: also '3cd6944201fa7bbc5e0fe852e36b1096' with old PHPass lib but without YOURLS internal char substitution
    'phpass3' => 'phpass:!2y!10!.FjK.vQR0JVivkMwckiiIesFUFhtMxX/f9pes.i/ccp/W0IuUSxPW', // password: also '3cd6944201fa7bbc5e0fe852e36b1096' hashed with password_hash
    'phpass4' => 'phpass:$2y$10$KPP/sv7pv0JL2GwcixNBfuXRPElC4KxQUgetqBfCboB.q30yKwKG6', // password: also '3cd6944201fa7bbc5e0fe852e36b1096' hashed with password_hash but without YOURLS internal char substitution
    '1994'    => '@$*',
    'special' => 'lol .\+*?[^]$(){}=!<>|:-/',
    'quote1'  => '"ahah"',
    'quote2'  => "'ahah'",
    'utf8fun' => 'أنا أحب النقانق',
);
