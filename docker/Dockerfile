FROM php:7.2-apache

LABEL SalesRace <salesrace@salesrace.io>

RUN dpkg-divert --local --rename --add /sbin/initctl && ln -sf /bin/true /sbin/initctl

ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update && apt-get install -y \
        apt-utils \
        libpq-dev \
        libmemcached-dev \
        libxml2-dev \
        libicu-dev \
        libmcrypt-dev \
        zlib1g-dev \
        locales \
        libwebp-dev \
        libxpm-dev \
        libvpx-dev \
        libpng-dev \
        libmagick++-dev \
        libmagickwand-dev \
        libcurl4-openssl-dev \
        libcurl3 \
        libgmp-dev \
        re2c \
        libmhash-dev \
        libmcrypt-dev \
        file \
        && a2enmod rewrite

RUN ln -s /usr/include/x86_64-linux-gnu/gmp.h /usr/local/include/

RUN pecl install xdebug-2.6.0 mcrypt-1.0.1 memcached-3.0.4

RUN docker-php-ext-install -j$(nproc) ctype dom iconv intl \
    json opcache mbstring pdo pdo_mysql pdo_pgsql session simplexml tokenizer xml zip gd pcntl

RUN docker-php-ext-enable memcached xdebug mcrypt \
    && docker-php-ext-configure gd \
        --with-png-dir=/usr \
        --with-jpeg-dir=/usr \
        --with-freetype-dir=/usr \
        --with-xpm-dir=/usr \
        --with-webp-dir=/usr \
        --with-vpx-dir=/usr;

RUN docker-php-ext-configure gmp
RUN docker-php-ext-install gmp

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer \
    && echo 'error_reporting = E_ALL' >> /usr/local/etc/php/conf.d/php-error-reporting.conf \
    && echo 'display_errors = On' >> /usr/local/etc/php/conf.d/php-error-reporting.conf \
    && echo "short_open_tag = Off" >> /usr/local/etc/php/conf.d/php-short-tag.ini \
    && echo "display_startup_errors = On" >> /usr/local/etc/php/conf.d/php-startup-errors.ini

ADD 000-default.conf /etc/apache2/sites-available/000-default.conf

RUN rm -rf /var/lib/apt/lists/* && apt-get clean

EXPOSE 80

WORKDIR /var/www/html