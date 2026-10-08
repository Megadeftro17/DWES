ARG DEBIAN_FRONTEND=noninteractive
FROM php:8.5-apache
# Configuracion para aplicarla en todos los directorios (dice que las configuraciones hagan que si no encuentra el archivo
# muestre igualmente el directorio si existe)
RUN echo "<Directory /var/www/html>" >> /etc/apache2/sites-available/000-default.conf
RUN echo "Options Indexes" >> /etc/apache2/sites-available/000-default.conf
RUN echo "</Directory>" >> /etc/apache2/sites-available/000-default.conf

RUN apt updata && pecl install xdebug && docker-php-ext-enable xdebug

VOLUME /var/www/html
EXPOSE 80