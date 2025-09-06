#!/usr/bin/env bash
set -euo pipefail

# --- ENV ---
: "${YOURLS_SITE:=http://localhost}"
: "${YOURLS_DB_NAME:=yourls}"
: "${YOURLS_DB_USER:=yourls}"
: "${YOURLS_DB_PASS:=yourls_password}"
: "${YOURLS_DB_HOST:=127.0.0.1}"
: "${YOURLS_DB_PREFIX:=yourls_}"
: "${YOURLS_USER:=admin}"
: "${YOURLS_PASS:=admin_password}"
: "${YOURLS_PRIVATE:=true}"

if [ ! -d "/var/lib/mysql/mysql" ]; then
  echo "[init] Initializing MariaDB datadir..."
  mariadb-install-db --user=mysql --basedir=/usr --datadir=/var/lib/mysql >/dev/null
fi

echo "[init] Starting temporary MariaDB to create DB/user..."
mysqld_safe --datadir=/var/lib/mysql --socket=/run/mysqld/mysqld.sock --skip-networking=0 --bind-address=127.0.0.1 &
pid="$!"

for i in {1..30}; do
  if mysqladmin ping --silent; then break; fi
  sleep 1
done

mysql -uroot <<SQL
CREATE DATABASE IF NOT EXISTS \`${YOURLS_DB_NAME}\` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER IF NOT EXISTS '${YOURLS_DB_USER}'@'%' IDENTIFIED BY '${YOURLS_DB_PASS}';
GRANT ALL PRIVILEGES ON \`${YOURLS_DB_NAME}\`.* TO '${YOURLS_DB_USER}'@'%';
FLUSH PRIVILEGES;
SQL

if [ ! -f "/var/www/html/user/config.php" ]; then
  echo "[init] Generating YOURLS user/config.php from template..."
  mkdir -p /var/www/html/user
  envsubst < /etc/yourls-config.php.tpl > /var/www/html/user/config.php
  chown -R www-data:www-data /var/www/html/user
fi

mysqladmin -uroot shutdown || true

chown -R www-data:www-data /var/www/html

exec /usr/bin/supervisord -n -c /etc/supervisor/conf.d/supervisord.conf
