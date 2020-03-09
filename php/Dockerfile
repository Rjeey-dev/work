FROM php:7.2-fpm-alpine

# install deps
RUN set -xe \
    && apk add --no-cache \
        ${PHPIZE_DEPS} \
        curl \
        git \
        openssh \
        openssl \
        icu-dev \
        libpng-dev \
        libxml2-dev \
        libmemcached-dev \
        zlib-dev \
        cyrus-sasl-dev \
        geoip-dev \
        openjdk7-jre \
        gmp \
        gmp-dev \
    && docker-php-ext-install \
        intl \
        pcntl \
        pdo_mysql \
        soap \
        gd \
        sockets \
        opcache \
        bcmath \
        gmp \
        zip \
    && pecl install -f \
        memcached \
        mongodb \
        apcu \
        xdebug \
        geoip-1.1.1 \
        redis \
    && docker-php-ext-enable \
        memcached \
        apcu \
        geoip \
        mongodb \
        redis \
    && apk del ${PHPIZE_DEPS} \
    && rm -rf /tmp/*

# install GeoIP databases
RUN mkdir -p /usr/share/GeoIP
COPY php/GeoIP.dat.gz /usr/share/GeoIP/GeoIP.dat.gz
RUN gunzip /usr/share/GeoIP/GeoIP.dat.gz

# configure timezone
ARG TZ=America/New_York

RUN ln -snf /usr/share/zoneinfo/${TZ} /etc/localtime \
    && echo "${TZ}" > /etc/timezone \
    && echo "date.timezone=${TZ}" > "${PHP_INI_DIR}/conf.d/date_tz.ini"

COPY php/php.ini ${PHP_INI_DIR}/conf.d/

COPY php/crontab /etc/cron.d/crontab
RUN chmod 0644 /etc/cron.d/crontab
RUN crontab /etc/cron.d/crontab

WORKDIR /var/www/app

COPY php/start-jobs.sh /etc/start-jobs.sh
CMD sh /etc/start-jobs.sh