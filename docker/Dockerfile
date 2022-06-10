FROM php:8.0.12-fpm

WORKDIR /var/www/html

RUN apt-get update

RUN apt-get -y install git zip libpq-dev

RUN docker-php-ext-install pdo pdo_mysql mysqli

RUN curl -sL https://getcomposer.org/installer | php -- --install-dir /usr/bin --filename composer

RUN pecl install xdebug

CMD ["php-fpm"]