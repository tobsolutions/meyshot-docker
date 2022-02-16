# create databases
CREATE DATABASE IF NOT EXISTS `MEYSHOT`;
CREATE DATABASE IF NOT EXISTS `SSMDB2`;

# create root user and grant rights
CREATE USER 'otto'@'%' IDENTIFIED BY 'otto';
GRANT ALL PRIVILEGES ON *.* TO 'otto'@'%';