<?php
/**
 * YOURLS Unit Test. No, I don't know what I'm doing.
 */

if( is_readable( 'PHPUnit/Autoload.php' ) )
    require_once 'PHPUnit/Autoload.php';
elseif( is_readable( dirname( dirname( __FILE__ ) ) .  '/vendor/phpunit/phpunit/PHPUnit/Autoload.php' ) )
    require_once dirname( dirname( __FILE__ ) ) .  '/vendor/phpunit/phpunit/PHPUnit/Autoload.php';
elseif( is_readable( dirname( dirname( __FILE__ ) ) .  'YOURLS/includes/vendor/phpunit/phpunit/PHPUnit/Autoload.php' ) )
    require_once dirname( dirname( __FILE__ ) ) .  'YOURLS/includes/vendor/phpunit/phpunit/PHPUnit/Autoload.php';
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
       $yourls_allowedentitynames, $yourls_allowedprotocols;      // used by KSES


// Initialize ourselves some constants that are typically user defined

$yourls_reserved_URL = array(
	'porn', 'sex', 'nigger', 'fuck', 'cunt', 'dick',
);
$yourls_user_consts = array(
	'YOURLS_HOURS_OFFSET'     => 5,
	'YOURLS_UNIQUE_URLS'      => true,
	'YOURLS_PRIVATE'          => true,
	'YOURLS_COOKIEKEY'        => 'I &hearts; unit tests',
	'YOURLS_URL_CONVERT'      => 62,
	'YOURLS_DB_PREFIX'        => 'yourls_',
	'YOURLS_NO_HASH_PASSWORD' => true, // prevents rewriting config.php with encrypted passwords
    'YOURLS_LANG'             => 'fr_FR', // locale of a sample translation file in the data dir
);
foreach( $yourls_user_consts as $CONST => $value ) {
	if( !defined( $CONST ) )
		define( $CONST, $value );
}

define( 'YOURLS_TESTDATA_DIR', dirname( dirname( __FILE__ ) ) . '/data' );

// All set -- go.
yut_declare_yourls_consts();
yut_load_yourls();
yut_drop_all_tables_if_local();
yut_install_yourls();

// Compute 1 md5 and 2 phpass hashed passwords from a random password
$random_password = rand_str();
$salt = rand( 10000, 99999 );
$md5  = 'md5:' . $salt . ':' . md5( $salt . $random_password );
$phpassword_1 = 'phpass:' . str_replace( '$', '!', yourls_phpass_hash( $random_password ) );
$phpassword_2 = 'phpass:' . yourls_phpass_hash( $random_password );

$yourls_user_passwords = array(
	'yourls'  => 'travis-ci-test',
	'clear'   => 'somepassword',
	'md5'     => $md5,          // password: $random_password
	'phpass'  => $phpassword_1, // password: $random_password
	'phpass2' => $phpassword_2, // password: also $random_password but without YOURLS internal char substitution
    '1994'    => '@$*',
    'special' => 'lol .\+*?[^]$(){}=!<>|:-/',
    'quote1'  => '"ahah"',
    'quote2'  => "'ahah'",
    'utf8fun' => 'أنا أحب النقانق',
);

// PHPUnit 6 compatibility for previous versions
if ( class_exists( 'PHPUnit\Runner\Version' ) && version_compare( PHPUnit\Runner\Version::id(), '6.0', '>=' ) ) {
    class_alias( 'PHPUnit\Framework\Assert',        'PHPUnit_Framework_Assert' );
    class_alias( 'PHPUnit\Framework\TestCase',      'PHPUnit_Framework_TestCase' );
    class_alias( 'PHPUnit\Framework\Error\Error',   'PHPUnit_Framework_Error' );
    class_alias( 'PHPUnit\Framework\Error\Notice',  'PHPUnit_Framework_Error_Notice' );
    class_alias( 'PHPUnit\Framework\Error\Warning', 'PHPUnit_Framework_Error_Warning' );
}

// At this point, tests will start
