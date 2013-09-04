<?php
/**
 * YOURLS Config for Travis (https://travis-ci.org/YOURLS/YOURLS)
 */
if( !defined( 'YOURLS_TESTS_CI' ) || YOURLS_TESTS_CI === false ) {
	define( 'YOURLS_TESTS_CI', true );

	/*** Code base and URL of that code base */
	if( defined( 'TRAVIS_REPO_SLUG' ) ) {
		define( 'YOURLS_ABSPATH', '/home/travis/build/' . TRAVIS_REPO_SLUG );
	} else {
		die( 'Not in Travis' );
	}
	define( 'YOURLS_SITE', 'http://localhost/YOURLS' );

	/*** MySQL settings */
	define( 'YOURLS_DB_USER', 'root' );
	define( 'YOURLS_DB_PASS', '' );
	define( 'YOURLS_DB_NAME', 'yourls_tests' );
	define( 'YOURLS_DB_HOST', 'localhost' );

	/*** Site options */
	define( 'YOURLS_LANG', 'fr_FR' ); 
}
