# create databases
CREATE DATABASE IF NOT EXISTS `MEYSHOT`;
CREATE DATABASE IF NOT EXISTS `SSMDB2`;

# create tables
CREATE TABLE `MEYSHOT`.`Upload` ( `Uploaddatum` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`Uploaddatum`)) ENGINE = InnoDB;

# create root user and grant rights
CREATE USER 'otto'@'%' IDENTIFIED BY 'otto';
GRANT ALL PRIVILEGES ON *.* TO 'otto'@'%';

# set timezone
SET GLOBAL time_zone = 'Europe/Berlin';