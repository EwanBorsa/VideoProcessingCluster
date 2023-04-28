#!/bin/bash
sudo apt update
sudo apt install mysql-server -y
#sudo mysql -e "ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password by 'roottest'"
#sudo mysql_secure_installation -p
#ALTER USER 'root'@'localhost' IDENTIFIED WITH auth_socket;
#exit
sudo mysql <<EOS
CREATE DATABASE vpc;
USE vpc;
CREATE USER 'vpcAdmin'@'192.168.56.10' IDENTIFIED BY 'fgxDDFdxvjz__t6r78fo786';
CREATE USER 'vpcAdmin'@'192.168.56.20' IDENTIFIED BY 'fgxDDFdxvjz__t6r78fo786';
CREATE USER 'vpcAdmin'@'localhost' IDENTIFIED BY 'fgxDDFdxvjz__t6r78fo786';
GRANT ALL ON vpc.* TO 'vpcAdmin'@'localhost';
GRANT ALL ON vpc.* TO 'vpcAdmin'@'192.168.56.10';
GRANT ALL ON vpc.* TO 'vpcAdmin'@'192.168.56.20';


CREATE TABLE videoSessionPath
(
	sessionId int primary key,
	sessionPath VARCHAR(100)
);

CREATE TABLE format(
	id INT PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(23) DEFAULT NULL,
	extension VARCHAR(4) DEFAULT NULL,
	magic_number VARCHAR(23)
);

INSERT INTO format(name, extension, magic_number) VALUES("Audio Video Interleave", "avi", "52 49 46 46");
INSERT INTO format(name, extension, magic_number) VALUES("QuickTime movie file", "mov", "66 74 79 70 71 74 20 20");
INSERT INTO format(name, extension, magic_number) VALUES("MPEG-4", "mp4", "66 74 79 70 4D 53 4E 56");
INSERT INTO format(name, extension, magic_number) VALUES("Flash video file", "flv", "46 4C 56 01");
INSERT INTO format(name, extension, magic_number) VALUES("Flash MP4 Video File", "f4v", "66 74 79 70 66 34 76 20");
INSERT INTO format(name, extension, magic_number) VALUES("WebM video file", "wepb", "1A 45 DF A3");
INSERT INTO format(name, extension, magic_number) VALUES("MPEG-4 Video", "m4v", "66 74 79 70 4D 34 56 20");
INSERT INTO format(name, extension, magic_number) VALUES("Shockwave Flash CWS", "swf", "43 57 53");
INSERT INTO format(name, extension, magic_number) VALUES("Shockwave Flash FWS", "swf", "46 57 53");
INSERT INTO format(name, extension, magic_number) VALUES("ISO Base Media(MPEG-4)", "mp4", "66 74 79 70 69 73 6F 6D");
INSERT INTO format(name, extension, magic_number) VALUES("MPEG-4", "mp4", "66 74 79 70");
EOS