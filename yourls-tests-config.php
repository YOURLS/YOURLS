<?php

/*** YOURLS code base you want to test */
define( 'YOURLS_ABSPATH', '/home/you/yourls_directory' );

/*** MySQL settings */
define( 'YOURLS_DB_USER', 'root' );
define( 'YOURLS_DB_PASS', '' );
define( 'YOURLS_DB_NAME', 'yourls' );
define( 'YOURLS_DB_HOST', 'localhost' );
define( 'YOURLS_DB_PREFIX', 'yourls_' );

/*** Site options */
define( 'YOURLS_SITE', 'http://127.0.0.1/yourls_directory' );
define( 'YOURLS_HOURS_OFFSET', 0 ); 
define( 'YOURLS_LANG', '' ); 
define( 'YOURLS_UNIQUE_URLS', true );
define( 'YOURLS_PRIVATE', true );
define( 'YOURLS_COOKIEKEY', 'modify this text with something random' );

$yourls_user_passwords = array(
  'username' => 'password'
	);

define( 'YOURLS_URL_CONVERT', 36 );

$yourls_reserved_URL = array(
	'porn', 'faggot', 'sex', 'nigger', 'fuck', 'cunt', 'dick', 'gay',
);

/*** Personal settings would go after here. */
