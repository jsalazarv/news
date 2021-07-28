FROM php:7.3-fpm-alpine

RUN echo 'http://dl-4.alpinelinux.org/alpine/edge/community/' >> /etc/apk/repositories

RUN apk update \
    && apk add \
        --no-cache $PHPIZE_DEPS \
        libwebp-dev \
        libjpeg-turbo-dev \
        libpng-dev \
        libzip-dev \
        unzip \
        zip \
    && pecl install xdebug-2.7.2 \
    && docker-php-ext-enable xdebug

RUN docker-php-ext-configure zip --with-libzip
RUN docker-php-ext-configure gd --with-webp-dir=/usr/include/  --with-jpeg-dir=/usr/include/
RUN docker-php-ext-install bcmath \
    ctype \
    gd \
    json \
    pcntl \
    pdo_mysql \
    zip

RUN curl --silent --show-error https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

COPY conf/php-fpm.conf /usr/local/etc/php-fpm.conf
COPY conf/www.conf /usr/local/etc/php-fpm.d/www.conf

CMD ["php-fpm"]
