FROM php:8.3-fpm

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
  libpng-dev \
  zip \
  unzip \
  && docker-php-ext-install pdo_mysql gd
# Create the directory
RUN mkdir -p /var/www/html/assets/images/uploads

# Give ownership to the web server user (www-data)
RUN chown -R www-data:www-data /var/www/html/assets/images/uploads

# Set permissions so the owner can read/write
RUN chmod -R 755 /var/www/html/assets/images/uploads
RUN chown -R www-data:www-data /var/www/html
WORKDIR /var/www/html
