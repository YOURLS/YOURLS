<?php
define( 'YOURLS_ADMIN', true );
require_once( dirname(dirname(__FILE__)).'/includes/load-yourls.php' );
yourls_maybe_require_auth();

yourls_html_head( 'plugins' );
yourls_html_logo();
yourls_html_menu();
?>

	<h2>Plugins</h2>
	
	<?php
	$plugins = (array)yourls_get_plugins();
	$count = count( $plugins );
	?>
	
	<p>You currently have <strong><?php echo $count.' '.yourls_plural( 'plugin', $count ); ?></strong> activated on your setup.</p>

	<table id="tblUrl" class="tblSorter" cellpadding="0" cellspacing="1">
	<thead>
		<tr>
			<th>Plugin Name</th>
			<th>Version</th>
			<th>Description</th>
			<th>Author</th>
		</tr>
	</thead>
	<tbody>
	<?php
	
	foreach( $plugins as $location=>$plugin ) {
		
		// default fields to read from the plugin header
		$fields = array(
			'name'       => 'Plugin Name',
			'uri'        => 'Plugin URI',
			'desc'       => 'Description',
			'version'    => 'Version',
			'author'     => 'Author',
			'author_uri' => 'Author URI'
		);
		
		$location = str_replace( dirname( YOURLS_ABSPATH ) .'/', '', $location );
		
		// Loop through all default fields, get value if any and reset it
		foreach( $fields as $field=>$value ) {
			if( $plugin[ $value ] ) {
				$data[ $field ] = $plugin[ $value ];
			} else {
				$data[ $field ] = '(no info)';
			}
			unset( $plugin[$value] );
		}
		
		// Other "Fields: Value" in the header? Get them too
		if( $plugin ) {
			foreach( $plugin as $extra_field=>$extra_value ) {
				$data['desc'] .= "<br/>\n<em>$extra_field</em>: $extra_value";
				unset( $plugin[$extra_value] );
			}
		}
		
		$data['desc'] .= "<br/><small>plugin location: $location</small>";
		
		printf( "<tr><td><a href='%s'>%s</a></td><td>%s</td><td>%s</td><td><a href='%s'>%s</a></td></tr>",
			$data['uri'], $data['name'], $data['version'], $data['desc'], $data['author_uri'], $data['author']
			);
		
	}
	?>
	</tbody>
	</table>
	
	<script type="text/javascript">
	yourls_defaultsort = 0;
	yourls_defaultorder = 0;
	</script>
	
	<p>To deactivate a plugin, simply delete its directory, or rename the plugin file to something different than <code>plugin.php</code>

	
<?php yourls_html_footer(); ?>