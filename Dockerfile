# Stage 1: Build frontend assets
FROM node:22-alpine AS frontend

WORKDIR /app

COPY package*.json ./
RUN npm install

COPY . .
RUN npm run build


# Stage 2: Laravel application
FROM php:8.2-apache

# Install required PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libxml2-dev \
    && docker-php-ext-install \
    pdo_mysql \
    mbstring \
    xml \
    bcmath \
    zip \
    opcache \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Apache configuration
RUN a2enmod rewrite

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/000-default.conf

# Set working directory
WORKDIR /var/www/html

# Copy Laravel project
COPY . .

# Copy frontend build files
COPY --from=frontend /app/public/build ./public/build

# Install Laravel dependencies
RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction

# Set permissions
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Configure Render port
EXPOSE 10000

CMD ["sh", "-c", "sed -i \"s/Listen 80/Listen ${PORT:-10000}/\" /etc/apache2/ports.conf && sed -i \"s/:80>/:${PORT:-10000}>/\" /etc/apache2/sites-available/000-default.conf && php artisan config:clear && apache2-foreground"]
