FROM php:8.2-cli
LABEL maintainer fmihel76@gmail.com

RUN apt-get update \ 
    && apt-get upgrade -y \
    && apt-get install autoconf automake mc -y \
    && apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev && \
    docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ && \
    docker-php-ext-install gd \
    && apt-get install -y libzip-dev zip && docker-php-ext-install zip \
    && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer