FROM php:8.4-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project files
COPY . .

# Install dependencies
RUN composer install --no-dev --optimize-autoloader --no-scripts --no-interaction

# Make sure public/css directory exists and has correct permissions
RUN mkdir -p public/css
RUN chmod -R 775 storage bootstrap/cache public/css

# Expose port
EXPOSE 8080

# Start command
CMD mkdir -p database && \
    touch database/database.sqlite && \
    php artisan migrate --force && \
    php artisan db:seed --force && \
    php artisan storage:link --force && \
    php artisan serve --host=0.0.0.0 --port=$PORT