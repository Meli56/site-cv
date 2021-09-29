FROM php:7.4-fpm-alpine

WORKDIR /var/www/html

RUN addgroup -g 1000 symfony && adduser -G symfony -g symfony -s /bin/sh -D symfony

USER symfony