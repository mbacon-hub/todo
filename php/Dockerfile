FROM php:8.2-fpm

USER root
WORKDIR /var/www/

RUN apt-get update && apt-get install -y \
		libfreetype-dev \
		libjpeg62-turbo-dev \
		libpng-dev \
        libpq-dev \
        git \
        zip

RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql pgsql

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
	&& php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer

RUN chown -R www-data:www-data /var/www/

USER root

EXPOSE 9000