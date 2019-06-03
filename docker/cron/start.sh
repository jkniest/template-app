#!/bin/bash

while [ true ]
do
  php /srv/app/artisan schedule:run --verbose --no-interaction &
  sleep 60
done
