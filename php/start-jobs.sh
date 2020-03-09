#!/bin/sh
# Start main jobs

crontab -e & crond -f & cron -f &
docker-php-entrypoint php-fpm