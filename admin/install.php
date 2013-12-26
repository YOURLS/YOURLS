<?php
define( 'YOURLS_ADMIN', true );
define( 'YOURLS_INSTALLING', true );
require_once( dirname(dirname(__FILE__)).'/includes/load-yourls.php' );
require_once( YOURLS_INC.'/functions-install.php' );

$error   = array();
$warning = array();
$success = array();

// Check pre-requisites
if ( !yourls_check_database_version() ) {
	$error[] = yourls_s( '%s version is too old. Ask your server admin for an upgrade.', 'MySQL' );
	yourls_debug_log( 'MySQL version: ' . yourls_get_database_version() );
}

if ( !yourls_check_php_version() ) {
	$error[] = yourls_s( '%s version is too old. Ask your server admin for an upgrade.', 'PHP' );
	yourls_debug_log( 'PHP version: ' . phpversion() );
}

// Is YOURLS already installed ?
if ( yourls_is_installed() ) {
	$error[] = yourls__( 'YOURLS already installed.' );
	// check if .htaccess exists, recreate otherwise. No error checking.
	if( !file_exists( YOURLS_ABSPATH.'/.htaccess' ) ) {
		yourls_create_htaccess();
	}
}

// Start install if possible and needed
if ( isset($_REQUEST['install']) && count( $error ) == 0 ) {
	// Create/update .htaccess file
	if ( yourls_create_htaccess() ) {
		$success[] = yourls__( 'File <tt>.htaccess</tt> successfully created/updated.' );
	} else {
		$warning[] = yourls__( 'Could not write file <tt>.htaccess</tt> in YOURLS root directory. You will have to do it manually. See <a href="http://yourls.org/htaccess">how</a>.' );
	}

	// Create SQL tables
	$install = yourls_create_sql_tables();
	if ( isset( $install['error'] ) )
		$error = array_merge( $error, $install['error'] );
	if ( isset( $install['success'] ) )
		$success = array_merge( $success, $install['success'] );
}


// Start output
yourls_html_head( 'install', yourls__( 'Install YOURLS' ) );
?>
<div id="login">
	<form method="post" action="?"><?php // reset any QUERY parameters ?>
		<p>
			<img src="<?php yourls_site_url(); ?>/images/yourls-logo.png" alt="YOURLS" title="YOURLS" />
		</p>
		<?php
			// Print errors, warnings and success messages
			foreach ( array ('error', 'warning', 'success') as $info ) {
				if ( count( $$info ) > 0 ) {
					echo "<ul class='$info'>";
					foreach( $$info as $msg ) {
						echo '<li>'.$msg."</li>\n";
					}
					echo '</ul>';
				}
			}

			// Display install button or link to admin area if applicable
			if( !yourls_is_installed() && !isset($_REQUEST['install']) ) {
				echo '<p style="text-align: center;"><input type="submit" name="install" value="' . yourls__( 'Install YOURLS') .'" class="button" /></p>';
			} else {
				if( count($error) == 0 )
					echo '<p style="text-align: center;">&raquo; <a href="'.yourls_admin_url().'" title="' . yourls__( 'YOURLS Administration Page') . '">' . yourls__( 'YOURLS Administration Page') . '</a></p>';
			}
		?>
	</form>
</div>
<?php yourls_html_footer(); ?>
