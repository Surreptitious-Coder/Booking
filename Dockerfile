FROM php:7.4-apache

WORKDIR "/var/www/html"

ARG DEBIAN_FRONTEND=noninteractive

ENV TZ="WET"

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd gettext mysqli pdo_mysql

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN a2enmod rewrite


RUN mkdir -p /config/etc && mv /etc/timezone /config/etc/ && ln -s /config/etc/timezone /etc/


# Set timezone as specified in /config/etc/timezone
RUN apt-get install -y tzdata; \
ln -fs /usr/share/zoneinfo/Europe/London /etc/localtime; \
dpkg-reconfigure --frontend noninteractive tzdata
