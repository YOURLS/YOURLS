<?php
define( 'YOURLS_ADMIN', true );
define( 'YOURLS_UPGRADING', true );
require_once( dirname( __DIR__ ).'/includes/load-yourls.php' );
yourls_maybe_require_auth();

// ---------------------------------------------------------------------------
// Collect data (no output yet)
// ---------------------------------------------------------------------------
$needs_upgrade = yourls_upgrade_is_needed();
$step          = isset( $_GET['step'] ) ? intval( $_GET['step'] ) : 0;
$oldver = $oldsql = $newver = $newsql = null;

if ( $needs_upgrade ) {
    if ( isset( $_GET['oldver'] ) && isset( $_GET['oldsql'] ) ) {
        $oldver = yourls_sanitize_version( $_GET['oldver'] );
        $oldsql = intval( $_GET['oldsql'] );
    } else {
        list( $oldver, $oldsql ) = yourls_get_current_version_from_sql();
    }
    $newver = YOURLS_VERSION;
    $newsql = YOURLS_DB_VERSION;
    yourls_debug_mode( true );
}

// ---------------------------------------------------------------------------
// Blade path
// ---------------------------------------------------------------------------
if ( function_exists( 'yourls_ui_is_enabled' ) && yourls_ui_is_enabled() ) {
    $upgrade_complete = ! $needs_upgrade;
    $upgrade_logs     = [];

    if ( $needs_upgrade && ( $step === 1 || $step === 2 ) ) {
        ob_start();
        yourls_upgrade( $step, $oldver, $newver, $oldsql, $newsql );
        $raw = ob_get_clean();
        if ( $raw ) {
            $upgrade_logs = array_values( array_filter( array_map( 'trim', explode( "\n", strip_tags( $raw ) ) ) ) );
        }
        // Steps 1/2 in legacy emit a JS redirect to step=3. Do it server-side instead.
        yourls_redirect( yourls_admin_url( 'upgrade.php?step=3' ), 302 );
        return;
    }

    if ( $needs_upgrade && $step >= 3 ) {
        ob_start();
        yourls_upgrade( 3, $oldver, $newver, $oldsql, $newsql );
        $raw = ob_get_clean();
        if ( $raw ) {
            $upgrade_logs = array_values( array_filter( array_map( 'trim', explode( "\n", strip_tags( $raw ) ) ) ) );
        }
        $upgrade_complete = true;
    }

    echo yourls_ui_view( 'auth.upgrade', [
        'step'         => $step,
        'complete'     => $upgrade_complete,
        'logs'         => $upgrade_logs,
        'adminUrl'     => yourls_admin_url( 'index.php' ),
        'needsUpgrade' => $needs_upgrade,
        'oldver'       => $oldver,
        'newver'       => $newver,
        'oldsql'       => $oldsql,
        'newsql'       => $newsql,
    ] );
    return;
}

// ---------------------------------------------------------------------------
// Legacy path
// ---------------------------------------------------------------------------
yourls_html_head( 'upgrade', yourls__( 'Upgrade YOURLS' ) );
yourls_html_logo();
yourls_html_menu();
?>
        <h2><?php yourls_e( 'Upgrade YOURLS' ); ?></h2>
<?php

if ( ! $needs_upgrade ) {
    echo '<p>' . yourls_s( 'Upgrade not required. Go <a href="%s">back to play</a>!', yourls_admin_url( 'index.php' ) ) . '</p>';

} else {
    switch ( $step ) {
        default:
        case 0:
            ?>
            <p><?php yourls_e( 'Your current installation needs to be upgraded.' ); ?></p>
            <p><?php yourls_e( 'Please, pretty please, it is recommended that you <strong>backup</strong> your database<br/>(you should do this regularly anyway)' ); ?></p>
            <p><?php yourls_e( "Nothing awful <em>should</em> happen, but this doesn't mean it <em>won't</em> happen, right? ;)" ); ?></p>
            <p><?php yourls_e( "On every step, if <span class='error'>something goes wrong</span>, you'll see a message and hopefully a way to fix." ); ?></p>
            <p><?php yourls_e( 'If everything goes too fast and you cannot read, <span class="success">good for you</span>, let it go :)' ); ?></p>
            <p><?php yourls_e( 'Once you are ready, press "Upgrade" !' ); ?></p>
            <?php
            echo "
            <form action='upgrade.php?' method='get'>
            <input type='hidden' name='step' value='1' />
            <input type='hidden' name='oldver' value='$oldver' />
            <input type='hidden' name='newver' value='$newver' />
            <input type='hidden' name='oldsql' value='$oldsql' />
            <input type='hidden' name='newsql' value='$newsql' />
            <input type='submit' class='primary' value='" . yourls_esc_attr__( 'Upgrade' ) . "' />
            </form>";
            break;

        case 1:
        case 2:
            $upgrade = yourls_upgrade( $step, $oldver, $newver, $oldsql, $newsql );
            break;

        case 3:
            $upgrade = yourls_upgrade( 3, $oldver, $newver, $oldsql, $newsql );
            echo '<p>' . yourls__( 'Your installation is now up to date ! ' ) . '</p>';
            echo '<p>' . yourls_s( 'Go back to <a href="%s">the admin interface</a>', yourls_admin_url( 'index.php' ) ) . '</p>';
    }
}

?>

<?php yourls_html_footer(); ?>
