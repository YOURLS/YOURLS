# syntax=docker/dockerfile:1

FROM php:8.2-apache

RUN apt-get update && apt-get install -y --no-install-recommends \
    mariadb-server mariadb-client \
    supervisor \
    ca-certificates curl git unzip \
  && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN a2enmod rewrite

WORKDIR /var/www/html

COPY . /var/www/html

COPY yourls-config.php.tpl /etc/yourls-config.php.tpl
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
RUN chmod +x /usr/local/bin/entrypoint.sh

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
VOLUME ["/var/lib/mysql"]

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
