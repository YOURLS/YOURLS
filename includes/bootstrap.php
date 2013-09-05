<?php
/**
 * YOURLS Unit Test. No, I don't know what I'm doing.
 */

require_once 'PHPUnit/Autoload.php';
require_once dirname( __FILE__ ) . '/utils.php';
require_once dirname( __FILE__ ) . '/install.php';

// Include config
$config_locations = array(
	dirname( dirname( __FILE__ ) ) . '/yourls-tests-config.php',        // manual, run locally
	dirname( dirname( dirname( __FILE__ ) ) ) . '/user/config.php',     // Travis, run from YOURLS/YOURLS
	dirname( dirname( __FILE__ ) ) . '/yourls-tests-config-travis.php', // Travis, run from YOURLS/YOURLS-unit-tests
);
foreach( $config_locations as $config ) {
	if( is_readable( $config ) ) {
		define( 'YOURLS_CONFIGFILE', $config );
		require_once YOURLS_CONFIGFILE;
		break;
	}
}
if( !defined( 'YOURLS_CONFIGFILE' ) ) {
	die( sprintf( "ERROR: config file missing. Current directory: %s\n", dirname( __FILE__ ) ) );
}

// Globalize some YOURLS variables because PHPUnit loads this inside a function
// See https://github.com/sebastianbergmann/phpunit/issues/325
global $ydb, $yourls_user_passwords, $yourls_reserved_URL,        // main object & config file
       $yourls_filters, $yourls_actions,                          // used by plugin API
       $yourls_locale, $yourls_l10n, $yourls_locale_formats,      // used by L10N API
       $yourls_allowedentitynames, $yourls_allowedprotocols,      // used by KSES
	   $ezsql_mysql_str, $ezsql_mysqli_str, $ezsql_pdo_str;       // used by ezSQL

// Initialize ourselves some constants that are typically user defined
$yourls_user_passwords = array(
	'yourls'  => 'travis-ci-test',
	'clear'   => 'somepassword',
	'md5'     => 'md5:31712:f6cae1f032b9ae81b233866f4aa791af', // password: "md5"
	'phpass'  => 'phpass:$2a$08$UbOIKE2oyh.shrjSkOJ3Au7zN2vqTkrhsmAFgaMPomfeS0S6xHjG6', // password: "phpass"
	'phpass2' => 'phpass:!2a!08$zzwkOxZHwup7qsfSuxdFXOzRBEOtKu4b15gXqceYJ23GOJtRq.yvO', // password: also "phpass" with YOURLS' internal char substitution
);
$yourls_reserved_URL = array(
	'porn', 'faggot', 'sex', 'nigger', 'fuck', 'cunt', 'dick', 'gay',
);
$yourls_user_consts = array(
	'YOURLS_HOURS_OFFSET'     => 5,
	'YOURLS_UNIQUE_URLS'      => true,
	'YOURLS_PRIVATE'          => true,
	'YOURLS_COOKIEKEY'        => 'I &hearts; unit tests',
	'YOURLS_URL_CONVERT'      => 62,
	'YOURLS_DB_PREFIX'        => 'yourls_',
	'YOURLS_NO_HASH_PASSWORD' => true, // prevents rewriting config.php with encrypted passwords
	'YOURLS_API'              => true, // prevents all internal redirections (login forms, etc)
);
foreach( $yourls_user_consts as $CONST => $value ) {
	if( !defined( $CONST ) )
		define( $CONST, $value );
}

// All set -- go.
yut_declare_yourls_consts();
yut_load_yourls();
yut_drop_all_tables_if_local();
yut_install_yourls();

// At this point, tests will start

