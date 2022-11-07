FROM php:8.0-fpm-alpine3.13
    
RUN apk add --no-cache \
  freetype \
  libpng \
  libjpeg-turbo \
  freetype-dev \
  libpng-dev \
  libjpeg-turbo-dev \
  gmp \
  gmp-dev

RUN apk update && apk add bash

RUN docker-php-ext-configure gd \
  --with-freetype \
  --with-jpeg

RUN apk del --no-cache freetype-dev libpng-dev libjpeg-turbo-dev

RUN docker-php-ext-install pdo pdo_mysql gmp fileinfo exif

RUN apk add --no-cache $PHPIZE_DEPS

RUN apk add icu-dev
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN docker-php-ext-configure intl && docker-php-ext-install intl

WORKDIR /var/www/peetchme

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -sS https://get.symfony.com/cli/installer | bash
RUN mv /root/.symfony5/bin/symfony /usr/local/bin/symfony