#!/bin/bash

ROOTPASSWD=abcd1234

DBNAME=vagrant
DBUSER=vagrant
DBPASSWD=vagrantpass

echo "Creating new db $DBNAME"
MYSQL_PWD=$ROOTPASSWD mysql -uroot -e "CREATE DATABASE $DBNAME"
MYSQL_PWD=$ROOTPASSWD mysql -uroot -e "CREATE TABLE $DBNAME.test (id INT NOT NULL,name VARCHAR(255) NULL,PRIMARY KEY (id))"
echo "Creating new user $DBUSER"
MYSQL_PWD=$ROOTPASSWD mysql -uroot -e "CREATE USER '$DBUSER'@'%' IDENTIFIED BY '$DBPASSWD'"
MYSQL_PWD=$ROOTPASSWD mysql -uroot -e "grant all privileges on $DBNAME.* to '$DBUSER'@'%'"
MYSQL_PWD=$ROOTPASSWD mysql -uroot -e "FLUSH PRIVILEGES"



