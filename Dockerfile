FROM php:8.3-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
  libpng-dev \
  zip \
  unzip \
  && docker-php-ext-install pdo_mysql gd

# Configure Apache to look at /app
ENV APACHE_DOCUMENT_ROOT /app
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# --- RAILWAY FIX: Configure Apache to use the $PORT environment variable ---
ENV PORT=80
RUN sed -i "s/80/\${PORT}/g" /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf
# ---------------------------------------------------------------------------

WORKDIR /app

# Copy the app files
COPY ./src /app
COPY ./database /app/database

# Set Permissions
RUN mkdir -p /app/assets/images/uploads && \
  chown -R www-data:www-data /app && \
  chmod -R 755 /app/assets/images/uploads

EXPOSE ${PORT}
