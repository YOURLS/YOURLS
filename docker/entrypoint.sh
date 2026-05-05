#!/usr/bin/env bash
# YOURLS dev container entrypoint.
# Waits for MySQL, materializes user/config.php from environment,
# then execs whatever command was passed (apache2-foreground by default).

set -euo pipefail

: "${YOURLS_DB_HOST:=db}"
: "${YOURLS_DB_PORT:=3306}"
: "${YOURLS_DB_USER:=yourls}"
: "${YOURLS_DB_PASS:=yourls}"
: "${YOURLS_DB_NAME:=yourls}"
: "${YOURLS_DB_PREFIX:=yourls_}"
: "${YOURLS_SITE:=http://localhost:8080}"
: "${YOURLS_LANG:=}"
: "${YOURLS_UNIQUE_URLS:=true}"
: "${YOURLS_PRIVATE:=true}"
: "${YOURLS_USER:=admin}"
: "${YOURLS_PASS:=changeme}"
: "${YOURLS_COOKIEKEY:=please-replace-this-cookie-key-with-something-long-and-random}"
: "${YOURLS_DEBUG:=true}"
: "${YOURLS_URL_CONVERT:=36}"
: "${YOURLS_UI_DISABLE:=false}"
: "${YOURLS_UI_LEGACY_ASSETS:=true}"
: "${YOURLS_UI_KIT:=true}"

CONFIG_FILE="/var/www/html/user/config.php"

# Wait for MySQL to be ready (up to ~60s).
echo "[entrypoint] waiting for MySQL at ${YOURLS_DB_HOST}:${YOURLS_DB_PORT}..."
for i in $(seq 1 30); do
    if php -r "exit(@(new mysqli('${YOURLS_DB_HOST}', '${YOURLS_DB_USER}', '${YOURLS_DB_PASS}', '${YOURLS_DB_NAME}', ${YOURLS_DB_PORT}))->connect_errno ? 1 : 0);" 2>/dev/null; then
        echo "[entrypoint] MySQL is up."
        break
    fi
    sleep 2
done

# Render user/config.php from env if it doesn't exist already.
if [ ! -f "$CONFIG_FILE" ]; then
    echo "[entrypoint] writing $CONFIG_FILE from environment"
    mkdir -p "$(dirname "$CONFIG_FILE")"

    # Map true/false strings to PHP literals.
    bool_unique=$([ "${YOURLS_UNIQUE_URLS,,}" = "true" ] && echo "true" || echo "false")
    bool_private=$([ "${YOURLS_PRIVATE,,}" = "true" ] && echo "true" || echo "false")
    bool_debug=$([ "${YOURLS_DEBUG,,}" = "true" ] && echo "true" || echo "false")
    bool_uidisable=$([ "${YOURLS_UI_DISABLE,,}" = "true" ] && echo "true" || echo "false")
    bool_uilegacy=$([ "${YOURLS_UI_LEGACY_ASSETS,,}" = "true" ] && echo "true" || echo "false")
    bool_uikit=$([ "${YOURLS_UI_KIT,,}" = "true" ] && echo "true" || echo "false")

    cat > "$CONFIG_FILE" <<PHP
<?php
define( 'YOURLS_DB_USER',   '${YOURLS_DB_USER}' );
define( 'YOURLS_DB_PASS',   '${YOURLS_DB_PASS}' );
define( 'YOURLS_DB_NAME',   '${YOURLS_DB_NAME}' );
define( 'YOURLS_DB_HOST',   '${YOURLS_DB_HOST}:${YOURLS_DB_PORT}' );
define( 'YOURLS_DB_PREFIX', '${YOURLS_DB_PREFIX}' );

define( 'YOURLS_SITE',         '${YOURLS_SITE}' );
define( 'YOURLS_LANG',         '${YOURLS_LANG}' );
define( 'YOURLS_UNIQUE_URLS',  ${bool_unique} );
define( 'YOURLS_PRIVATE',      ${bool_private} );
define( 'YOURLS_COOKIEKEY',    '${YOURLS_COOKIEKEY}' );
define( 'YOURLS_URL_CONVERT',  ${YOURLS_URL_CONVERT} );
define( 'YOURLS_DEBUG',        ${bool_debug} );

\$yourls_user_passwords = [
    '${YOURLS_USER}' => '${YOURLS_PASS}',
];

\$yourls_reserved_URL = [];

// New UI knobs (see ui/README.md)
define( 'YOURLS_UI_DISABLE',        ${bool_uidisable} );
define( 'YOURLS_UI_LEGACY_ASSETS',  ${bool_uilegacy} );
define( 'YOURLS_UI_KIT',            ${bool_uikit} );
PHP
    chown www-data:www-data "$CONFIG_FILE"
fi

# Make sure user/cache exists and is writable for the Blade compiled
# views directory.
mkdir -p /var/www/html/user/cache/views
chown -R www-data:www-data /var/www/html/user/cache

echo "[entrypoint] handing off to: $*"
exec "$@"
