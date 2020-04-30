FROM php:7.2-fpm

COPY . /var/www/html
WORKDIR /var/www

RUN apt-get update && apt-get install curl -y \
    $$ git \
    && curl -s https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    composer install 
  
CMD [ "php-fpm" ]

