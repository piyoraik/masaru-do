FROM php:7.4.11-fpm-buster

RUN apt-get update && \
  apt-get install -y libzip-dev mariadb-client unzip make \
  libmagick++-dev \
  libmagickwand-dev \
  libpq-dev \
  libfreetype6-dev \
  libjpeg62-turbo-dev \
  libpng-dev \
  libwebp-dev \
  gnupg \
  libjpeg-dev \
  zlib1g-dev \
  libxpm-dev && \
  docker-php-ext-configure gd --with-freetype --with-jpeg && \
  docker-php-ext-install zip pdo_mysql gd

RUN curl -sL https://deb.nodesource.com/setup_12.x | bash -
RUN apt-get install -y nodejs git

COPY --from=composer /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

RUN composer global require "laravel/installer"

COPY . /var/www/html/app
WORKDIR /var/www/html/app
RUN composer install

EXPOSE 8000