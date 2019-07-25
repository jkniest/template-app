FROM node:8.15 as nodejs
FROM postgres:11.3 as postgres
FROM php:7.3-cli
LABEL maintainer="Jordan Kniest <mail@jkniest.de>"

# install nodejs from node-image
COPY --from=nodejs /usr/local/bin/node /usr/local/bin/node
COPY --from=nodejs /usr/local/lib/node_modules /usr/local/lib/node_modules
COPY --from=nodejs /opt /opt

RUN ln -s /opt/yarn-v1.*/bin/yarn /usr/local/bin/yarn \
 && ln -s /opt/yarn-v1.*/bin/yarnpkg /usr/local/bin/yarnpkg \
 && ln -s /usr/local/lib/node_modules/npm/bin/npm-cli.js /usr/local/bin/npm \
 && ln -s /usr/local/lib/node_modules/npm/bin/npx-cli.js /usr/local/bin/npx

COPY --from=postgres /usr/lib/postgresql/11/bin/pg_dump /usr/local/bin/pg_dump

RUN apt update && \
	apt install git zip libzip-dev zlib1g-dev libpq-dev jq -y

RUN docker-php-ext-install bcmath pcntl pdo pdo_pgsql zip

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
	php composer-setup.php && \
	php -r "unlink('composer-setup.php');" && \
	mv composer.phar /usr/local/bin/composer && \
	chmod +x /usr/local/bin/composer

RUN mkdir -p /var/www/.config && \
	chmod -R o+w /var/www/.config

COPY ./docker/build/aliases /root/.bashrc

COPY . /srv/app

WORKDIR /srv/app
