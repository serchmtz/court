#!/bin/sh
sudo php artisan migrate
sudo php artisan passport:install
sudo php artisan db:seed
sudo php artisan storage:link
php artisan serve --host 0.0.0.0