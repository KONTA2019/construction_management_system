FROM php:7.4-fpm-alpine

RUN docker-php-ext-install pdo pdo_mysql

# WORKDIR /var/www/html/laravel

EXPOSE 80 443