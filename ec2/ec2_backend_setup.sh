#!/bin/bash
# set -x
NC='\033[0m' # No Color
RED='\033[1;31m'
BLUE='\033[1;34m'
GREEN='\033[1;32m'

APP_DIR=/var/www

echo -e $BLUE; ls $APP_DIR; echo -e $NC

echo "Please enter the existing app name:"
read APP_NAME

while [[ ! -d "$APP_DIR/$APP_NAME" || -z $APP_NAME ]]; do
    echo -e "${RED}App name does not exist yet!${NC}"

    echo -e $BLUE; ls $APP_DIR; echo -e $NC

    echo "Please enter the existing app name again:"
    read APP_NAME
done

echo -e $GREEN$APP_NAME$NC

APP_PATH="$APP_DIR/$APP_NAME"
cd $APP_PATH

sudo cp .env.example .env

# Change folders and files permissions (ownerships)
sudo chown -R www-data:www-data .
sudo usermod -a -G www-data ubuntu
sudo find . -type f -exec chmod 644 {} \;
sudo find . -type d -exec chmod 755 {} \;
sudo chgrp -R www-data storage bootstrap/cache
sudo chmod -R ug+rwx storage bootstrap/cache

sudo composer install # How to run this without sudo? -y not possible for root user

sudo php artisan key:generate

echo
echo -e $BLUE"Please fill out mysql credentials:"$NC

echo
echo "Please enter mysql host name/endpoint:"
read DB_HOST

echo
echo "Please enter mysql username:"
read DB_USERNAME

echo
echo "Please enter mysql password:"
read DB_PASSWORD

while ! mysql -h $DB_HOST -u $DB_USERNAME -p$DB_PASSWORD -e ";" ; do
    echo
    echo -e $RED"Cannot connect to the database, please try again:"$NC
    
    echo
    echo "Please enter mysql host name/endpoint:"
    read DB_HOST

    echo
    echo "Please enter mysql username:"
    read DB_USERNAME

    echo
    echo "Please enter mysql password:"
    read DB_PASSWORD
done

echo
echo -e $GREEN"Successfully connected!"$NC;

echo
echo -e "Please enter existing database name: ${BLUE}(alphanumerics and underscores only)${NC}"
read DB_DATABASE

DB_RESULT=`mysqlshow -h $DB_HOST -u $DB_USERNAME -p$DB_PASSWORD $DB_DATABASE | grep -v Wildcard | grep -o $DB_DATABASE`
# while [[ ! $DB_DATABASE =~ ^[A-Za-z0-9_]+$ ]]; do
while [[ $DB_RESULT != $DB_DATABASE ]]; do
    echo -e $RED"Database does not exist!"$NC

    echo -e "Please enter existing database name: ${BLUE}(alphanumerics and underscores only)${NC}"
    read DB_DATABASE

    DB_RESULT=`mysqlshow -h $DB_HOST -u $DB_USERNAME -p$DB_PASSWORD $DB_DATABASE | grep -v Wildcard | grep -o $DB_DATABASE`
done

echo -e $GREEN$DB_DATABASE$NC

while [[ -z $APP_URL ]]; do
    echo
    echo "Please enter app URL - IP address or domain: (do not leave empty)"
    read APP_URL
done

sudo sed -i "/APP_URL/c\APP_URL=$APP_URL" .env
sudo sed -i "/DB_HOST/c\DB_HOST=$DB_HOST" .env
sudo sed -i "/DB_DATABASE/c\DB_DATABASE=$DB_DATABASE" .env
sudo sed -i "/DB_USERNAME/c\DB_USERNAME=$DB_USERNAME" .env
sudo sed -i "/DB_PASSWORD/c\DB_PASSWORD=$DB_PASSWORD" .env

sudo chmod 777 /etc/apache2/sites-available/$APP_NAME.conf

echo "<VirtualHost *:80>
    ServerName $APP_URL
    ServerAlias $APP_URL
    DocumentRoot ${APP_PATH}/public
    <Directory ${APP_PATH}>
        Options Indexes Includes FollowSymLinks MultiViews
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog \${APACHE_LOG_DIR}/${APP_NAME}.error.log
    CustomLog \${APACHE_LOG_DIR}/${APP_NAME}.access.log combined
</VirtualHost>" > /etc/apache2/sites-available/$APP_NAME.conf

sudo systemctl reload apache2
sudo php artisan migrate:fresh --seed
sudo php artisan storage:link