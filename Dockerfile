FROM php:8.2-apache

RUN apt-get update && apt-get install -y libsqlite3-dev

RUN docker-php-ext-install pdo pdo_sqlite

COPY . /var/www/html/

RUN a2enmod rewrite
RUN sed -i 's/Listen 80/Listen 8080/' /etc/apache2/ports.conf
RUN sed -i 's/<VirtualHost \*:80>/<VirtualHost \*:8080>/' /etc/apache2/sites-available/000-default.conf

RUN if [ ! -f /var/www/html/Database/install.lock ]; then php /var/www/html/Database/install.php; touch /var/www/html/Database/install.lock; fi

RUN service apache2 restart

EXPOSE 8080