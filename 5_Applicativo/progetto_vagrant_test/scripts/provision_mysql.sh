#!/bin/bash

echo "MySql provisioning - begin"

ROOTPASSWD=abcd1234

debconf-set-selections <<< "mysql-server mysql-server/root_password password $ROOTPASSWD"
debconf-set-selections <<< "mysql-server mysql-server/root_password_again password $ROOTPASSWD"

sudo apt-get install mysql-server mysql-client -y

echo "Updating bind address"
# update mysql conf file to allow remote access to the db
sudo sed -i "s/.*bind-address.*/bind-address = 0.0.0.0/" /etc/mysql/mysql.conf.d/mysqld.cnf


echo "Restarting mysql service"
sudo service mysql restart

echo "MySql provisioning - end"
