FROM php:7.4-fpm

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    mariadb-client \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libmagickwand-dev --no-install-recommends \
    libonig-dev \
    libzip-dev

# Clear out the local repository of retrieved package files
RUN apt-get clean

# Configure and install the PHP mbstring extension
RUN docker-php-ext-configure mbstring
RUN docker-php-ext-install mbstring

# Install other PHP Extensions
RUN docker-php-ext-install pdo_mysql zip exif pcntl

# Install composer
RUN curl -sS -o composer-setup.php https://getcomposer.org/installer \
&& php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
&& rm composer-setup.php

# Add NodeSource PPA and install Node.js & npm
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash -
RUN apt-get install -y nodejs

# Add user for Laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy existing application directory contents
COPY . /var/www

# Copy existing application directory permissions
COPY --chown=www:www . /var/www

# Change current user to www
USER www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
