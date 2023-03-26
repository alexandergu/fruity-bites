#!/bin/sh
set -e

if [ -n "$PHP_FPM_UPSTREAM" ]; then
    echo "Configuring PHP-FPM upstream ($PHP_FPM_UPSTREAM)..."
    sed -i -e "s/127.0.0.1:9000/$PHP_FPM_UPSTREAM/" /etc/nginx/conf.d/default.conf
fi

exec nginx -g 'daemon off;'
