<?php
define( 'YOURLS_ADMIN', true );
require_once( dirname(dirname(__FILE__)).'/includes/load-yourls.php' );
yourls_maybe_require_auth();

// Handle activation/deactivation of plugins
if( isset( $_GET['action'] ) ) {

	// Check nonce
	if( !isset( $_GET['nonce'] ) or !yourls_verify_nonce( $_GET['nonce'], 'manage_plugins' ) )
		yourls_die( 'Unauthorized action or expired link', 'Error', 403 );

	// Check plugin file is valid
	if( isset( $_GET['plugin'] ) && yourls_validate_plugin_file( YOURLS_PLUGINDIR.'/'.$_GET['plugin'].'/plugin.php') ) {
		
		global $ydb;
		// Activate / Deactive
		switch( $_GET['action'] ) {
			case 'activate':
				$result = yourls_activate_plugin( $_GET['plugin'].'/plugin.php' );
				if( $result === true )
					yourls_redirect( yourls_admin_url( 'plugins.php?success=activated' ) );

				break;
		
			case 'deactivate':
				$result = yourls_deactivate_plugin( $_GET['plugin'].'/plugin.php' );
				if( $result === true )
					yourls_redirect( yourls_admin_url( 'plugins.php?success=deactivated' ) );

				break;
				
			default:
				$result = 'Unsupported action';
				break;
		}
	} else {
		$result = 'No plugin specified, or not a valid plugin';
	}
	
	$result = yourls_notice_box( $result );
	yourls_add_action('admin_notices', create_function( '', "echo '$result';" ) );
}

// Handle message upon succesfull (de)activation
if( isset( $_GET['success'] ) ) {
	if( $_GET['success'] == 'activated' OR $_GET['success'] == 'deactivated' ) {
		$result = yourls_notice_box( 'Plugin '.$_GET['success'] );
		yourls_add_action('admin_notices', create_function( '', "echo '$result';" ) );
	}
}


// TODO: UPDATE PLUGIN LIST IF ONE IS MISSING ?

yourls_html_head( 'plugins' );
yourls_html_logo();
yourls_html_menu();
?>

	<h2>Plugins</h2>
	
	<?php
	$plugins = (array)yourls_get_plugins();
	$count = count( $plugins );
	$count_active = yourls_has_active_plugins();
	?>
	
	<p>You currently have <strong><?php echo $count.' '.yourls_plural( 'plugin', $count ); ?></strong> installed, and <strong><?php echo $count_active; ?></strong> activated.</p>

	<table id="tblUrl" class="tblSorter" cellpadding="0" cellspacing="1">
	<thead>
		<tr>
			<th>Plugin Name</th>
			<th>Version</th>
			<th>Author</th>
			<th>Description</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	<?php
	
	$nonce = yourls_create_nonce( 'manage_plugins' );
	
	foreach( $plugins as $file=>$plugin ) {
		
		// default fields to read from the plugin header
		$fields = array(
			'name'       => 'Plugin Name',
			'uri'        => 'Plugin URI',
			'desc'       => 'Description',
			'version'    => 'Version',
			'author'     => 'Author',
			'author_uri' => 'Author URI'
		);
		
		// Loop through all default fields, get value if any and reset it
		foreach( $fields as $field=>$value ) {
			if( $plugin[ $value ] ) {
				$data[ $field ] = $plugin[ $value ];
			} else {
				$data[ $field ] = '(no info)';
			}
			unset( $plugin[$value] );
		}
		
		$plugindir = trim( dirname( $file ), '/' );
		$action = yourls_is_active_plugin( $file ) ?
			"<a href='?action=deactivate&plugin=$plugindir&nonce=$nonce'>Deactivate</a>" :
			"<a href='?action=activate&plugin=$plugindir&nonce=$nonce'>Activate</a>" ;
	
		// Other "Fields: Value" in the header? Get them too
		if( $plugin ) {
			foreach( $plugin as $extra_field=>$extra_value ) {
				$data['desc'] .= "<br/>\n<em>$extra_field</em>: $extra_value";
				unset( $plugin[$extra_value] );
			}
		}
		
		$data['desc'] .= "<br/><small>plugin location: $file</small>";
		
		printf( "<tr><td><a href='%s'>%s</a></td><td>%s</td><td>%s</td><td><a href='%s'>%s</a></td><td>%s</td></tr>",
			$data['uri'], $data['name'], $data['version'], $data['desc'], $data['author_uri'], $data['author'], $action
			);
		
	}
	?>
	</tbody>
	</table>
	
	<script type="text/javascript">
	yourls_defaultsort = 0;
	yourls_defaultorder = 0;
	</script>
	
	<p>If something goes wrong after you activate a plugin, simply delete its directory, or rename the plugin file to something different than <code>plugin.php</code>.

	
<?php yourls_html_footer(); ?>