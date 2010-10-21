<?php
define( 'YOURLS_ADMIN', true );
require_once( dirname(dirname(__FILE__)).'/includes/load-yourls.php' );
yourls_maybe_require_auth();

// Handle plugin administration pages
if( isset( $_GET['page'] ) && !empty( $_GET['page'] ) ) {
	yourls_plugin_admin_page( $_GET['page'] );
}

// Handle activation/deactivation of plugins
if( isset( $_GET['action'] ) ) {

	// Check nonce
	yourls_verify_nonce( 'manage_plugins', $_REQUEST['nonce'] );

	// Check plugin file is valid
	if( isset( $_GET['plugin'] ) && yourls_validate_plugin_file( YOURLS_PLUGINDIR.'/'.$_GET['plugin'].'/plugin.php') ) {
		
		global $ydb;
		// Activate / Deactive
		switch( $_GET['action'] ) {
			case 'activate':
				$result = yourls_activate_plugin( $_GET['plugin'].'/plugin.php' );
				if( $result === true )
					yourls_redirect( yourls_admin_url( 'plugins.php?success=activated' ), 302 );

				break;
		
			case 'deactivate':
				$result = yourls_deactivate_plugin( $_GET['plugin'].'/plugin.php' );
				if( $result === true )
					yourls_redirect( yourls_admin_url( 'plugins.php?success=deactivated' ), 302 );

				break;
				
			default:
				$result = 'Unsupported action';
				break;
		}
	} else {
		$result = 'No plugin specified, or not a valid plugin';
	}
	
	yourls_add_notice( $result );
}

// Handle message upon succesfull (de)activation
if( isset( $_GET['success'] ) ) {
	if( $_GET['success'] == 'activated' OR $_GET['success'] == 'deactivated' ) {
		yourls_add_notice( 'Plugin '.$_GET['success'] );
	}
}

yourls_html_head( 'plugins', 'Manage Plugins' );
yourls_html_logo();
yourls_html_menu();
?>

	<h2>Plugins</h2>
	
	<?php
	$plugins = (array)yourls_get_plugins();
	$count = count( $plugins );
	$count_active = yourls_has_active_plugins();
	?>
	
	<p id="plugin_summary">You currently have <strong><?php echo $count.' '.yourls_plural( 'plugin', $count ); ?></strong> installed, and <strong><?php echo $count_active; ?></strong> activated</p>

	<table id="main_table" class="tblSorter" cellpadding="0" cellspacing="1">
	<thead>
		<tr>
			<th>Plugin Name</th>
			<th>Version</th>
			<th>Description</th>
			<th>Author</th>
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
		
		if( yourls_is_active_plugin( $file ) ) {
			$class = 'active';
			$action_url = yourls_nonce_url( 'manage_plugins', yourls_add_query_arg( array('action' => 'deactivate', 'plugin' => $plugindir ) ) );
			$action_anchor = 'Deactivate';
		} else {
			$class = 'inactive';
			$action_url = yourls_nonce_url( 'manage_plugins', yourls_add_query_arg( array('action' => 'activate', 'plugin' => $plugindir ) ) );
			$action_anchor = 'Activate';
		}
			
		// Other "Fields: Value" in the header? Get them too
		if( $plugin ) {
			foreach( $plugin as $extra_field=>$extra_value ) {
				$data['desc'] .= "<br/>\n<em>$extra_field</em>: $extra_value";
				unset( $plugin[$extra_value] );
			}
		}
		
		$data['desc'] .= "<br/><small>plugin file location: $file</small>";
		
		printf( "<tr class='plugin %s'><td class='plugin_name'><a href='%s'>%s</a></td><td class='plugin_version'>%s</td><td class='plugin_desc'>%s</td><td class='plugin_author'><a href='%s'>%s</a></td><td class='plugin_actions actions'><a href='%s'>%s</a></td></tr>",
			$class, $data['uri'], $data['name'], $data['version'], $data['desc'], $data['author_uri'], $data['author'], $action_url, $action_anchor
			);
		
	}
	?>
	</tbody>
	</table>
	
	<script type="text/javascript">
	yourls_defaultsort = 0;
	yourls_defaultorder = 0;
	<?php if ($count_active) { ?>
	$('#plugin_summary').append('<span id="toggle_plugins">filter</span>');
	$('#toggle_plugins').css({'background':'transparent url("../images/filter.gif") top left no-repeat','display':'inline-block','text-indent':'-9999px','width':'16px','height':'16px','margin-left':'3px','cursor':'pointer'})
		.attr('title', 'Toggle active/inactive plugins')
		.click(function(){
			$('#main_table tr.inactive').toggle();
		});
	<?php } ?>
	</script>
	
	<p>If something goes wrong after you activate a plugin and you cannot use YOURLS or access this page, simply rename or delete its directory, or rename the plugin file to something different than <code>plugin.php</code>.</p>

	
<?php yourls_html_footer(); ?>