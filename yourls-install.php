<?php
define( 'YOURLS_ADMIN', true );
define( 'YOURLS_INSTALLING', true );
require_once dirname( __FILE__ ) . '/includes/load-yourls.php';
require_once YOURLS_INC . '/functions-install.php';

$danger  = array();
$warning = array();
$success = array();

// Check pre-requisites
if ( !yourls_check_database_version() ) {
	$danger[] = yourls_s( '%s version is too old. Ask your server admin for an upgrade.', 'MySQL' );
	yourls_debug_log( 'MySQL version: ' . yourls_get_database_version() );
}

if ( !yourls_check_php_version() ) {
	$danger[] = yourls_s( '%s version is too old. Ask your server admin for an upgrade.', 'PHP' );
	yourls_debug_log( 'PHP version: ' . phpversion() );
}

// Is YOURLS already installed ?
if ( yourls_is_installed() ) {
	$warning[] = yourls__( 'YOURLS already installed.' );
	// check if .htaccess exists, recreate otherwise. No error checking.
	if( !file_exists( YOURLS_ABSPATH.'/.htaccess' ) ) {
		yourls_create_htaccess();
	}
}

// Start install if possible and needed
if ( isset($_REQUEST['install']) && count( $danger ) == 0 ) {
	// Create/update .htaccess file
	if ( yourls_create_htaccess() ) {
		$success[] = yourls__( 'File <code>.htaccess</code> successfully created/updated.' );
	} else {
		$warning[] = yourls__( 'Could not write file <code>.htaccess</code> in YOURLS root directory. You will have to do it manually. See <a href="http://yourls.org/htaccess">how</a>.' );
	}

	// Create SQL tables
	$install = yourls_create_sql_tables();
	if ( isset( $install['error'] ) )
		$danger = array_merge( $danger, $install['error'] );
	if ( isset( $install['success'] ) )
		$success = array_merge( $success, $install['success'] );
}


// Start output
yourls_html_head( 'install', yourls__( 'Install YOURLS' ) );
?>
<div class="install-form">
<?php yourls_html_logo( false ); ?>
	<form method="post" action="?"><?php // reset any QUERY parameters ?>
		<?php
			// Print errors, warnings and success messages
			foreach ( array ('error', 'warning', 'success') as $info ) {
				if ( count( $$info ) > 0 ) {
					echo "<div class='alert alert-$info'><ul>";
					foreach( $$info as $msg ) {
						echo '<li>'.$msg."</li>";
					}
					echo '</ul></div>';
				}
			}

			// Display install button or link to admin area if applicable
			if( !yourls_is_installed() && !isset( $_REQUEST['install'] ) ) {
				echo '<input type="submit" name="install" value="' . yourls__( 'Install YOURLS' ) . '" class="start" />';
			} else {
				echo '<a class="start" href="'.yourls_admin_url().'" title="' . yourls__( 'YOURLS Administration Page' ) . '">' . yourls__( 'YOURLS Administration Page') . '</a>';
			}
		?>
	</form>
</div>
