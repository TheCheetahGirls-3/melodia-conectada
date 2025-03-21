# Imagen base
FROM php:8.2-fpm

# Instalar dependencias necesarias y limpiar archivos temporales en una sola capa
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

# Crear directorio de la aplicación
WORKDIR /var/www

# Copiar archivos Composer y realizar la instalación de dependencias
COPY composer.json composer.lock /var/www/
RUN composer install --no-dev --optimize-autoloader

# Instalar dependencias de Node.js
COPY package.json package-lock.json /var/www/
RUN curl -fsSL https://deb.nodesource.com/setup_16.x | bash - && \
    apt-get install -y nodejs && \
    npm install --production

# Copiar el resto de los archivos del proyecto
COPY . .

# Establecer permisos para el proyecto completo y archivos específicos de almacenamiento
RUN chown -R www-data:www-data /var/www && \
    chmod -R 755 /var/www && \
    chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Exponer el puerto 9000 (para PHP-FPM)
EXPOSE 9000

# Comando para ejecutar PHP-FPM
CMD ["php-fpm"]
