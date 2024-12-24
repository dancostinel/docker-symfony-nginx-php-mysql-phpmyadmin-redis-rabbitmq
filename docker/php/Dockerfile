FROM php:8.4.1-fpm
RUN apt-get update && apt-get install apt-file -y && apt-file update && apt-get install vim -y --no-install-recommends \
        git \
        g++ \
        zlib1g-dev \
        libxml2-dev \
        libzip-dev \
        unzip \
    && docker-php-ext-install \
        zip \
        intl \
        mysqli \
        pdo pdo_mysql \
        ctype \
        iconv \
        session \
        simplexml \
        pcntl \
        sockets

RUN pear update-channels && pecl update-channels
RUN pecl install redis && docker-php-ext-enable redis

RUN apt-get install -y librabbitmq-dev libssl-dev
RUN pecl install amqp && docker-php-ext-enable amqp

RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer
WORKDIR /var/www/symfony1/
