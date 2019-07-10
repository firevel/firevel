#!/bin/bash

# Set env variables in app.yaml
APP_FILE=app.yaml
if [ ! -f "$APP_FILE" ]; then
    cp "$APP_FILE.example" "$APP_FILE"
fi
for i in $(printenv)
do
ENV_KEY="\${$(echo $i | cut -d '=' -f1)}"
ENV_VALUE="$(echo $i | cut -d '=' -f 2-)"
sed -i "s|$ENV_KEY|$ENV_VALUE|g" "$APP_FILE"
done

# Use custom php.ini
cp php.ini /opt/php72/lib/ext.enabled/php.ini

# Install composer to generate bootstrap cache.
composer install

# Generate env for testing
if [ ! -f ".env" ]; then
    cp ".env.example" ".env"
fi
php artisan key:generate --ansi

# Run unit tests
./vendor/bin/phpunit

# Cleanup
rm .env