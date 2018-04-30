<?php
define( 'YOURLS_ADMIN', true );
define( 'YOURLS_UPGRADING', true );
require_once( dirname( __DIR__ ).'/includes/load-yourls.php' );
require_once( YOURLS_INC.'/functions-upgrade.php' );
require_once( YOURLS_INC.'/functions-install.php' );
yourls_maybe_require_auth();

yourls_html_head( 'upgrade', yourls__( 'Upgrade YOURLS' ) );
yourls_html_logo();
yourls_html_menu();
?>
		<h2><?php yourls_e( 'Upgrade YOURLS' ); ?></h2>
<?php

// Check if upgrade is needed
if ( !yourls_upgrade_is_needed() ) {
	echo '<p>' . yourls_s( 'Upgrade not required. Go <a href="%s">back to play</a>!', yourls_admin_url('index.php') ) . '</p>';


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
	yourls_debug_mode(true);

	// Let's go
	$step = ( isset( $_GET['step'] ) ? intval( $_GET['step'] ) : 0 );
	switch( $step ) {

		default:
		case 0:
			?>
			<p><?php yourls_e( 'Your current installation needs to be upgraded.' ); ?></p>
			<p><?php yourls_e( 'Please, pretty please, it is recommended that you <strong>backup</strong> your database<br/>(you should do this regularly anyway)' ); ?></p>
			<p><?php yourls_e( "Nothing awful <em>should</em> happen, but this doesn't mean it <em>won't</em> happen, right? ;)" ); ?></p>
			<p><?php yourls_e( "On every step, if <span class='error'>something goes wrong</span>, you'll see a message and hopefully a way to fix." ); ?></p>
			<p><?php yourls_e( 'If everything goes too fast and you cannot read, <span class="success">good for you</span>, let it go :)' ); ?></p>
			<p><?php yourls_e( 'Once you are ready, press "Upgrade" !' ); ?></p>
			<?php
			echo "
			<form action='upgrade.php?' method='get'>
			<input type='hidden' name='step' value='1' />
			<input type='hidden' name='oldver' value='$oldver' />
			<input type='hidden' name='newver' value='$newver' />
			<input type='hidden' name='oldsql' value='$oldsql' />
			<input type='hidden' name='newsql' value='$newsql' />
			<input type='submit' class='primary' value='" . yourls_esc_attr__( 'Upgrade' ) . "' />
			</form>";

			break;

		case 1:
		case 2:
			$upgrade = yourls_upgrade( $step, $oldver, $newver, $oldsql, $newsql );
			break;

		case 3:
			$upgrade = yourls_upgrade( 3, $oldver, $newver, $oldsql, $newsql );
			echo '<p>' . yourls__( 'Your installation is now up to date ! ' ) . '</p>';
			echo '<p>' . yourls_s( 'Go back to <a href="%s">the admin interface</a>', yourls_admin_url('index.php') ) . '</p>';
	}

}


?>

<?php yourls_html_footer(); ?>
