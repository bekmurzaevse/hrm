FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
        apt-utils \
        libpq-dev \
        libpng-dev \
        libjpeg-dev \
        libzip-dev \
        libpng-dev \
        libjpeg-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libgd-dev \
        jpegoptim optipng pngquant gifsicle \
        libonig-dev \
        libxml2-dev \
        zip unzip && \
        docker-php-ext-install pdo_mysql && \
        docker-php-ext-install bcmath && \
        docker-php-ext-install gd && \
        docker-php-ext-install zip && \
        apt-get clean && \
        rm -rf /var/lib/apt/lists/* /mysql-data/* /var/mysql-data/*

# GD extension install & enable
RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# copy php.ini file to php container
COPY ./_docker/images/php/conf.d/php.ini /usr/local/etc/php/conf.d/php.ini

# getting composer & configuration
RUN curl -sS https://getcomposer.org/installer | php -- \
     --install-dir=/usr/local/bin --filename=composer

# install driver pdo_pgsql
RUN docker-php-ext-install pdo_pgsql pgsql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

USER www-data

WORKDIR /var/www/backend
