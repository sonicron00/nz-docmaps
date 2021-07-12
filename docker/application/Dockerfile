FROM php:8.0-rc-fpm

# PHP extensions
RUN apt-get update && apt-get install -y libpq-dev libpng-dev git zip unzip libzip-dev \
    && docker-php-ext-configure zip \
    && docker-php-ext-install pdo pdo_mysql bcmath pdo_pgsql gd zip

# Composer
RUN apt-get install -y curl
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer