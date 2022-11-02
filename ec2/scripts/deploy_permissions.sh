#!/bin/bash
APP_PATH="/var/www/laravel_deploy"
sudo find $APP_PATH -type d -exec chmod 777 {} +
sudo find $APP_PATH -type f -exec chmod 777 {} +
sudo chown -R ubuntu:ubuntu $APP_PATH/*