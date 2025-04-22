# Imagen base
FROM php:8.2-fpm

# Instalar dependencias necesarias y limpiar archivos temporales
RUN apt-get update && apt-get install -y \
    curl \
    zip \
    unzip \
    git \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd \
    && docker-php-ext-install gd pdo pdo_mysql \
    && rm -rf /var/lib/apt/lists/*

# Instalar Composer desde la imagen oficial
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Crear directorio de trabajo
WORKDIR /var/www

# Copiar TODOS los archivos del proyecto Laravel (incluye artisan, composer.json, etc.)
COPY . .

# Instalar dependencias PHP y Node.js
RUN composer install --no-dev --optimize-autoloader

# Instalar Node.js y dependencias de frontend
RUN curl -fsSL https://deb.nodesource.com/setup_16.x | bash - && \
    apt-get install -y nodejs && \
    npm install --production

# Asignar permisos a Laravel
RUN chown -R www-data:www-data /var/www && \
    chmod -R 755 /var/www && \
    chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Exponer el puerto 9000
EXPOSE 9000

# Ejecutar PHP-FPM
CMD ["php-fpm"]
