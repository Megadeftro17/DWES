FROM  ubuntu:latest

# Para que no pregunte fecha y hora
ENV DEBIAN_FRONTEND=noninteractive

# Instalar apache y php
RUN apt-get update && apt-get install -y apache2 php libapache2-mod-php

# Copiar las configuraciones a la carpeta de apache2
COPY ./conf/*.conf /etc/apache2/sites-available/

# Habilitar configuraciones de apache2
RUN a2ensite informatica.conf musica.conf jorge.conf

# Exponer puerto 80 al contenedor
EXPOSE 80

# Para mantener apache ejecutándose en primer plano
CMD ["apachectl","-D","FOREGROUND"]