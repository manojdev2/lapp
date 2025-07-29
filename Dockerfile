FROM php:8.2-apache

# Install system dependencies for GD and Imagick
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libwebp-dev \
    libxpm-dev \
    libmagickwand-dev \
    imagemagick \
    && docker-php-ext-configure gd \
        --with-freetype \
        --with-jpeg \
        --with-webp \
        --with-xpm \
    && docker-php-ext-install gd mysqli pdo pdo_mysql \
    && pecl install imagick \
    && docker-php-ext-enable gd imagick mysqli

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy project files
COPY . /var/www/html/

# Set ownership (optional but recommended)
RUN chown -R www-data:www-data /var/www/html
