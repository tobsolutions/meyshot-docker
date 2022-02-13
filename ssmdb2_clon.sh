#!/bin/bash
source ../config/ssmdb2_config.sh
echo "Dump wird aus SSMDB2-Datenbank erstellt..";
echo "mysqldump -h192.168.10.200 -umeyton -pmc4hct SSMDB2 > ssmdb2.sql";
echo "Dump erstellt.";
echo "Dump wird auf Webserver eingespielt..";
echo "mysql -h$ssmdb2_host -u$ssmdb2_user -p$ssmdb2_password $ssmdb2_db -f < ssmdb2.sql";
echo "Dump eingespielt.";
echo "Setze Uploaddatum..";
#mysql -h$ssmdb2_host -u$ssmdb2_user -p$ssmdb2_password $ssmdb2_db -e "INSER INTO Upload (Uploaddatum) VALUES (NULL)"
echo "Fertig.";