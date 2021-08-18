apt update
apt install -y git
apt install -y zip
apt install -y sqlite
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
mv composer.phar /usr/local/bin/composer
composer update /var/www/html
php-fpm