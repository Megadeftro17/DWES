ARG DEBIAN_FRONTEND=noninteractive
FROM ubuntu:latest
RUN apt update

RUN apt install -y apache2 php libapache2-mod-php

WORKDIR /var/www/html

COPY ./conf/achraf.conf /etc/apache2/sites-available/achraf.conf
COPY ./conf/informatica.conf /etc/apache2/sites-available/informatica.conf
COPY ./conf/musica.conf /etc/apache2/sites-available/musica.conf


RUN mkdir /var/www/html/jorge
RUN mkdir /var/www/html/musica
RUN mkdir /var/www/html/infromatica

RUN a2ensite jorge.conf musica.conf informatica.conf

CMD ["apachectl", "-D", "FOREGROUND"]