#!/bin/bash

echo "Deploying Laravel application..."

cd /var/www/html/organisasi || exit

pwd

echo "Pulling the latest changes from git repository..."
git pull origin main

echo "Installing/updating Composer dependencies..."
composer install --no-interaction --prefer-dist --optimize-autoloader

echo "Running database migrations..."

echo "Clearing and caching configurations..."
php artisan config:cache
php artisan route:cache

echo "Clearing old cached data..."
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

echo "Deployment finished successfully!"
