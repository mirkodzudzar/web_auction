#!/bin/bash
APP_PATH="/var/www/web_auction"
find $APP_PATH -type d -exec chmod 755 {} +
find $APP_PATH -type f -exec chmod 644 {} +
chown -R www-data:www-data $APP_PATH/*