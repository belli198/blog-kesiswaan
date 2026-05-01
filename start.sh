#!/bin/bash
php artisan migrate --force
php artisan db:seed --force
php artisan storage:link
php artisan optimize:clear
php-fpm -D && caddy run --config /etc/caddy/Caddyfile --adapter caddyfile
