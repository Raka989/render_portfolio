# Use PHP 8.2 official image with CLI + extensions
FROM php:8.2-cli

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    libzip-dev unzip git curl libonig-dev libpng-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory in the container
WORKDIR /app

# Copy only composer files first (for layer caching)
COPY composer.json composer.lock ./

# Install dependencies
RUN composer install --no-scripts --ignore-platform-reqs --prefer-dist --no-dev --optimize-autoloader

# Copy the rest of the code
COPY . .

# Set permissions
RUN chmod -R 775 storage bootstrap/cache

# Expose port for Laravel serve
EXPOSE 8000

# Run Laravel app and clear config cache first
CMD php artisan config:clear && php artisan serve --host=0.0.0.0 --port=8000
