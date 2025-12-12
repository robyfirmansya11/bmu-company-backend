# Stage 1: Build frontend assets
FROM node:20 AS build-frontend

WORKDIR /app
COPY package.json package-lock.json ./
RUN npm ci

COPY . .
RUN npm run build


# Stage 2: PHP + Apache untuk Laravel
FROM php:8.3-apache

# Install extensions yang dibutuhkan Laravel + Filament
RUN apt-get update && apt-get install -y \
    zip unzip git libzip-dev libicu-dev libpq-dev \
    && docker-php-ext-install intl pdo pdo_mysql zip

# Enable Apache rewrite
RUN a2enmod rewrite

WORKDIR /var/www/html

# Copy backend Laravel ke container
COPY . .

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install dependencies Laravel
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Copy built frontend files
COPY --from=build-frontend /app/public/build ./public/build

# Permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 8080

CMD ["php", "-S", "0.0.0.0:8080", "-t", "public"]
