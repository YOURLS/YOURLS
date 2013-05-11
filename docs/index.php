<?php
/**
 * Converts a string to a suitable html ID attribute.
 *
 * - Preceeds initial numeric with 'n' character.
 * - Replaces space and underscore with dash.
 * - Converts entire string to lowercase.
 *
 * @param string $string The string to convert
 * @return string The converted string, the id
 */
function string_to_HTML_ID($string) {
	if( is_numeric ( $string{0} ) ) {
		// If the first character is numeric, add 'n' in front
		$string = 'n'. $string;
	}
	return substr( strtolower( preg_replace( '/[^a-zA-Z0-9-]+/', '-', $string ) ), 0, 12 );
}

require_once dirname( __FILE__ ) . '/Markdown.php';

$files = scandir( dirname( __FILE__ ) );
$html = $menu = '';
foreach( $files as $file ) {
	if( substr( $file, -3 ) == '.md' && $file != 'README.md' ) {
		$file_name = substr( $file, 2, -3 );
		$html .= '<div id="'. string_to_HTML_ID( $file_name ) .'">';
		$html .= Markdown( file_get_contents( dirname( __FILE__ ) . '/' . $file ) );
		$html .= '</div>';
		$menu .= '<li><a href="#' . string_to_HTML_ID( $file_name ) . '">' . $file_name . '</a></li>';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>YOURLS Documentation</title>
	<meta name="description" content="YOURLS &middot; Your Own URL Shortener' | Documentation">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../assets/css/style.min.css" type="text/css" media="screen">
</head>
<body>
	<div class="wrap">
		<div class="menu col col-lg-2 col-offset-2 affix">
			<div style="text-align: center;">
				<img class="logo" src="../assets/img/yourls-logo.png" alt="YOURLS" title="YOURLS"/>
				<p>Your Own URL Shortener</p>
			</div>
			<hr />
			<ul class="nav">
			<?php echo $menu; ?>
			</ul>
		</div>
		<div class="col col-lg-6 col-push-4">
			<?php echo $html; ?>
		</div>
	</div>
</body>
</html>
