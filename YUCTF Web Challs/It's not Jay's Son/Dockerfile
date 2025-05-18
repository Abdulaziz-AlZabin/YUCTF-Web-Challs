FROM php:8.2-apache

RUN echo "short_open_tag = Off" > /usr/local/etc/php/conf.d/short-open-tag.ini

COPY index.php /var/www/html/index.php

COPY flag.txt /flag.txt
