#!/bin/bash

echo "PHP provisioning - begin"

sudo apt-get install php -y
sudo apt-get install php-mysql -y

sudo phpenmod mysqli

echo "inserting custom php.ini"
sudo cp -f /vagrant/scripts/php.ini /etc/php/8.1/apache2/php.ini


sudo service apache2 restart



echo "PHP provisioning - end"
