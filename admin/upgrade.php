<?php
define( 'YOURLS_ADMIN', true );
define( 'YOURLS_NO_UPGRADE_CHECK', true ); // Bypass version checking to prevent loop
require_once( dirname(dirname(__FILE__)).'/includes/load-yourls.php' );
require_once( YOURLS_INC.'/functions-upgrade.php' );
require_once( YOURLS_INC.'/functions-install.php' );
yourls_maybe_require_auth();

yourls_html_head( 'upgrade', 'Upgrade YOURLS' );
yourls_html_logo();
yourls_html_menu();
?>
		<h2>Upgrade YOURLS</h2>
<?php

// Check if upgrade is needed
if ( !yourls_upgrade_is_needed() ) {
	echo '<p>Upgrade not required. Go <a href="'.yourls_admin_url('index.php').'">back to play</a>!</p>';


} else {
	/*
	step 1: create new tables and populate them, update old tables structure, 
	step 2: convert each row of outdated tables if needed
	step 3: - if applicable finish updating outdated tables (indexes etc)
	        - update version & db_version in options, this is all done!
	*/
	
	// From what are we upgrading?
	if ( isset( $_GET['oldver'] ) && isset( $_GET['oldsql'] ) ) {
		$oldver = yourls_sanitize_version( $_GET['oldver'] );
		$oldsql = yourls_sanitize_version( $_GET['oldsql'] );
	} else {
		list( $oldver, $oldsql ) = yourls_get_current_version_from_sql();
	}
	
	// To what are we upgrading ?
	$newver = YOURLS_VERSION;
	$newsql = YOURLS_DB_VERSION;
	
	// Verbose & ugly details
	$ydb->show_errors = true;
	
	// Let's go
	$step = ( isset( $_GET['step'] ) ? intval( $_GET['step'] ) : 0 );
	switch( $step ) {

		default:
		case 0:
			echo "
			<p>Your current installation needs to be upgraded.</p>
			<p>Please, pretty please, it is recommended that
			you <strong>backup</strong> your database<br/>(you should do this regularly anyway)</p>
			<p>Nothing awful <em>should</em> happen, but this doesn't mean it <em>won't</em> happen, right? ;)</p>
			<p>On every step, if <span class='error'>something goes wrong</span>, you'll see a message and hopefully a way to fix</p>
			<p>If everything goes too fast and you cannot read, <span class='success'>good for you</span>, let it go :)</p>
			<p>Once you are ready, press Upgrade!</p>
			<form action='upgrade.php?' method='get'>
			<input type='hidden' name='step' value='1' />
			<input type='hidden' name='oldver' value='$oldver' />
			<input type='hidden' name='newver' value='$newver' />
			<input type='hidden' name='oldsql' value='$oldsql' />
			<input type='hidden' name='newsql' value='$newsql' />
			<input type='submit' class='primary' value='Upgrade' />
			</form>";
			
			break;
			
		case 1:
		case 2:
			$upgrade = yourls_upgrade( $step, $oldver, $newver, $oldsql, $newsql );
			break;
			
		case 3:
			$upgrade = yourls_upgrade( 3, $oldver, $newver, $oldsql, $newsql );
			$admin = yourls_admin_url('index.php');
			echo "
			<p>Your installation is now up to date !</p>
			<p>Go back to <a href='$admin'>the admin interface</a></p>
			";
	}
	
}

		
?>	

<?php yourls_html_footer(); ?>
