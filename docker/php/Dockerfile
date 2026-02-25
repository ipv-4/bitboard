FROM php:8.3-fpm

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
  libpng-dev \
  zip \
  unzip \
  && docker-php-ext-install pdo_mysql gd

RUN chown -R www-data:www-data /var/www/html
WORKDIR /var/www/html
