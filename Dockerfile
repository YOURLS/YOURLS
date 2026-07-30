
# ---- Stage 1: install PHP dependencies with Composer ----
FROM composer:2 AS vendor
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-interaction --optimize-autoloader --ignore-platform-reqs

# ---- Stage 2: runtime image ----
FROM php:8.3-apache

RUN docker-php-ext-install pdo_mysql opcache \
    && a2enmod rewrite \
    && echo "ServerName localhost" >> /etc/apache2/apache2.conf \
    && rm -rf /var/lib/apt/lists/*

# Apache hardening: no directory listing, block dotfiles/backup/lockfiles from
# being served directly, and rewrite everything through yourls-loader.php so
# pretty short URLs work even without a generated .htaccess.
COPY <<'EOF' /etc/apache2/conf-available/yourls-hardening.conf
<Directory /var/www/html>
    Options -Indexes -MultiViews -FollowSymLinks
    AllowOverride All
    Require all granted

    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^.*$ /yourls-loader.php [L]
</Directory>

<FilesMatch "^\.">
    Require all denied
</FilesMatch>

<FilesMatch "\.(lock|log|sql|md|dist|yml|yaml)$">
    Require all denied
</FilesMatch>

<Directory /var/www/html/tests>
    Require all denied
</Directory>
EOF
RUN a2enconf yourls-hardening

WORKDIR /var/www/html
COPY . .
COPY --from=vendor /app/includes/vendor ./includes/vendor

RUN rm -rf .git tests user/config.php \
    && mkdir -p user/pages user/plugins user/languages \
    && chown -R www-data:www-data /var/www/html

COPY <<'EOF' /usr/local/bin/docker-entrypoint.sh
#!/bin/sh
set -e

CONFIG_FILE=/var/www/html/user/config.php

# Only generate config.php if it wasn't provided (eg bind-mounted or baked in)
if [ ! -f "$CONFIG_FILE" ]; then
    : "${YOURLS_DB_HOST:?YOURLS_DB_HOST is required}"
    : "${YOURLS_DB_NAME:?YOURLS_DB_NAME is required}"
    : "${YOURLS_DB_USER:?YOURLS_DB_USER is required}"
    : "${YOURLS_DB_PASS:?YOURLS_DB_PASS is required}"
    : "${YOURLS_SITE:?YOURLS_SITE is required, eg https://sho.rt}"
    : "${YOURLS_COOKIEKEY:?YOURLS_COOKIEKEY is required. Generate one with: openssl rand -hex 32}"
    : "${YOURLS_USER:?YOURLS_USER is required (admin username)}"
    : "${YOURLS_PASSWORD:?YOURLS_PASSWORD is required (admin password)}"

    cat > "$CONFIG_FILE" <<'PHP'
<?php
define( 'YOURLS_DB_USER', getenv('YOURLS_DB_USER') );
define( 'YOURLS_DB_PASS', getenv('YOURLS_DB_PASS') );
define( 'YOURLS_DB_NAME', getenv('YOURLS_DB_NAME') );
define( 'YOURLS_DB_HOST', getenv('YOURLS_DB_HOST') );
define( 'YOURLS_DB_PREFIX', getenv('YOURLS_DB_PREFIX') ?: 'yourls_' );

define( 'YOURLS_SITE', getenv('YOURLS_SITE') );
define( 'YOURLS_LANG', getenv('YOURLS_LANG') ?: '' );
define( 'YOURLS_UNIQUE_URLS', true );
define( 'YOURLS_PRIVATE', getenv('YOURLS_PRIVATE') !== 'false' );
define( 'YOURLS_COOKIEKEY', getenv('YOURLS_COOKIEKEY') );
define( 'YOURLS_URL_CONVERT', (int) (getenv('YOURLS_URL_CONVERT') ?: 36) );
define( 'YOURLS_DEBUG', getenv('YOURLS_DEBUG') === 'true' );

$yourls_user_passwords = [
    getenv('YOURLS_USER') => getenv('YOURLS_PASSWORD'),
];

$yourls_reserved_URL = [];
PHP

    chown www-data:www-data "$CONFIG_FILE"
    chmod 640 "$CONFIG_FILE"
fi

# Some platforms (Sevalla included) route traffic to a container-assigned port
# passed in as $PORT rather than a fixed one -- make Apache listen there.
PORT="${PORT:-80}"
sed -i "s/^Listen .*/Listen ${PORT}/" /etc/apache2/ports.conf
sed -i "s/<VirtualHost \*:[0-9]*>/<VirtualHost *:${PORT}>/" /etc/apache2/sites-enabled/000-default.conf

exec "$@"
EOF
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

EXPOSE 80
ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["apache2-foreground"]
