# Utilitzem una imatge oficial de PHP amb FPM i extensions necessàries
FROM php:8.2-fpm

# Instal·lem dependències
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libzip-dev \
    && docker-php-ext-install pdo_mysql zip

# Instal·lem Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Defineix el directori de treball
WORKDIR /var/www

# Copiem els fitxers de l'aplicació
COPY . .

# Instal·lem dependències de Laravel
RUN composer install --no-dev --optimize-autoloader

# Donem permisos a les carpetes d'emmagatzematge de Laravel
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Exposem el port 9000 per a PHP-FPM
EXPOSE 9000

CMD ["php-fpm"]