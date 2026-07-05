FROM php:8.4-cli

RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev \
    libxml2-dev zip unzip libsqlite3-dev

RUN docker-php-ext-install pdo pdo_mysql pdo_sqlite mbstring exif pcntl bcmath gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install --no-dev --optimize-autoloader --no-scripts --no-interaction

RUN mkdir -p storage/framework/sessions \
    storage/framework/views \
    storage/framework/cache \
    storage/logs \
    bootstrap/cache \
    database

RUN touch database/database.sqlite

RUN chmod -R 775 storage bootstrap/cache database

EXPOSE 8080

CMD php artisan config:clear && \
    php artisan route:clear && \
    php artisan view:clear && \
    php artisan cache:clear && \
    php artisan migrate --force && \
    php artisan storage:link --force && \
    php artisan serve --host=0.0.0.0 --port=$PORT