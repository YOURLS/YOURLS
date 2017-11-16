FROM php:7.0-apache

# copy in source and set config to env-based config
COPY ./ /var/www/html/
COPY ./user/config-env.php /var/www/html/user/config.php

# add .htaccess file
# this is necessary as the htaccess setup is skipped
# if the database is already set up
RUN echo '<IfModule mod_rewrite.c> \n \
    RewriteEngine On \n \
    RewriteBase / \n \
    RewriteCond %{REQUEST_FILENAME} !-f \n \
    RewriteCond %{REQUEST_FILENAME} !-d \n \
    RewriteRule ^.*$ /yourls-loader.php [L] \n \
    </IfModule>' \
    >> /var/www/html/.htaccess 

# php runtime requirements:
# install mysqli php extension and activate modrewrite
RUN docker-php-source extract \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install pdo_mysql \
    && docker-php-source delete \
    && a2enmod rewrite

# set default configuration values
ENV YOURLS_DB_USER replaceme
ENV YOURLS_DB_PASS replaceme
ENV YOURLS_DB_NAME replaceme
ENV YOURLS_DB_HOST replaceme
ENV YOURLS_SITE http://localhost:8080
ENV YOURLS_COOKIEKEY replaceme
ENV YOURLS_ADMIN_PASSWORD replaceme
