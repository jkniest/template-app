FROM postgres:11.3 as postgres
FROM php:7.3-cli
LABEL maintainer="Jordan Kniest <mail@jkniest.de>"

COPY --from=postgres /usr/lib/postgresql/11/bin/pg_dump /usr/local/bin/pg_dump

RUN apt update && \
	apt install git zip libzip-dev zlib1g-dev libpq-dev -y

RUN docker-php-ext-install bcmath pcntl pdo pdo_pgsql zip

COPY . /srv/app

WORKDIR /srv/app

COPY docker/horizon/start.sh /usr/local/bin/start
RUN chmod u+x /usr/local/bin/start

ENTRYPOINT ["/usr/local/bin/start"]
