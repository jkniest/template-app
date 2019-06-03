FROM fholzer/nginx-brotli:v1.16.0
LABEL maintainer="Jordan Kniest <mail@jkniest.de>"

RUN rm /etc/nginx/conf.d/default.conf

COPY docker/nginx/nginx.conf /etc/nginx/nginx.conf
COPY docker/nginx/conf.d/*.conf /etc/nginx/conf.d/

COPY . /srv/app

WORKDIR /srv/app
