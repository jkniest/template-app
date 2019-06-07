FROM php:7.3-fpm
FROM postgres:11.3 as postgres
LABEL maintainer="Jordan Kniest <mail@jkniest.de>"

COPY --from=postgres /usr/lib/postgresql/11/bin/pg_dump /usr/local/bin/pg_dump

RUN apt update && \
	apt install git zip libzip-dev zlib1g-dev libpq-dev locales -y

RUN docker-php-ext-install bcmath pcntl pdo pdo_pgsql zip

RUN sed -i 's/# de_DE.UTF-8 UTF-8/de_DE.UTF-8 UTF-8/' /etc/locale.gen && \
    locale-gen

RUN mkdir -p /var/www/.config && \
	chmod -R o+w /var/www/.config

COPY . /srv/app

WORKDIR /srv/app
