#!/bin/bash

echo Starting server 🚀

/usr/sbin/php-fpm8.1 -D -R
nginx -g 'daemon off; error_log /dev/stdout info;'


