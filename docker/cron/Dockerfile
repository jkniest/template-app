FROM php:7.3-cli
LABEL maintainer="Jordan Kniest <mail@jkniest.de>"

RUN apt update && \
	apt install git zip libzip-dev zlib1g-dev libpq-dev -y

RUN docker-php-ext-install bcmath pcntl pdo pdo_pgsql zip

COPY . /srv/app

WORKDIR /srv/app

COPY docker/cron/start.sh /usr/local/bin/start
RUN chmod u+x /usr/local/bin/start

ENTRYPOINT ["/usr/local/bin/start"]
