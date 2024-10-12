FROM php:8.2-fpm

RUN apt-get update
RUN apt-get install -y curl git

RUN docker-php-ext-install pdo pdo_mysql

COPY ./server/ /var/www/html
#ENTRYPOINT ["./wait-for-it.sh", "db:3306", "--", "php-fpm"]
ENTRYPOINT ["php-fpm"]