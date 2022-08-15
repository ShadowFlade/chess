FROM php:7.2-apache
COPY chess.conf /etc/apache2/sites-available/chess.conf
RUN docker-php-ext-install mysqli
RUN apt-get --yes update
RUN chmod 777 /var/www/html
RUN chmod 777  /etc/apache2/sites-available
RUN sed -i '/IfModule ssl_module/' /etc/apache2/ports.conf && sed -i '/Listen 443/' /etc/apache2/ports.conf  && sed -i '/<\/IfModule>/' /etc/apache2/ports.conf && cat /etc/apache2/ports.conf
RUN echo "ServerName localhost" >> /etc/apache2/chess.conf && a2enmod rewrite && a2dissite 000-default && a2ensite chess && service apache2 restart
RUN apt-get -qq --yes install vim
RUN apt-get -qq install nano

EXPOSE 80/tcp
EXPOSE 3000/tcp

# service apache2 reload instead of restart?