# Stage 1: Build frontend assets
FROM node:22-alpine AS frontend

WORKDIR /app

COPY package*.json ./
RUN npm install

COPY . .
RUN npm run build


# Stage 2: Laravel application
FROM php:8.2-apache

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libxml2-dev \
    libonig-dev \
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

# Enable Apache rewrite
RUN a2enmod rewrite

# Configure Apache for Render
RUN sed -ri 's/Listen 80/Listen 10000/' /etc/apache2/ports.conf

RUN printf '%s\n' \
    '<VirtualHost *:10000>' \
    '    DocumentRoot /var/www/html/public' \
    '    <Directory /var/www/html/public>' \
    '        AllowOverride All' \
    '        Require all granted' \
    '    </Directory>' \
    '    ErrorLog /var/log/apache2/error.log' \
    '    CustomLog /var/log/apache2/access.log combined' \
    '</VirtualHost>' \
    > /etc/apache2/sites-available/000-default.conf

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

EXPOSE 10000

CMD ["apache2-foreground"]
