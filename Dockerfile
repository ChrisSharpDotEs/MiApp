FROM php:8.2-apache 

RUN docker-php-ext-install mysqli

COPY . /var/www/html/

RUN a2enmod rewrite

RUN echo "ServerName localhost" >> /etc/apache2/apache2

RUN service apache2 restart

EXPOSE 80