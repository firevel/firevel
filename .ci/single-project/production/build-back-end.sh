#!/bin/bash

# Use custom php.ini
cp php.ini /opt/php72/lib/ext.enabled/php.ini

# Install composer to generate bootstrap cache.
composer install

if [ ! -f ".env" ]; then
    cp ".env.example" ".env"
    php artisan key:generate --ansi
fi
