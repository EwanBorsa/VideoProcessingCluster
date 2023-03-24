!/bin/bash

sudo mysql

#db

CREATE DATABASE vpc;
USE vpc;

#users

CREATE USER 'vpcAdmin'@'192.168.56.10' IDENTIFIED BY 'fgxDDFdxvjz__t6r78fo786';
CREATE USER 'vpcAdmin'@'192.168.56.20' IDENTIFIED BY 'fgxDDFdxvjz__t6r78fo786';
CREATE USER 'vpcAdmin'@'localhost' IDENTIFIED BY 'fgxDDFdxvjz__t6r78fo786';
GRANT ALL ON vpc.* TO 'vpcAdmin'@'localhost';
GRANT ALL ON vpc.* TO 'vpcAdmin'@'192.168.56.10';
GRANT ALL ON vpc.* TO 'vpcAdmin'@'192.168.56.20';

#tables

CREATE TABLE videoSessionPath
(
	sessionId INT primary key,
	sessionPath VARCHAR(100)
);

CREATE TABLE format(
	id INT PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(23),
	extension VARCHAR(4),
	signature VARCHAR(23),
	offset INT DEFAULT 0
);

#data

INSERT INTO formats(name, extension, signature, offset) VALUES("Audio Video Interleave", "avi", "52 49 46 46", 0);
INSERT INTO formats(name, extension, signature, offset) VALUES("Flash video", "flv", "46 4C 56 01", 0);
INSERT INTO formats(name, extension, signature, offset) VALUES("WebM video", "wepm", "1A 45 DF A3", 0);
INSERT INTO formats(name, extension, signature, offset) VALUES("Shockwave Flash CWS", "swf", "43 57 53", 0);
INSERT INTO formats(name, extension, signature, offset) VALUES("Shockwave Flash FWS", "swf", "46 57 53", 0);
INSERT INTO formats(name, extension, signature, offset) VALUES("QuickTime movie", "mov", "66 74 79 70 71 74 20 20", 4);
INSERT INTO formats(name, extension, signature, offset) VALUES("Flash MP4 Video", "f4v", "66 74 79 70 66 34 76 20", 4);
INSERT INTO formats(name, extension, signature, offset) VALUES("MPEG-4", "mp4", "66 74 79 70 4D 53 4E 56", 4);
INSERT INTO formats(name, extension, signature, offset) VALUES("MPEG-4 Video", "m4v", "66 74 79 70 4D 34 56 20", 4);
INSERT INTO formats(name, extension, signature, offset) VALUES("ISO Media(MPEG-4)", "mp4", "66 74 79 70 69 73 6F 6D", 4);