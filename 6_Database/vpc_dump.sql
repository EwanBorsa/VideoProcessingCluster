CREATE DATABASE vpc;
USE vpc;

CREATE TABLE videoSessionPath
(
	sessionId CHAR(32) primary key,
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