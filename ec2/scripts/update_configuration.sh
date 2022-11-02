#!/bin/bash
APP_PATH="/var/www/web_auction"
sudo chmod -R 777 $APP_PATH
cd $APP_PATH
# sudo aws --region eu-west-1 s3 cp "s3://laravel_deploy/dev/env" $APP_PATH/.env
php artisan cache:clear
php artisan view:clear
php artisan config:clear
php artisan route:clear
# composer install --no-dev --no-interaction --no-progress --no-scripts
composer install --no-interaction --no-progress --no-scripts
php artisan migrate --force
php artisan storage:link
php artisan view:cache
php artisan config:cache
php artisan route:cache
php artisan queue:restart
php artisan up
