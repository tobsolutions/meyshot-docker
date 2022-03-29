# create databases
CREATE DATABASE IF NOT EXISTS `MEYSHOT`;
CREATE DATABASE IF NOT EXISTS `SSMDB2`;

# create tables
CREATE TABLE `MEYSHOT`.`Upload` ( `Uploaddatum` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`Uploaddatum`)) ENGINE = InnoDB;
CREATE TABLE `MEYSHOT`.`Infoticker` ( `ID` INT NOT NULL AUTO_INCREMENT , `Startdatum` TIMESTAMP NULL , `Enddatum` TIMESTAMP NULL , `Titel` TEXT NOT NULL , `Text` TEXT NOT NULL , `Ersteller` TEXT NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB;

# create root user and grant rights
CREATE USER 'otto'@'%' IDENTIFIED BY 'otto';
GRANT ALL PRIVILEGES ON *.* TO 'otto'@'%';

# set timezone
SET GLOBAL time_zone = 'Europe/Berlin';