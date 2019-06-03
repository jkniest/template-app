FROM php:7.3-fpm
LABEL maintainer="Jordan Kniest <mail@jkniest.de>"

RUN apt update && \
	apt install git zip libzip-dev zlib1g-dev libpq-dev locales -y

RUN docker-php-ext-install bcmath pcntl pdo pdo_pgsql zip

RUN sed -i 's/# de_DE.UTF-8 UTF-8/de_DE.UTF-8 UTF-8/' /etc/locale.gen && \
    locale-gen

RUN mkdir -p /var/www/.config && \
	chmod -R o+w /var/www/.config

COPY . /srv/app

WORKDIR /srv/app
