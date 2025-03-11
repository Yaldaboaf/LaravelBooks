# Используем официальный образ PHP с поддержкой Apache
FROM php:8.2-fpm

# Устанавливаем необходимые расширения
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Устанавливаем Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Копируем файлы приложения в контейнер
COPY . /var/www

# Устанавливаем рабочую директорию
WORKDIR /var/www

# Устанавливаем права доступа
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache