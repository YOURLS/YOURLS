<?php
define( 'YOURLS_ADMIN', true );
require_once dirname( dirname( __FILE__ ) ) . '/includes/load-yourls.php';
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
	if( isset( $_GET['theme'] ) && yourls_validate_plugin_file( YOURLS_THEMEDIR.'/'.$_GET['theme'].'/theme.php') ) {
		
		global $ydb;
		// Activate / Deactive
		switch( $_GET['action'] ) {
			case 'activate':
				$result = yourls_activate_plugin( $_GET['theme'].'/theme.php' );
				if( $result === true )
					yourls_redirect( yourls_admin_url( 'themes.php?success=activated' ), 302 );

				break;
				
			default:
				$result = yourls__( 'Unsupported action' );
				break;
		}
	} else {
		$result = yourls__( 'No theme specified, or not a valid theme' );
	}
	
	yourls_add_notice( $result, 'danger' );
}

// Handle message upon succesfull (de)activation
if( isset( $_GET['success'] ) && ( $_GET['success'] == 'activated' ) ) {
	$message = yourls__( 'Theme has been applied' );
	yourls_add_notice( $message, 'success' );
}

yourls_html_head( 'themes', yourls__( 'Manage Themes' ) );
yourls_html_template_content( 'before', 'themes' );

$themes = (array)yourls_get_themes();
uasort( $themes, 'yourls_themes_sort_callback' );
	
$count = count( $themes );
$themes_count = sprintf( yourls_n( '%s theme', '%s themes', $count ), $count );
	
yourls_html_title( yourls__( 'Themes' ), 1, /* //translators: "'3 plugins' installed and '1' activated" */ yourls_s( '<strong>%1$s</strong> installed', $themes_count ) ); ?>

	<p><span class="label label-info"><?php yourls_e( 'More themes' ); ?></span> <?php yourls_e( 'For more themes, head to the official <a href="http://yourls.org/themelist">Theme list</a>.' ); ?></p>
	
	<div class="row">
	<?php
	
	$nonce = yourls_create_nonce( 'manage_themes' );
	
	$count = 0;
	foreach( $themes as $file=>$theme ) {
		
		// default fields to read from the plugin header
		$fields = array(
			'name'       => 'Theme Name',
			'uri'        => 'Theme URI',
			'desc'       => 'Description',
			'version'    => 'Version',
			'author'     => 'Author',
			'author_uri' => 'Author URI'
		);
		
		// Loop through all default fields, get value if any and reset it
		foreach( $fields as $field=>$value ) {
			if( isset( $theme[ $value ] ) ) {
				$data[ $field ] = $theme[ $value ];
			} else {
				$data[ $field ] = '(no info)';
			}
			unset( $theme[$value] );
		}
		
		$themedir = trim( dirname( $file ), '/' );

		if( yourls_is_active_plugin( $file ) ) {
			$class = 'success';
			$action_url = '#';
			$action_anchor = yourls__( 'Deactivate' );
		} else {
			$class = 'warning';
			$action_url = yourls_nonce_url( 'manage_themes', yourls_add_query_arg( array( 'action' => 'activate', 'theme' => $themedir ) ) );
			$action_anchor = yourls__( 'Activate' );
		}
			
		// Other "Fields: Value" in the header? Get them too
		if( $theme ) {
			foreach( $theme as $extra_field=>$extra_value ) {
				$data['desc'] .= "<br/>\n<em>$extra_field</em>: $extra_value";
				unset( $theme[$extra_value] );
			}
		}
		
		$data['desc'] .= '<br/><small>' . yourls_s( 'Theme directory: %s', '<code>themes/' . $themedir . '</code>' ) . '</small>';
		
		// Get theme screenshot, or a default div otherwise
		if( $screenshot = yourls_get_theme_screenshot( $themedir ) ) {
			$screenshot = '<img src="' . $screenshot . '" class="img-thumbnail" alt=""/>';
		} else {
			$screenshot = '<span class="img-thumbnail" style="display:block;border:1px solid #aaa;font-size:40px;height:180px;width:100%;background:#e1e1e1;color:#aaa;padding-top:20%;text-align:center;"><i class="glyphicon glyphicon-question-sign"></i></span>'; // @TODO Leo CSS me! :)
		}
		
		// Author link
		$by = sprintf( '<span class="plugin_author"><a href="%s">%s</a></span>', $data['author_uri'], $data['author'] );
		$by = /* //translators: "By Johnny" (the author) */ yourls_s( 'By %s', $by );
		
		printf( '
		<div class="col col-lg-6 theme %s">
			<div class="thumbnail">%s
				<h4 class="plugin_name"><a href="%s">%s</a> <span class="label plugin_version">%s</span></h4>
				<p>					
					%s
				</p>
				<p class="plugin_desc">%s</p>
				<div class="plugin_actions actions">
					<a class="btn btn-%s" href="%s">%s</a>
				</div>
			</div>
		</div>',
			$class, $screenshot, $data['uri'], $data['name'], $data['version'],
			$by, $data['desc'], $class, $action_url, $action_anchor
		);
		
		$count++;
		if( $count == 4 ) {
			echo '<div class="clearfix"></div>';
			$count = 0;
		}
		
	}
	echo '</div>';
	
	echo '<p>';
	yourls_e( 'If something goes wrong after you activate a theme and you cannot use YOURLS or access this page, simply rename or delete its directory.' );
	echo '</p>';
	
	yourls_html_template_content( 'after', 'themes' );
?>