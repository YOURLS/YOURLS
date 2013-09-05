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

/*** Site options */
define( 'YOURLS_LANG', '' );  // Edit if you have installed a YOURLS translation, leave empty otherwise


