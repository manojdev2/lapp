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
    curl \
    unzip \
    less \
    && docker-php-ext-configure gd \
        --with-freetype \
        --with-jpeg \
        --with-webp \
        --with-xpm \
    && docker-php-ext-install gd mysqli pdo pdo_mysql \
    && pecl install imagick \
    && docker-php-ext-enable gd imagick mysqli \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Enable Apache mod_rewrite (required for Elementor permalinks)
RUN a2enmod rewrite

# Set correct Apache document root and permissions
ENV APACHE_DOCUMENT_ROOT /var/www/html

# Copy project files
COPY . /var/www/html/

# Set correct permissions and ownership (important for Elementor)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/wp-content

# Ensure uploads and Elementor cache are writable
RUN mkdir -p /var/www/html/wp-content/uploads \
    && mkdir -p /var/www/html/wp-content/elementor \
    && chown -R www-data:www-data /var/www/html/wp-content/uploads \
    && chown -R www-data:www-data /var/www/html/wp-content/elementor

# Optional: Healthcheck to verify WordPress is up
HEALTHCHECK --interval=30s --timeout=10s --start-period=30s --retries=3 \
  CMD curl -f http://localhost/wp-login.php || exit 1

EXPOSE 80

CMD ["apache2-foreground"]
