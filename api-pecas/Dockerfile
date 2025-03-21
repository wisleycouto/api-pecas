#Mantido pela equipe CGATI
FROM php:8.2-apache

ENV APP_ENV=${APP_ENV}
ENV APP_DEBUG=${APP_DEBUG}
ENV APP_URL=${APP_URL}
ENV DATABASE_DRIVER=${DATABASE_DRIVER}
ENV DATABASE_HOST=${DATABASE_HOST}
ENV DATABASE_PORT=${DATABASE_PORT}
ENV DATABASE_NAME=${DATABASE_NAME}
ENV DATABASE_USER=${DATABASE_USER}
ENV DATABASE_PASSWORD=${DATABASE_PASSWORD}
ENV DATABASE_CHARSET=${DATABASE_CHARSET}
ENV TZ=America/Sao_Paulo

WORKDIR /var/www/html/

RUN set -eux && \
    apt-get update && \
    apt-get install -y wget unzip libxslt-dev libldap2-dev libmcrypt-dev libpq-dev libxml2-dev libfreetype6-dev libjpeg62-turbo-dev libpng-dev libtidy-dev zlib1g-dev libzip-dev zip && \
    a2enmod rewrite && \
    docker-php-ext-configure gd --with-jpeg --with-freetype --with-jpeg && \
    docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql && \
    docker-php-ext-install -j$(nproc) iconv gd intl pdo_pgsql pgsql soap zip ldap

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
 	&& HASH="$(wget -q -O - https://composer.github.io/installer.sig)" \
 	&& php -r "if (hash_file('SHA384', 'composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
 	&& php composer-setup.php --install-dir=/usr/local/bin --filename=composer

COPY ./ .

RUN set -eux && \
    composer clearcache && \
    chmod -R 777 ./storage/logs && \
    composer install --no-dev --optimize-autoloader --no-interaction --no-scripts && \
    composer dump-autoload && \
    ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && \
    echo $TZ > /etc/timezone && \
    mv .env.example .env && \ 
    cp ./docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf && \
    chmod +x docker/entrypoint.sh

EXPOSE 80

#CMD ["apache2-foreground"]
