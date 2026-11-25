<?php
/**
 * Help page: the documentation of readme.html, displayed in the admin layout (left sidebar menu kept).
 */
define( 'YOURLS_ADMIN', true );
require_once( dirname( __DIR__ ).'/includes/load-yourls.php' );
yourls_maybe_require_auth();

// Extract tabs + content from the static documentation, so that readme.html stays the single source of truth
$readme = @file_get_contents( YOURLS_ABSPATH . '/readme.html' );
$doc    = '';
if( $readme !== false && preg_match( '~(<ul id="Tabs">.*?</ul>).*?(<div id="Content">.*)</div>\s*<!-- content -->~s', $readme, $m ) ) {
    $doc = $m[1] . "\n" . $m[2] . "\n</div>";
    // Relative images -> absolute URLs
    $doc = preg_replace( '~(<img[^>]+src=")(?!https?://|/)~i', '$1' . yourls_site_url( false ) . '/', $doc );
}

// Page-specific CSS & JS
yourls_add_action( 'html_head', function() {
    echo '<link rel="stylesheet" href="' . yourls_asset_url( 'css/help.css' ) . '" type="text/css" media="screen" />' . "\n";
    echo '<script src="' . yourls_asset_url( 'js/help.js' ) . '" type="text/javascript" defer></script>' . "\n";
} );

yourls_html_head( 'help', yourls__( 'Help' ) );
yourls_html_logo();
yourls_html_menu();
?>

<main role="main" class="help-page">
    <h2 class="page-title"><?php yourls_e( 'Help' ); ?> <small>&mdash; <?php yourls_e( 'documentation' ); ?></small></h2>
    <div id="help-doc">
    <?php
    if( $doc !== '' ) {
        echo $doc; // static, trusted file shipped with YOURLS
    } else {
        echo '<p>' . yourls_s( 'Documentation not found. See %s', '<a href="https://docs.yourls.org/">docs.yourls.org</a>' ) . '</p>';
    }
    ?>
    </div>
</main>

<?php yourls_html_footer(); ?>
