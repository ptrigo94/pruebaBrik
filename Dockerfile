FROM php:8.0.3-fpm-alpine


RUN docker-php-ext-install pdo pdo_mysql

