#runner for gitlab
FROM php:8.3-fpm

ARG WWW_USER=1000
ARG WWW_GROUP=1000

RUN apt-get update && apt-get install -y --no-install-recommends \
      apt-utils \
      git \
      libicu-dev \
      libjpeg-dev \
      libpng-dev \
      libpq-dev \
      libwebp-dev \
      libzip-dev \
      unzip \
      zip && \
    docker-php-ext-configure gd --with-jpeg --with-webp && \
    docker-php-ext-install \
      bcmath \
      gd \
      intl \
#      opcache \ # сильно грузит процессор на дроплете и не хватает ресурсов для этого
      pdo_mysql \
      zip && \
    apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

COPY ./_docker/app/php.ini /usr/local/etc/php/conf.d/php.ini

# Копируем файлы проекта
COPY . /var/www

COPY composer.*  ./

# Установка Composer
ENV COMPOSER_ALLOW_SUPERUSER=1
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Добавляем alias (опционально)
RUN echo "alias a='artisan'" >> /root/.bashrc

# Установка Node.js
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y --no-install-recommends nodejs && \
    apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Установка зависимостей через Composer
RUN composer install \
      --no-interaction \
      --no-plugins \
      --no-suggest \
      --no-scripts \
      --no-autoloader \
      --prefer-dist

# Генерация оптимизированного автозагрузчика.
# Это полезно для production-окружения – если хочешь ускорить автозагрузку, оставь эту строку.
#RUN composer dump-autoload --no-scripts --optimize

# Создаем пользователя и группу
RUN groupadd -g "$WWW_GROUP" www_user \
    && useradd -u "$WWW_USER" -g www_user -m www_user

# Проставляем права на файлы проекта
RUN chown -R www_user:www_user /var/www \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Переключаемся на созданного пользователя
USER www_user

WORKDIR /var/www
