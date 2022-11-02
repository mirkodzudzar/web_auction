#!/bin/bash
APP_PATH="/var/www/web_auction"
sudo find $APP_PATH -type d -exec chmod 777 {} +
sudo find $APP_PATH -type f -exec chmod 777 {} +
sudo chown -R ubuntu:ubuntu $APP_PATH/*