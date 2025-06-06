# Use PHP 8.2 official image with CLI + extensions
FROM php:8.2-cli

# Install system dependencies and PHP extensions (MySQL, ZIP, etc.)
RUN apt-get update && apt-get install -y \
    libzip-dev unzip git curl libonig-dev libpng-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory in the container
WORKDIR /app

# Copy composer files first (for faster layer caching)
COPY composer.json composer.lock ./

# Install PHP dependencies (skip platform reqs for Railway)
RUN composer install --no-scripts --ignore-platform-reqs --prefer-dist --no-dev --optimize-autoloader

# Copy the rest of the application code
COPY . .

# Set correct permissions (optional but safe)
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache

# Generate application key (important for Laravel to run)
RUN php artisan key:generate

# Expose port (optional — if using php artisan serve)
EXPOSE 8000

# Start Laravel server (you can change to Nginx if you want later)
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
