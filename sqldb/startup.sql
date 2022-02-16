# create databases
CREATE DATABASE IF NOT EXISTS `_aufsichten`;
CREATE DATABASE IF NOT EXISTS `_upload`;
CREATE DATABASE IF NOT EXISTS `_SSMDB2`;

# create root user and grant rights
CREATE USER 'otto'@'localhost' IDENTIFIED BY 'otto';
GRANT ALL PRIVILEGES ON *.* TO 'otto'@'%';