FROM php:5.6-apache-jessie
LABEL maintainer="Zabielski, Kamil <kamil.zabielski@outlook.com>"

## Install required dependencies:
## * git,
## * zip,
## * composer.
RUN set -e && \
    apt-get -y update && \
    apt-get -y install git zip && \
    curl -s https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer && \
    chmod +x /usr/local/bin/composer

RUN a2enmod rewrite && \
    docker-php-ext-install pdo pdo_mysql


COPY composer.json ./
COPY composer.lock ./
RUN composer install --no-scripts --no-autoloader
COPY . ./


RUN chown -R www-data:www-data ./
