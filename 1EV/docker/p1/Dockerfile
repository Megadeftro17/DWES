FROM ubuntu:latest
RUN apt update
RUN apt install -y vim
RUN apt install -y apache2
RUN apt install -y php libapache2-mod-php
CMD ["apache2ctl", "-D", "FOREGROUND"]