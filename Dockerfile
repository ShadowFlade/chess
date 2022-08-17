ARG portsconf=/etc/apache2/ports.conf
FROM php:7.2-apache
COPY chess.conf /etc/apache2/sites-available/chess.conf
COPY ports.conf /etc/apache2/ports.conf
COPY 000-default.conf /etc/apache2/sites-enabled/000-default.conf
RUN cat /etc/apache2/ports.conf
RUN docker-php-ext-install mysqli
RUN apt-get --yes update
RUN chmod 777 /var/www/html
RUN chmod 777  /etc/apache2/sites-available

RUN apt install lsof
RUN apt-get install --yes nmap
RUN nmap -sV --reason -A -p 3306 80 8080 3000 localhost
RUN echo "ServerName localhost" >> /etc/apache2/chess.conf && a2enmod rewrite
RUN service apache2 restart
RUN a2dissite 000-default  &&  a2ensite chess  
RUN apt-get -qq install nano

EXPOSE 80/tcp
EXPOSE 3000/tcp
# docker run -it e808aee68694 bash
# service apache2 reload instead of restart?