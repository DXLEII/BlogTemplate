# Use an official PHP image with Apache
FROM php:8.2-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    && docker-php-ext-install pdo_mysql zip

# Enable mod_rewrite
RUN a2enmod rewrite

# Set the working directory
WORKDIR /var/www/html

# Copy the application code
COPY . /var/www/html

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install project dependencies
RUN composer install

# Copy a template .env file
COPY .env.example .env

# Set permissions for Laravel storage directory
RUN mkdir -p storage/framework/sessions && chmod -R 775 storage && chown -R www-data:www-data storage

# Expose the port for Apache
EXPOSE 80

# Start Apache web server
CMD ["apache2-foreground"]





