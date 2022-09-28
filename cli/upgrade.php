<?php
define( 'YOURLS_ADMIN', true );
define( 'YOURLS_UPGRADING', true );
require_once( dirname( __DIR__ ).'/includes/load-yourls.php' );

if (isset($_SERVER["HTTP_HOST"])) {
    die("This script can not be run from within a web browser.");
}

if ( yourls_upgrade_is_needed() ) {
	echo yourls_s( 'Upgrade not required. Already fully upgraded.' );
} else {
	/*
	step 1: create new tables and populate them, update old tables structure,
	step 2: convert each row of outdated tables if needed
	step 3: - if applicable finish updating outdated tables (indexes etc)
	        - update version & db_version in options, this is all done!
	*/

    list( $oldver, $oldsql ) = yourls_get_current_version_from_sql();

	// To what are we upgrading ?
	$newver = YOURLS_VERSION;
	$newsql = YOURLS_DB_VERSION;

	// Verbose & ugly details
	yourls_debug_mode(true);

    echo_bold(yourls_translate( 'Your current installation needs to be upgraded.' . PHP_EOL ));
    echo yourls_translate( 'Please, pretty please, it is recommended that you ');
    echo_bold(yourls_translate( 'backup your database' . PHP_EOL ));
    echo yourls_translate( '(you should do this regularly anyway)' . PHP_EOL );
    echo yourls_translate( 'Nothing awful ');
    echo_bold(yourls_translate( 'should' . ' '));
    echo yourls_translate( " happen, but this doesn't mean it ");
    echo_bold(yourls_translate("won't" . ' ' ));
    echo yourls_translate( 'happen, right? ;)' . PHP_EOL );
    echo yourls_translate( 'On every step, if ');
    echo_error( yourls_translate( 'something goes wrong' . ', ' ));
    echo yourls_translate( "you'll see a message and hopefully a way to fix." . PHP_EOL );
    echo yourls_translate( 'If everything goes too fast and you cannot read, ');
    echo_success( yourls_translate('good for you' . ', ' ));
    echo yourls_translate( 'let it go :)' . PHP_EOL );
    echo yourls_translate( 'Would you like to proceed? (y/N)' );

    $input = readline();
    $input = strtoupper($input);

    if ($input == 'Y') {
        yourls_upgrade( 1, $oldver, $newver, $oldsql, $newsql, true );
    }

}
