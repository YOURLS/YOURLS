<?php
/*
Plugin Name: Modern Auth & Landing Page
Plugin URI: https://yourls.org/
Description: Adds self-service registration (multi-user login on top of the config.php admin), a t.ly-style public landing page at the site root, and a restyled login/register screen. Activate this plugin from the Plugins page after install.
Version: 1.0
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
    $ydb = yourls_get_db('write-modern_auth_create_table');
    $ydb->getPdo()->exec(
        "CREATE TABLE IF NOT EXISTS `$table` (
            `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
            `username` VARCHAR(50) NOT NULL,
            `email` VARCHAR(191) NOT NULL,
            `password_hash` VARCHAR(255) NOT NULL,
            `created_at` DATETIME NOT NULL,
            PRIMARY KEY (`id`),
            UNIQUE KEY `username` (`username`),
            UNIQUE KEY `email` (`email`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;"
    );

    yourls_update_option( 'modern_auth_db_ready', true );
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
 * Modern styling: inject the plugin's stylesheet on the login screen only.
 *
 * Note: yourls_do_action('html_head', $context) delivers $context wrapped in a
 * single-element array to action callbacks (accepted_args=1 default in yourls_add_action()
 * combined with how yourls_do_action()/yourls_apply_filter() pass args through) -- unwrap it.
 */
yourls_add_action( 'html_head', 'modern_auth_login_css' );
function modern_auth_login_css( $context ) {
    $context = is_array( $context ) ? ( $context[0] ?? null ) : $context;
    if ( $context !== 'login' ) {
        return;
    }
    echo '<link rel="stylesheet" href="' . yourls_esc_attr( yourls_plugin_url( __DIR__ ) . '/assets/modern.css' ) . '" type="text/css" media="screen" />' . "\n";
}

/**
 * Add a "Create an account" link under the login form.
 */
yourls_add_action( 'login_form_bottom', 'modern_auth_add_register_link' );
function modern_auth_add_register_link() {
    if ( isset( $_GET['registered'] ) ) {
        echo '<p class="modern-auth-success">' . yourls_esc_html__( 'Account created! You can now log in.' ) . '</p>';
    }
    $register_url = yourls_site_url( false ) . '/register.php';
    echo '<p class="modern-auth-register-link"><a href="' . yourls_esc_attr( $register_url ) . '">' . yourls_esc_html__( 'Create an account' ) . '</a></p>';
}

/**
 * Public landing page at the bare site root (t.ly-style), instead of the default
 * "keyword not found, redirect to site root" behaviour, which for an EMPTY keyword
 * would otherwise just bounce back to itself.
 *
 * Note: see comment on modern_auth_login_css() above -- $keyword arrives array-wrapped.
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
