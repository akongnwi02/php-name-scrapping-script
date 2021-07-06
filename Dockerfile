FROM phpdockerio/php7-cli
# Install apache,vim,supervisor,mysql-client,php-fpm and composer
RUN apt-get update ; \
    apt-get install -y \
    --no-install-recommends \
    wget \
    git \
    php7.0-mbstring

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app