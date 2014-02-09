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

include_once( dirname( dirname( __FILE__ ) ) . '/includes/version.php' );

$files = scandir( dirname( __FILE__ ) );
$html = $menu = '';
foreach( $files as $file ) {
    if( substr( $file, -3 ) == '.md' && $file != 'README.md' ) {
        $file_name = substr( $file, 2, -3 );
        $html .= '<div id="'. string_to_HTML_ID( $file_name ) .'">';
        $html .= '<h1>' . $file_name . '</h1>';
        $html .= Markdown( file_get_contents( dirname( __FILE__ ) . '/' . $file ) );
        $html .= '</div>';
        $menu .= '<li><a href="#' . string_to_HTML_ID( $file_name ) . '">' . $file_name . '</a></li>';
    }
}
$html = str_replace( '</h1>', '<a href="#top" class="back">back to top <i class="fa fa-arrow-circle-o-up"></i></a></h1>', $html );
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>YOURLS Documentation</title>
    <meta name="description" content="YOURLS is Your Own URL Shortener. Get it at http://yourls.org/">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/yourls.min.css?v=<?php echo YOURLS_VERSION; ?>" type="text/css" media="screen">
    <script src="../assets/js/jquery.min.js?v=<?php echo YOURLS_VERSION; ?>" type="text/javascript"></script>
    <script src="../assets/js/bootstrap.min.js?v=<?php echo YOURLS_VERSION; ?>" type="text/javascript"></script>
</head>
<body data-spy="scroll" data-target=".sidebar" class="docs">
    <div class="container">
        <div class="row">
            <div class="sidebar-container">
                <div class="sidebar">
                    <button data-target=".sidebar-responsive-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                        <span class="fa fa-bars"></span>
                    </button>
                    <div class="yourls-logo">
                        <a href="../admin/"><img class="logo" src="../assets/img/yourls-logo.png" alt="YOURLS" title="YOURLS"/></a>
                    </div>
                    <div class="global-stats">
                        <p>Documentation</p>
                    </div>
                    <div class="sidebar-responsive-collapse">
                        <ul class="nav admin-menu">
                        <?php echo $menu; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="content">
                <?php echo $html; ?>
            </div>
        </div>
    </div>
</body>
</html>
