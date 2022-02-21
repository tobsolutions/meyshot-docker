echo "- `date -u` 1min.sh" >> /proc/1/fd/1

ssmdb2_host=h2790537.stratoserver.net
ssmdb2_user=ssmdb2
ssmdb2_password=mc4hct
ssmdb2_db=SSMDB2
#echo "Dump wird aus SSMDB2-Datenbank erstellt.."
#echo "mysqldump -hsqldb -uroot -pmc4hct SSMDB2 > /usr/local/bin/SSMDB2.sql"
#mysqldump -hsqldb -uroot -pmc4hct SSMDB2 > /usr/local/bin/SSMDB2.sql

echo "Dump wird aus SSMDB2-Datenbank erstellt..";
echo "mysqldump -h192.168.10.200 -umeyton -pmc4hct SSMDB2 > /usr/local/bin/SSMDB2.sql";
mysqldump -h192.168.10.200 -umeyton -pmc4hct SSMDB2 > /usr/local/bin/SSMDB2.sql
echo "Dump wird lokal eingespielt..";
echo "mysql -hsqldb -uroot -pmc4hct SSMDB2 -f < /usr/local/bin/SSMDB2.sql";
mysql -hsqldb -uroot -pmc4hct SSMDB2 -f < /usr/local/bin/SSMDB2.sql
echo "Setze lokales Uploaddatum..";
echo "mysql --hsqldb -uroot -pmc4hct MEYSHOT -e 'INSERT INTO `Upload` (`Uploaddatum`) VALUES (CURRENT_TIMESTAMP)'";
mysql --hsqldb -uroot -pmc4hct MEYSHOT -e 'INSERT INTO `Upload` (`Uploaddatum`) VALUES (CURRENT_TIMESTAMP)'
#echo "Fertig.";
#echo "Dump wird auf Webserver eingespielt..";
#mysql -h$ssmdb2_host -u$ssmdb2_user -p$ssmdb2_password $ssmdb2_db -f < /usr/local/bin/SSMDB2.sql";
#echo "Setze Uploaddatum..";
#mysql -h$ssmdb2_host -u$ssmdb2_user -p$ssmdb2_password $ssmdb2_db -e "INSERT INTO `Upload` (`Uploaddatum`) VALUES (CURRENT_TIMESTAMP)"
echo "Fertig.";