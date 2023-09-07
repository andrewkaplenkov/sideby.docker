FROM php:8.2-fpm
EXPOSE 9000
WORKDIR /app
RUN apt-get update
RUN apt-get install -y curl zip unzip
RUN docker-php-ext-install pdo pdo_mysql
CMD ["php-fpm"]