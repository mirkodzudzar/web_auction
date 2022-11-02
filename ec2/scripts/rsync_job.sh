#!/bin/bash
APP_PATH="/var/www/laravel_deploy"
TMP_PATH="/tmp/laravel_deploy"
cd $APP_PATH
php artisan down
cd $TMP_PATH
# rsync -av --progress ./ $APP_PATH/ --delete --exclude=".htaccess"
# rsync -av --progress --exclude cache --exclude storage --exclude=".htaccess" --delete  $TMP_PATH $APP_PATH
rsync -av ./ $APP_PATH/ --delete --exclude cache --exclude storage --exclude=".htaccess" --exclude vendor --exclude node_modules
cd $APP_PATH
rm -rf $TMP_PATH
