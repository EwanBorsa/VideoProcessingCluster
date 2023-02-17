!/bin/bash

sudo mysql
CREATE DATABASE vpc;
CREATE USER 'vpcAdmin'@'192.168.56.10' IDENTIFIED BY 'fgxDDFdxvjz__t6r78fo786';
CREATE USER 'vpcAdmin'@'192.168.56.20' IDENTIFIED BY 'fgxDDFdxvjz__t6r78fo786';
CREATE USER 'vpcAdmin'@'localhost' IDENTIFIED BY 'fgxDDFdxvjz__t6r78fo786';
GRANT ALL ON vpc.* TO 'vpcAdmin'@'localhost';
GRANT ALL ON vpc.* TO 'vpcAdmin'@'192.168.56.10';
GRANT ALL ON vpc.* TO 'vpcAdmin'@'192.168.56.20';