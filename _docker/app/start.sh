#!/bin/bash

# Start PHP-FPM
php-fpm &

exec /usr/sbin/httpd -D FOREGROUND