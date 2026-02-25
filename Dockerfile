FROM php:8.3-apache

# 1. Install dependencies
RUN apt-get update && apt-get install -y \
  libpng-dev \
  zip \
  unzip \
  && docker-php-ext-install pdo_mysql gd

# 2. Configure Apache to look at /app
ENV APACHE_DOCUMENT_ROOT /app
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 3. Set workdir
WORKDIR /app

# 4. Copy your local "src" folder into the container's "/app" folder
# This replaces your "volumes: ./src:/var/www/html"
COPY ./src /app

# 5. Copy your local "database" folder (if your code needs to read it)
COPY ./database /app/database

# 6. Set Permissions
RUN mkdir -p /app/assets/images/uploads && \
  chown -R www-data:www-data /app && \
  chmod -R 755 /app/assets/images/uploads

EXPOSE 80
