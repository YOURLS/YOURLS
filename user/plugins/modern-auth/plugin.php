<?php
/*
Plugin Name: Modern Auth & Landing Page
Plugin URI: https://yourls.org/
Description: Adds self-service registration and password reset (multi-user login on top of the config.php admin), a t.ly-style public landing page at the site root, and a restyled login/register screen. Activate this plugin from the Plugins page after install.
Version: 1.1
Author: -
Author URI: -
*/

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

define( 'MODERN_AUTH_TABLE', YOURLS_DB_PREFIX . 'users' );

/**
 * Make sure the users table exists. Runs once (flag stored in options) then is a no-op.
 */
yourls_add_action( 'plugins_loaded', 'modern_auth_maybe_create_table' );
function modern_auth_maybe_create_table() {
    if ( yourls_get_option( 'modern_auth_db_ready' ) ) {
        return;
    }

    $table = MODERN_AUTH_TABLE;
    $pdo = yourls_get_db('write-modern_auth_create_table')->getPdo();
    $pdo->exec(
        "CREATE TABLE IF NOT EXISTS `$table` (
            `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
            `username` VARCHAR(50) NOT NULL,
            `email` VARCHAR(191) NOT NULL,
            `password_hash` VARCHAR(255) NOT NULL,
            `created_at` DATETIME NOT NULL,
            `reset_token_hash` VARCHAR(64) NULL,
            `reset_token_expires` DATETIME NULL,
            PRIMARY KEY (`id`),
            UNIQUE KEY `username` (`username`),
            UNIQUE KEY `email` (`email`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;"
    );

    // Migration for tables created before password reset existed. Plain "IF NOT EXISTS" on
    // ADD COLUMN is a MariaDB-only extension and errors out (1064) on real MySQL, so check
    // information_schema first instead.
    modern_auth_add_column_if_missing( $pdo, $table, 'reset_token_hash', 'VARCHAR(64) NULL' );
    modern_auth_add_column_if_missing( $pdo, $table, 'reset_token_expires', 'DATETIME NULL' );

    yourls_update_option( 'modern_auth_db_ready', true );
}

function modern_auth_add_column_if_missing( PDO $pdo, string $table, string $column, string $definition ) {
    $stmt = $pdo->prepare(
        'SELECT COUNT(*) FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = :table AND COLUMN_NAME = :column'
    );
    $stmt->execute( [ 'table' => $table, 'column' => $column ] );
    if ( (int) $stmt->fetchColumn() > 0 ) {
        return;
    }
    $pdo->exec( "ALTER TABLE `$table` ADD COLUMN `$column` $definition" );
}

/**
 * Look up a registered (DB) user by username
 *
 * @param string $username
 * @return array|null
 */
function modern_auth_get_user( $username ) {
    $ydb = yourls_get_db('read-modern_auth_get_user');
    $table = MODERN_AUTH_TABLE;
    $row = $ydb->fetchOne( "SELECT * FROM `$table` WHERE `username` = :username LIMIT 1", [ 'username' => $username ] );
    return $row ?: null;
}

/**
 * Second-chance auth check: if core auth (config.php admins) failed, check the DB-backed
 * users table (self-registered users) instead -- both for a username/password login
 * submission, and for the auth cookie on later page loads (core's yourls_check_auth_cookie()
 * only ever compares against the config.php $yourls_user_passwords array, so without this,
 * a DB user could log in once but would be treated as logged-out on the very next request).
 *
 * Hooked on the 'is_valid_user' filter, which core calls after its own check, with final say.
 * Nonce and login-flood throttling already happened in yourls_check_username_password()
 * regardless of outcome, so both auth paths share the same brute-force protection.
 */
yourls_add_filter( 'is_valid_user', 'modern_auth_check_db_user' );
function modern_auth_check_db_user( $valid ) {
    if ( $valid === true ) {
        return true;
    }

    // Username/password login submission
    if ( !empty( $_REQUEST['username'] ) && !empty( $_REQUEST['password'] ) ) {
        $user = modern_auth_get_user( (string) $_REQUEST['username'] );
        if ( $user && password_verify( (string) $_REQUEST['password'], $user['password_hash'] ) ) {
            yourls_set_user( $user['username'] );
            yourls_clear_login_flood();
            return true;
        }
        return $valid;
    }

    // Returning visit: check the auth cookie against each DB user's expected cookie value
    if ( !yourls_is_API() && isset( $_COOKIE[ yourls_cookie_name() ] ) ) {
        foreach ( modern_auth_get_usernames() as $username ) {
            if ( hash_equals( yourls_cookie_value( $username ), (string) $_COOKIE[ yourls_cookie_name() ] ) ) {
                yourls_set_user( $username );
                return true;
            }
        }
    }

    return $valid;
}

/**
 * @return string[] all registered (DB) usernames
 */
function modern_auth_get_usernames(): array {
    $ydb = yourls_get_db('read-modern_auth_get_usernames');
    $table = MODERN_AUTH_TABLE;
    return $ydb->fetchCol( "SELECT `username` FROM `$table`" );
}

/**
 * Handle registration form submission (POST to this page with modern_auth_register=1)
 * Hooked very early so it can redirect before any HTML is sent.
 */
yourls_add_action( 'plugins_loaded', 'modern_auth_handle_registration' );
function modern_auth_handle_registration() {
    if ( yourls_is_API() || empty( $_POST['modern_auth_register'] ) ) {
        return;
    }

    yourls_verify_nonce( 'modern_auth_register' );
    modern_auth_check_register_flood();

    $username = isset( $_POST['username'] ) ? trim( (string) $_POST['username'] ) : '';
    $email    = isset( $_POST['email'] )    ? trim( (string) $_POST['email'] )    : '';
    $password = isset( $_POST['password'] ) ? (string) $_POST['password']         : '';

    $error = modern_auth_validate_registration( $username, $email, $password );

    if ( !$error ) {
        $ydb = yourls_get_db('write-modern_auth_register');
        $table = MODERN_AUTH_TABLE;
        $inserted = $ydb->fetchAffected(
            "INSERT INTO `$table` (`username`, `email`, `password_hash`, `created_at`) VALUES (:username, :email, :hash, :created_at)",
            [
                'username'   => $username,
                'email'      => $email,
                'hash'       => password_hash( $password, PASSWORD_DEFAULT ),
                'created_at' => date( 'Y-m-d H:i:s' ),
            ]
        );

        if ( $inserted ) {
            modern_auth_register_flood_hit( true );
            yourls_redirect( yourls_add_query_arg( 'registered', '1', yourls_site_url( false ) . '/admin/' ), 302 );
            exit;
        }

        $error = yourls__( 'Could not create account (username or email may already be taken).' );
    }

    modern_auth_register_flood_hit( false );
    $GLOBALS['modern_auth_register_error'] = $error;
    $GLOBALS['modern_auth_register_values'] = [ 'username' => $username, 'email' => $email ];
}

function modern_auth_validate_registration( $username, $email, $password ) {
    if ( !preg_match( '/^[a-zA-Z0-9_-]{3,50}$/', $username ) ) {
        return yourls__( 'Username must be 3-50 characters: letters, digits, - or _ only.' );
    }
    if ( !filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
        return yourls__( 'Please provide a valid email address.' );
    }
    if ( strlen( $password ) < 10 ) {
        return yourls__( 'Password must be at least 10 characters long.' );
    }
    if ( modern_auth_get_user( $username ) ) {
        return yourls__( 'This username is already taken.' );
    }
    return '';
}

/**
 * Lightweight per-IP rate limit for registration attempts (mitigates spam signups),
 * stored the same way as the core login flood throttle: a self-pruning options-table entry.
 */
function modern_auth_check_register_flood() {
    $data = modern_auth_register_flood_data();
    $max_attempts = (int) yourls_apply_filter( 'register_flood_max_attempts', 5 );
    if ( $data['count'] >= $max_attempts ) {
        yourls_die( yourls__( 'Too many registration attempts. Please try again later.' ), yourls__( 'Too Many Requests' ), 429 );
    }
}

function modern_auth_register_flood_hit( $success ) {
    if ( $success ) {
        yourls_delete_option( modern_auth_register_flood_key() );
        return;
    }
    $data = modern_auth_register_flood_data();
    $data['count']++;
    $key = modern_auth_register_flood_key();
    if ( false === yourls_get_option( $key, false ) ) {
        yourls_add_option( $key, $data );
    } else {
        yourls_update_option( $key, $data );
    }
}

function modern_auth_register_flood_data(): array {
    $window = (int) yourls_apply_filter( 'register_flood_window', 3600 ); // 1 hour
    $data = yourls_get_option( modern_auth_register_flood_key(), [ 'count' => 0, 'first' => time() ] );
    if ( ( time() - $data['first'] ) > $window ) {
        $data = [ 'count' => 0, 'first' => time() ];
    }
    return $data;
}

function modern_auth_register_flood_key(): string {
    // option_name is varchar(64): keep the key well under that limit
    return 'rf_' . substr( hash( 'sha256', yourls_get_IP() ), 0, 40 );
}

/**
 * @param string $email
 * @return array|null
 */
function modern_auth_get_user_by_email( string $email ) {
    $ydb = yourls_get_db('read-modern_auth_get_user_by_email');
    $table = MODERN_AUTH_TABLE;
    $row = $ydb->fetchOne( "SELECT * FROM `$table` WHERE `email` = :email LIMIT 1", [ 'email' => $email ] );
    return $row ?: null;
}

/**
 * @param string $token raw (unhashed) token as received from the reset link
 * @return array|null the matching user row, if the token is valid and not expired
 */
function modern_auth_get_user_by_reset_token( string $token ) {
    if ( $token === '' ) {
        return null;
    }
    $ydb = yourls_get_db('read-modern_auth_get_user_by_reset_token');
    $table = MODERN_AUTH_TABLE;
    $row = $ydb->fetchOne(
        "SELECT * FROM `$table` WHERE `reset_token_hash` = :hash AND `reset_token_expires` > :now LIMIT 1",
        [ 'hash' => hash( 'sha256', $token ), 'now' => date( 'Y-m-d H:i:s' ) ]
    );
    return $row ?: null;
}

/**
 * Handle "forgot password" form submission: generate a one-hour token and email a reset link.
 * Always redirects to the same "check your email" message whether or not the address is
 * registered, so this can't be used to enumerate accounts.
 */
yourls_add_action( 'plugins_loaded', 'modern_auth_handle_forgot_password' );
function modern_auth_handle_forgot_password() {
    if ( yourls_is_API() || empty( $_POST['modern_auth_forgot_password'] ) ) {
        return;
    }

    yourls_verify_nonce( 'modern_auth_forgot_password' );
    modern_auth_check_forgot_flood();

    $email = isset( $_POST['email'] ) ? trim( (string) $_POST['email'] ) : '';

    if ( filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
        $user = modern_auth_get_user_by_email( $email );
        if ( $user ) {
            $token   = bin2hex( random_bytes( 32 ) );
            $expires = date( 'Y-m-d H:i:s', time() + 3600 );

            $ydb = yourls_get_db('write-modern_auth_set_reset_token');
            $table = MODERN_AUTH_TABLE;
            $ydb->fetchAffected(
                "UPDATE `$table` SET `reset_token_hash` = :hash, `reset_token_expires` = :expires WHERE `id` = :id",
                [ 'hash' => hash( 'sha256', $token ), 'expires' => $expires, 'id' => $user['id'] ]
            );

            $reset_url = yourls_add_query_arg( 'token', $token, yourls_site_url( false ) . '/reset-password.php' );
            modern_auth_send_mail(
                $email,
                'Reset your password',
                "Someone requested a password reset for your account.\n\nReset it here (valid 1 hour):\n$reset_url\n\nIf you didn't request this, you can ignore this email."
            );
        }
        modern_auth_forgot_flood_hit(); // count real attempts (valid email format) toward the throttle
    }

    yourls_redirect( yourls_add_query_arg( 'sent', '1', yourls_site_url( false ) . '/forgot-password.php' ), 302 );
    exit;
}

/**
 * Handle the "set a new password" form submission from reset-password.php
 */
yourls_add_action( 'plugins_loaded', 'modern_auth_handle_reset_password' );
function modern_auth_handle_reset_password() {
    if ( yourls_is_API() || empty( $_POST['modern_auth_reset_password'] ) ) {
        return;
    }

    yourls_verify_nonce( 'modern_auth_reset_password' );

    $token    = isset( $_POST['token'] )    ? (string) $_POST['token']    : '';
    $password = isset( $_POST['password'] ) ? (string) $_POST['password'] : '';

    $user = modern_auth_get_user_by_reset_token( $token );
    if ( !$user ) {
        $GLOBALS['modern_auth_reset_error'] = yourls__( 'This reset link is invalid or has expired.' );
        return;
    }
    if ( strlen( $password ) < 10 ) {
        $GLOBALS['modern_auth_reset_error'] = yourls__( 'Password must be at least 10 characters long.' );
        $GLOBALS['modern_auth_reset_token'] = $token;
        return;
    }

    $ydb = yourls_get_db('write-modern_auth_reset_password');
    $table = MODERN_AUTH_TABLE;
    $ydb->fetchAffected(
        "UPDATE `$table` SET `password_hash` = :hash, `reset_token_hash` = NULL, `reset_token_expires` = NULL WHERE `id` = :id",
        [ 'hash' => password_hash( $password, PASSWORD_DEFAULT ), 'id' => $user['id'] ]
    );

    yourls_redirect( yourls_add_query_arg( 'reset', '1', yourls_site_url( false ) . '/admin/' ), 302 );
    exit;
}

/**
 * Send an email: uses a minimal built-in SMTP client (STARTTLS + AUTH LOGIN) when SMTP_HOST
 * is configured, otherwise falls back to PHP's mail(), which needs a working local MTA and
 * often does NOT work out of the box in a container -- set SMTP_* env vars for reliable delivery.
 */
function modern_auth_send_mail( string $to, string $subject, string $body ): bool {
    $host = getenv('SMTP_HOST');
    if ( $host ) {
        return modern_auth_send_mail_smtp( $host, $to, $subject, $body );
    }

    $from = getenv('MAIL_FROM') ?: ( 'no-reply@' . parse_url( yourls_get_yourls_site(), PHP_URL_HOST ) );
    $headers = "From: $from\r\nContent-Type: text/plain; charset=UTF-8\r\n";
    $sent = @mail( $to, $subject, $body, $headers );
    if ( !$sent ) {
        yourls_debug_log( "modern-auth: mail() failed sending to $to -- configure SMTP_HOST for reliable delivery" );
    }
    return $sent;
}

function modern_auth_send_mail_smtp( string $host, string $to, string $subject, string $body ): bool {
    $port = (int) ( getenv('SMTP_PORT') ?: 587 );
    $user = getenv('SMTP_USER');
    $pass = getenv('SMTP_PASS');
    $from = getenv('MAIL_FROM') ?: ( $user ?: ( 'no-reply@' . parse_url( yourls_get_yourls_site(), PHP_URL_HOST ) ) );
    $helo = parse_url( yourls_get_yourls_site(), PHP_URL_HOST ) ?: 'localhost';

    $errno = 0;
    $errstr = '';
    $sock = @stream_socket_client( "tcp://$host:$port", $errno, $errstr, 10 );
    if ( !$sock ) {
        yourls_debug_log( "modern-auth: SMTP connect to $host:$port failed: $errstr" );
        return false;
    }

    $read = static function () use ( $sock ) {
        $data = '';
        while ( ( $line = fgets( $sock, 515 ) ) !== false ) {
            $data .= $line;
            if ( isset( $line[3] ) && $line[3] === ' ' ) {
                break;
            }
        }
        return $data;
    };
    $write = static function ( $cmd ) use ( $sock ) {
        fwrite( $sock, $cmd . "\r\n" );
    };
    $ok = static function ( $resp, $code ) {
        return str_starts_with( $resp, (string) $code );
    };

    $read(); // server greeting
    $write( "EHLO $helo" );
    $ehlo = $read();

    if ( str_contains( $ehlo, 'STARTTLS' ) ) {
        $write( 'STARTTLS' );
        $read();
        if ( !stream_socket_enable_crypto( $sock, true, STREAM_CRYPTO_METHOD_TLS_CLIENT ) ) {
            fclose( $sock );
            yourls_debug_log( 'modern-auth: SMTP STARTTLS negotiation failed' );
            return false;
        }
        $write( "EHLO $helo" );
        $read();
    }

    if ( $user && $pass ) {
        $write( 'AUTH LOGIN' );
        $read();
        $write( base64_encode( $user ) );
        $read();
        $write( base64_encode( $pass ) );
        if ( !$ok( $read(), 235 ) ) {
            fclose( $sock );
            yourls_debug_log( 'modern-auth: SMTP authentication failed' );
            return false;
        }
    }

    $write( "MAIL FROM:<$from>" );
    $read();
    $write( "RCPT TO:<$to>" );
    $read();
    $write( 'DATA' );
    $read();

    $message = "From: $from\r\nTo: $to\r\nSubject: $subject\r\nContent-Type: text/plain; charset=UTF-8\r\n\r\n$body\r\n.";
    $write( $message );
    $result = $ok( $read(), 250 );

    $write( 'QUIT' );
    fclose( $sock );

    if ( !$result ) {
        yourls_debug_log( "modern-auth: SMTP send to $to was rejected" );
    }
    return $result;
}

/**
 * Rate limit for "forgot password" requests -- separate bucket from registration/login,
 * same self-pruning options-table pattern.
 */
function modern_auth_check_forgot_flood() {
    $data = modern_auth_forgot_flood_data();
    $max_attempts = (int) yourls_apply_filter( 'forgot_password_flood_max_attempts', 5 );
    if ( $data['count'] >= $max_attempts ) {
        yourls_die( yourls__( 'Too many requests. Please try again later.' ), yourls__( 'Too Many Requests' ), 429 );
    }
}

function modern_auth_forgot_flood_hit() {
    $data = modern_auth_forgot_flood_data();
    $data['count']++;
    $key = modern_auth_forgot_flood_key();
    if ( false === yourls_get_option( $key, false ) ) {
        yourls_add_option( $key, $data );
    } else {
        yourls_update_option( $key, $data );
    }
}

function modern_auth_forgot_flood_data(): array {
    $window = (int) yourls_apply_filter( 'forgot_password_flood_window', 3600 ); // 1 hour
    $data = yourls_get_option( modern_auth_forgot_flood_key(), [ 'count' => 0, 'first' => time() ] );
    if ( ( time() - $data['first'] ) > $window ) {
        $data = [ 'count' => 0, 'first' => time() ];
    }
    return $data;
}

function modern_auth_forgot_flood_key(): string {
    return 'ff_' . substr( hash( 'sha256', yourls_get_IP() ), 0, 40 );
}

/**
 * Modern styling: inject the plugin's stylesheet on every admin page, plus the QR code
 * library and its render script on the pages that show the links table (index/bookmark).
 *
 * Note: yourls_do_action('html_head', $context) delivers $context wrapped in a
 * single-element array to action callbacks (accepted_args=1 default in yourls_add_action()
 * combined with how yourls_do_action()/yourls_apply_filter() pass args through) -- unwrap it.
 */
yourls_add_filter( 'bodyclass', 'modern_auth_add_bodyclass' );
function modern_auth_add_bodyclass( $bodyclass ) {
    // Note: core does $bodyclass .= 'mobile'/'desktop' right after this filter runs, with
    // no separator -- keep a trailing space so the two class names don't get glued together.
    return $bodyclass . 'modern-space-bg ';
}

yourls_add_action( 'html_head', 'modern_auth_admin_assets' );
function modern_auth_admin_assets( $context ) {
    $context = is_array( $context ) ? ( $context[0] ?? null ) : $context;
    $base = yourls_plugin_url( __DIR__ );

    echo '<link rel="stylesheet" href="' . yourls_esc_attr( $base . '/assets/modern.css' ) . '" type="text/css" media="screen" />' . "\n";

    if ( in_array( $context, [ 'index', 'bookmark' ], true ) ) {
        echo '<script src="' . yourls_esc_attr( $base . '/assets/vendor/qrcode.js' ) . '"></script>' . "\n";
        echo '<script src="' . yourls_esc_attr( $base . '/assets/vendor/qrcode_UTF8.js' ) . '"></script>' . "\n";
        echo '<script src="' . yourls_esc_attr( $base . '/assets/qr-render.js' ) . '"></script>' . "\n";
    }
}

/**
 * Add a "Create an account" link under the login form.
 */
yourls_add_action( 'login_form_bottom', 'modern_auth_add_register_link' );
function modern_auth_add_register_link() {
    if ( isset( $_GET['registered'] ) ) {
        echo '<p class="modern-auth-success">' . yourls_esc_html__( 'Account created! You can now log in.' ) . '</p>';
    }
    if ( isset( $_GET['reset'] ) ) {
        echo '<p class="modern-auth-success">' . yourls_esc_html__( 'Password updated! You can now log in.' ) . '</p>';
    }
    $register_url = yourls_site_url( false ) . '/register.php';
    $forgot_url   = yourls_site_url( false ) . '/forgot-password.php';
    echo '<p class="modern-auth-register-link"><a href="' . yourls_esc_attr( $forgot_url ) . '">' . yourls_esc_html__( 'Forgot your password?' ) . '</a></p>';
    echo '<p class="modern-auth-register-link"><a href="' . yourls_esc_attr( $register_url ) . '">' . yourls_esc_html__( 'Create an account' ) . '</a></p>';
}

/**
 * Public landing page at the bare site root (t.ly-style), instead of the default
 * "keyword not found, redirect to site root" behaviour, which for an EMPTY keyword
 * would otherwise just bounce back to itself.
 *
 * Note: see comment on modern_auth_admin_assets() above -- $keyword arrives array-wrapped.
 */
yourls_add_action( 'redirect_keyword_not_found', 'modern_auth_landing_page' );
function modern_auth_landing_page( $keyword ) {
    $keyword = is_array( $keyword ) ? ( $keyword[0] ?? null ) : $keyword;
    if ( $keyword !== '' && $keyword !== null ) {
        return; // real 404: let core handle it (redirect to site root)
    }

    require __DIR__ . '/landing.php';
    exit;
}

/**
 * Handle the "shorten a link" form on the public landing page. Only actually creates the
 * link if the visitor already has a valid session (admin from config.php, or a logged-in
 * DB user) -- yourls_is_valid_user() checks the existing auth cookie here since there's no
 * username/password in this form, it does NOT attempt or require a fresh login. Anonymous
 * visitors just get a prompt to log in first, with their input kept so the form isn't wiped.
 *
 * Hooked on 'plugins_loaded' (fires during bootstrap, before the router decides to show
 * landing.php) so the $GLOBALS below are already set by the time landing.php reads them.
 */
yourls_add_action( 'plugins_loaded', 'modern_auth_handle_landing_shorten' );
function modern_auth_handle_landing_shorten() {
    if ( yourls_is_API() || empty( $_POST['modern_auth_landing_shorten'] ) ) {
        return;
    }

    yourls_verify_nonce( 'landing_shorten' );

    $url     = isset( $_POST['url'] )     ? trim( (string) $_POST['url'] )     : '';
    $keyword = isset( $_POST['keyword'] ) ? trim( (string) $_POST['keyword'] ) : '';

    $GLOBALS['modern_auth_landing_shorten_values'] = [ 'url' => $url, 'keyword' => $keyword ];

    if ( yourls_is_valid_user() !== true ) {
        $GLOBALS['modern_auth_landing_shorten_error'] = yourls__( 'Please log in or create a free account first to shorten a link.' );
        return;
    }

    $return = yourls_add_new_link( $url, $keyword );

    if ( isset( $return['status'] ) && $return['status'] === 'success' && !empty( $return['shorturl'] ) ) {
        $GLOBALS['modern_auth_landing_shorten_result'] = $return['shorturl'];
        $GLOBALS['modern_auth_landing_shorten_values'] = [ 'url' => '', 'keyword' => '' ];
    } else {
        $GLOBALS['modern_auth_landing_shorten_error'] = $return['message'] ?? yourls__( 'Could not shorten that link.' );
    }
}

/**
 * ---------------------------------------------------------------------------
 * Modern dashboard: 2-column layout (links table + sidebar), QR code and
 * "unique visitors" columns in the table, matching the t.ly-inspired redesign.
 * ---------------------------------------------------------------------------
 */

/**
 * Open the 2-column dashboard wrapper right after the page header/menu.
 */
yourls_add_action( 'admin_page_before_content', 'modern_auth_dashboard_open' );
function modern_auth_dashboard_open() {
    if ( !yourls_is_admin() ) {
        return;
    }
    echo '<div class="modern-dash"><div class="modern-dash-main">';
}

/**
 * Buffer the table markup so its "no results" placeholder row -- core hardcodes
 * <td colspan="6"> -- can be corrected to match the real column count now that this
 * plugin adds 2 extra columns (qr, unique). Without this, the tablesorter jQuery
 * plugin complains (and, worse, mis-renders) about a THEAD/row column mismatch.
 */
yourls_add_action( 'admin_page_before_table', 'modern_auth_table_buffer_start' );
function modern_auth_table_buffer_start() {
    if ( yourls_is_admin() ) {
        ob_start();
    }
}

yourls_add_action( 'admin_page_after_table', 'modern_auth_table_buffer_end', 5 );
function modern_auth_table_buffer_end() {
    if ( !yourls_is_admin() ) {
        return;
    }
    $html = ob_get_clean();
    $count = substr_count( $html, "<th id='main_table_head_" );
    if ( $count > 0 ) {
        // Two places hardcode colspan="6" for the original 6-column table: the "no results"
        // row (<td>) and the pagination row in the <tfoot> (<th>).
        $html = str_replace(
            [ '<td colspan="6">', '<th colspan="6">' ],
            [ '<td colspan="' . $count . '">', '<th colspan="' . $count . '">' ],
            $html
        );
    }
    echo $html;
}

/**
 * Close the main column and render the sidebar after the links table.
 */
yourls_add_action( 'admin_page_after_table', 'modern_auth_dashboard_sidebar' );
function modern_auth_dashboard_sidebar() {
    if ( !yourls_is_admin() ) {
        return;
    }

    $stats = yourls_get_db_stats();

    echo '</div><aside class="modern-dash-sidebar">';

    echo '<div class="modern-card"><h3>' . yourls_esc_html__( 'Overview' ) . '</h3>';
    echo '<div class="modern-stat-row"><span class="modern-stat-label">' . yourls_esc_html__( 'Total links' ) . '</span><span class="modern-stat-value">' . yourls_number_format_i18n( $stats['total_links'] ) . '</span></div>';
    echo '<div class="modern-stat-row"><span class="modern-stat-label">' . yourls_esc_html__( 'Total clicks' ) . '</span><span class="modern-stat-value">' . yourls_number_format_i18n( $stats['total_clicks'] ) . '</span></div>';
    echo '</div>';

    echo '<div class="modern-card"><h3>' . yourls_esc_html__( 'Tips' ) . '</h3>';
    echo '<div class="modern-tip"><span>&#128279;</span><span><strong>' . yourls_esc_html__( 'Custom keywords' ) . '</strong>' . yourls_esc_html__( 'Type your own keyword when shortening a link to get a memorable slug.' ) . '</span></div>';
    echo '<div class="modern-tip"><span>&#128202;</span><span><strong>' . yourls_esc_html__( 'Stats page' ) . '</strong>' . yourls_esc_html__( 'Add a + at the end of any short link to see clicks, referrers and countries.' ) . '</span></div>';
    echo '<div class="modern-tip"><span>&#9635;</span><span><strong>' . yourls_esc_html__( 'QR codes' ) . '</strong>' . yourls_esc_html__( 'Click the QR thumbnail next to a link to view or download it.' ) . '</span></div>';
    echo '</div>';

    echo '</aside></div>';
}

/**
 * Add "QR" and "Unique" column headers, appended at the very end (after "Actions").
 *
 * They can't be inserted in the middle of the existing columns: js/tablesorte.js hardcodes
 * column indexes (keyword=0, url=1, timestamp=2, ip=3, clicks=4, actions=5, with sorting
 * explicitly disabled on index 5). Appending after "actions" keeps those indexes intact so
 * sorting keeps working correctly; the 2 new columns just sort as plain text, which is fine.
 */
yourls_add_filter( 'table_head_cells', 'modern_auth_add_table_headers' );
function modern_auth_add_table_headers( $cells ) {
    $cells['qr']     = yourls__( 'QR Code' );
    $cells['unique'] = yourls__( 'Unique' );
    return $cells;
}

/**
 * Add the matching "QR" and "Unique" cells to every table row, in the same trailing order.
 */
yourls_add_filter( 'table_add_row_cell_array', 'modern_auth_add_table_cells' );
function modern_auth_add_table_cells( $cells, $keyword, $url, $title, $ip, $clicks, $timestamp ) {
    $cells['qr'] = [
        'template' => '<div class="modern-qr-code" data-url="%url%"></div>',
        'url'      => yourls_esc_attr( yourls_link( $keyword ) ),
    ];
    $cells['unique'] = [
        'template' => '<span class="modern-badge">%unique%</span>',
        'unique'   => yourls_number_format_i18n( modern_auth_unique_visitors( $keyword ), 0 ),
    ];
    return $cells;
}

/**
 * Count distinct IPs that clicked a given short URL.
 *
 * @param string $keyword
 * @return int
 */
function modern_auth_unique_visitors( string $keyword ): int {
    $table = YOURLS_DB_TABLE_LOG;
    $ydb = yourls_get_db('read-modern_auth_unique_visitors');
    return (int) $ydb->fetchValue(
        "SELECT COUNT(DISTINCT `ip_address`) FROM `$table` WHERE `shorturl` = :keyword",
        [ 'keyword' => $keyword ]
    );
}

/**
 * ---------------------------------------------------------------------------
 * "Manage Users" admin page: view/delete self-registered (DB) users. Shows up
 * as a sublink under "Manage Plugins" in the admin menu (core's own mechanism
 * for plugin admin pages -- see yourls_list_plugin_admin_pages()).
 * ---------------------------------------------------------------------------
 */
yourls_add_action( 'plugins_loaded', 'modern_auth_register_users_page' );
function modern_auth_register_users_page() {
    yourls_register_plugin_page( 'modern_auth_users', yourls__( 'Manage Users' ), 'modern_auth_users_page' );
}

function modern_auth_users_page() {
    $notice = '';

    if ( isset( $_GET['delete'], $_GET['id'] ) ) {
        $id = (int) $_GET['id'];
        yourls_verify_nonce( 'modern_auth_delete_user_' . $id );

        $table = MODERN_AUTH_TABLE;
        $ydb = yourls_get_db('write-modern_auth_delete_user');
        $deleted = $ydb->fetchAffected( "DELETE FROM `$table` WHERE `id` = :id", [ 'id' => $id ] );

        $notice = $deleted
            ? '<p class="modern-auth-success">' . yourls_esc_html__( 'User deleted.' ) . '</p>'
            : '<p class="error">' . yourls_esc_html__( 'Could not delete user (already removed?).' ) . '</p>';
    }

    $table = MODERN_AUTH_TABLE;
    $ydb = yourls_get_db('read-modern_auth_list_users');
    $users = $ydb->fetchAll( "SELECT `id`, `username`, `email`, `created_at` FROM `$table` ORDER BY `created_at` DESC" );

    echo '<h2>' . yourls_esc_html__( 'Self-registered users' ) . '</h2>';
    echo $notice;
    echo '<p>' . yourls_esc_html__( 'Accounts created via the public registration page (/register.php). This does not include the admin account(s) defined in your config.php.' ) . '</p>';

    if ( !$users ) {
        echo '<p>' . yourls_esc_html__( 'No self-registered users yet.' ) . '</p>';
        return;
    }

    echo '<div class="modern-card" style="max-width:800px;"><table class="tblSorter" style="width:100%;"><thead><tr>';
    echo '<th>' . yourls_esc_html__( 'Username' ) . '</th>';
    echo '<th>' . yourls_esc_html__( 'Email' ) . '</th>';
    echo '<th>' . yourls_esc_html__( 'Registered' ) . '</th>';
    echo '<th>' . yourls_esc_html__( 'Actions' ) . '</th>';
    echo '</tr></thead><tbody>';

    foreach ( $users as $user ) {
        $delete_url = yourls_nonce_url(
            'modern_auth_delete_user_' . $user['id'],
            yourls_add_query_arg( [ 'page' => 'modern_auth_users', 'delete' => 1, 'id' => $user['id'] ], yourls_admin_url( 'plugins.php' ) )
        );

        echo '<tr>';
        echo '<td>' . yourls_esc_html( $user['username'] ) . '</td>';
        echo '<td>' . yourls_esc_html( $user['email'] ) . '</td>';
        echo '<td>' . yourls_esc_html( yourls_date_i18n( yourls_get_datetime_format( yourls__( 'M d, Y H:i' ) ), yourls_get_timestamp( strtotime( $user['created_at'] ) ) ) ) . '</td>';
        echo '<td><a href="' . yourls_esc_attr( $delete_url ) . '" class="button" onclick="return confirm(' . "'" . yourls_esc_js( yourls_s( 'Delete user %s? This cannot be undone.', $user['username'] ) ) . "'" . ')">' . yourls_esc_html__( 'Delete' ) . '</a></td>';
        echo '</tr>';
    }

    echo '</tbody></table></div>';
}
