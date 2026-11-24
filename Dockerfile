FROM node:22-alpine AS frontend

WORKDIR /app

COPY package*.json ./

RUN npm ci

COPY . .

RUN npm run build

FROM php:8.3-apache

RUN apt-get update && apt-get install -y \
    --no-install-recommends \
    git \
    unzip \
    libonig-dev \
    libzip-dev \
    libcurl4-openssl-dev \
    libsqlite3-dev \
    libpq-dev \
    && docker-php-ext-install \
        mbstring \
        zip \
        curl \
        pdo_mysql \
        pdo_pgsql \
        pdo_sqlite \
    && a2enmod rewrite headers \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 \
    /usr/bin/composer \
    /usr/local/bin/composer

WORKDIR /var/www/html

COPY . .

COPY --from=frontend \
    /app/public/build \
    /var/www/html/public/build

RUN composer install \
    --no-dev \
    --prefer-dist \
    --no-interaction \
    --optimize-autoloader

RUN mkdir -p \
    storage/framework/cache/data \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache \
    && chown -R www-data:www-data \
        storage bootstrap/cache \
    && chmod -R ug+rwX \
        storage bootstrap/cache

COPY docker/apache.conf \
    /etc/apache2/sites-available/000-default.conf

RUN printf 'Listen 10000\n' \
    > /etc/apache2/ports.conf

ENV PORT=10000

EXPOSE 10000

CMD ["apache2-foreground"]