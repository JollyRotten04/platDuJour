FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip \
    libzip-dev libpq-dev \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy application code
COPY . .

# Install PHP dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Set permissions
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www

# Expose port
EXPOSE 8000

# Start Laravel dev server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
