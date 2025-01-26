# Use official PHP image with FPM (FastCGI Process Manager) for Laravel
FROM php:8.2-fpm

COPY composer.json composer.lock /var/www

# Set the working directory in the container
WORKDIR /var/www

# Install system dependencies and PHP extensions needed for Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev \
    libzip-dev git unzip \
    nodejs npm # Install Node.js and npm for Vue.js

# Install Composer (PHP dependency manager)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

 RUN groupadd -g 1000 www
 RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy the Laravel application code into the container
COPY . /var/www/

# Set proper permissions
RUN chown -R www:www /var/www \ 
    && chmod -R 755 /var/www

USER www

# Install PHP dependencies (Composer) inside the container
RUN /usr/local/bin/composer install

# Expose port 9000 for PHP-FPM and port 80 for Nginx
EXPOSE 9000

CMD ["php-fpm"]
