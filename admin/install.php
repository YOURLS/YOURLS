<?php
define( 'YOURLS_INSTALLING', true );
define( 'YOURLS_ADMIN', true );
require_once( dirname(dirname(__FILE__)).'/includes/load-yourls.php' );
require_once( YOURLS_INC.'/functions-install.php' );

$error = array();
$warning = array();
$success = array();

// Check pre-requisites
if ( !yourls_check_database_version() )
	$error[] = 'MySQL version is too old. Ask your server admin for an upgrade.';

if ( !yourls_check_php_version() )
	$error[] = 'PHP version is too old. Ask your server admin for an upgrade.';

// Check additional stuff
if ( !yourls_check_curl() )
	$warning[] = 'PHP extension <tt>cURL</tt> is not installed. This server won\'t be able to use the remote API';

// Is YOURLS already installed ?
if ( yourls_is_installed() ) {
	$error[] = 'YOURLS already installed.';
	// check if .htaccess exists, recreate otherwise. No error checking.
	if( !file_exists( YOURLS_ABSPATH.'/.htaccess' ) ) {
		yourls_create_htaccess();
	}
}

// Start install if possible and needed
if ( isset($_REQUEST['install']) && count( $error ) == 0 ) {
	// Create/update .htaccess file
	if ( yourls_create_htaccess() ) {
		$success[] = 'File <tt>.htaccess</tt> successfully created/updated.';
	} else {
		$warning[] = 'Could not write file <tt>.htaccess</tt> in YOURLS root directory. You will have to do it manually. See <a href="http://yourls.org/htaccess">how</a>.';
	}

	// Create SQL tables
	$install = yourls_create_sql_tables();
	if ( isset( $install['error'] ) )
		$error = array_merge( $error, $install['error'] );
	if ( isset( $install['success'] ) )
		$success = array_merge( $success, $install['success'] );
}


// Start output
yourls_html_head( 'install', 'Install YOURLS' );
?>
<div id="login">
	<form method="post" action="?"><?php // reset any QUERY parameters ?>
		<p>
			<img src="<?php echo YOURLS_SITE; ?>/images/yourls-logo.png" alt="YOURLS" title="YOURLS" />
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
				echo '<p>&nbsp;</p><p style="text-align: center;"><input type="submit" name="install" value="Install YOURLS" class="button" /></p>';
			} else {
				if( count($error) == 0 )
					echo '<p>&nbsp;</p><p style="text-align: center;">&raquo; <a href="'.yourls_admin_url().'" title="YOURLS Administration Page">YOURLS Administration Page</a></p>';
			}
		?>
	</form>
</div>
<?php yourls_html_footer(); ?>
