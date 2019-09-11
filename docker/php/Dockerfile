FROM php:fpm

LABEL maintainer = 'Bayu Bimantara <bayubimantarar@gmail.com>'

RUN useradd bimantara && \
    apt update && \
    apt install -y curl zip unzip libpng-dev && \
    docker-php-ext-install pdo pdo_mysql gd && \
    curl -s https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer
