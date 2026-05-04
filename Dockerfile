# YOURLS dev image: PHP 8.1 + Apache + GeoIP2 deps + Node 20 for asset
# pipeline. Multi-stage to keep the runtime image small while still being
# able to run `npm run build` inside.

# ---------- Stage 1: build the Tailwind/Alpine bundle -----------------
FROM node:20-alpine AS assets

WORKDIR /build
COPY package.json ./
COPY tailwind.config.js postcss.config.js ./
COPY scripts ./scripts
COPY ui ./ui

RUN npm install --no-audit --no-fund --no-progress \
 && npm run build

# ---------- Stage 2: PHP + Apache runtime -----------------------------
FROM php:8.1-apache

ENV APACHE_DOCUMENT_ROOT=/var/www/html

RUN apt-get update && apt-get install -y --no-install-recommends \
        git \
        unzip \
        libonig-dev \
        libxml2-dev \
        libzip-dev \
        libicu-dev \
        libpng-dev \
        libjpeg-dev \
        libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j"$(nproc)" \
        pdo_mysql \
        mysqli \
        intl \
        mbstring \
        zip \
        gd \
        bcmath \
    && a2enmod rewrite headers \
    && rm -rf /var/lib/apt/lists/*

# Composer (binary copied from the official image to avoid pulling
# Composer's installer at build time)
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

# Apache config
COPY docker/apache-vhost.conf /etc/apache2/sites-available/000-default.conf
COPY docker/php.ini /usr/local/etc/php/conf.d/zz-yourls.ini

WORKDIR /var/www/html

# Composer install. The full source is copied later by docker-compose
# (volume mount) so we only need the lockfile to warm the cache here.
COPY composer.json composer.lock ./
RUN composer install \
        --no-dev \
        --prefer-dist \
        --no-progress \
        --no-scripts \
        --no-interaction \
 && chown -R www-data:www-data /var/www/html

# Pull the compiled bundle from stage 1.
COPY --from=assets /build/ui/assets/dist /var/www/html/ui/assets/dist

# Entrypoint waits for MySQL, materializes user/config.php, then hands
# off to apache2-foreground.
COPY docker/entrypoint.sh /usr/local/bin/yourls-entrypoint
RUN chmod +x /usr/local/bin/yourls-entrypoint

EXPOSE 80
ENTRYPOINT ["yourls-entrypoint"]
CMD ["apache2-foreground"]
