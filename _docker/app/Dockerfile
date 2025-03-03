#local dev
FROM php:8.3-fpm

ARG WWW_USER
ARG WWW_GROUP

RUN apt-get update && apt-get install -y \
    curl \
    git \
    libicu-dev \
    libjpeg-dev \
    libpng-dev \
    libpq-dev \
    libwebp-dev \
    libzip-dev \
    unzip \
    zip \
    && docker-php-ext-configure gd --with-jpeg --with-webp \
    && docker-php-ext-install -j$(nproc) \
    bcmath \
    gd \
    intl \
    opcache \
    pdo_mysql \
    zip \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y --no-install-recommends nodejs && \
    apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN groupadd -g "$WWW_GROUP" www_user \
    && useradd -u "$WWW_USER" -g www_user -m www_user

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY . /var/www

RUN chown -R www_user:www_user /var/www \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

USER www_user

COPY ./_docker/app/php.ini /usr/local/etc/php/conf.d/php.ini

WORKDIR /var/www

ENTRYPOINT ["php-fpm"]
