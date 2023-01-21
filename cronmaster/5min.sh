echo "- `date -u` 5min.sh job gestartet" >> /proc/1/fd/1

ssmdb2_host=h2790537.stratoserver.net
ssmdb2_user=meyshot
ssmdb2_password=*2Aj72zx
ssmdb2_db=SSMDB2
ssmdb2_meyshot=MEYSHOT
#echo "Dump wird aus SSMDB2-Datenbank erstellt.."
#echo "mysqldump -hsqldb -uroot -pmc4hct SSMDB2 > /usr/local/bin/SSMDB2.sql"
#mysqldump -hsqldb -uroot -pmc4hct SSMDB2 > /usr/local/bin/SSMDB2.sql

echo "- `date -u` ### SSMDB2 MEYSHOT Upload ###";
echo "- `date -u` Dump wird aus SSMDB2-Datenbank erstellt..";
echo "- `date -u` mysqldump -h192.168.10.200 -umeyton -pmc4hct SSMDB2 > /usr/local/bin/SSMDB2.sql";
mysqldump -h192.168.10.200 -umeyton -pmc4hct SSMDB2 > /usr/local/bin/SSMDB2.sql
echo "- `date -u` Dump wird lokal eingespielt..";
echo "- `date -u` mysql -hsqldb -uroot -pmc4hct SSMDB2 -f < /usr/local/bin/SSMDB2.sql";
mysql -hsqldb -uroot -pmc4hct SSMDB2 -f < /usr/local/bin/SSMDB2.sql
echo "- `date -u` Dump für SSMDB2 wird auf Webserver eingespielt..";
echo "- `date -u` mysql -h$ssmdb2_host -u$ssmdb2_user -p$ssmdb2_password $ssmdb2_db -f < /usr/local/bin/SSMDB2.sql";
mysql -h$ssmdb2_host -u$ssmdb2_user -p$ssmdb2_password $ssmdb2_db -f < /usr/local/bin/SSMDB2.sql

echo "- `date -u` Setze Uploaddatum auf Webserver..";
echo "- `date -u` mysql -hsqldb -uroot -pmc4hct MEYSHOT -e 'INSERT INTO Upload (Uploaddatum) VALUES (CURRENT_TIMESTAMP)'";
mysql -h$ssmdb2_host -u$ssmdb2_user -p$ssmdb2_password $ssmdb2_meyshot -e 'INSERT INTO `Upload` (`Uploaddatum`) VALUES (CURRENT_TIMESTAMP)'
echo "- `date -u` Dump wird vom Webserver aus MEYSHOT-Datenbank erstellt..";
echo "- `date -u` mysql -h$ssmdb2_host -u$ssmdb2_user -p$ssmdb2_password $ssmdb2_meyshot -f > /usr/local/bin/MEYSHOT.sql";
mysql -h$ssmdb2_host -u$ssmdb2_user -p$ssmdb2_password $ssmdb2_meyshot > /usr/local/bin/MEYSHOT.sql
echo "- `date -u` Dump für MEYSHOT wird lokal eingespielt..";
echo "- `date -u` mysqldump -hsqldb -uroot -pmc4hct MEYSHOT < /usr/local/bin/MEYSHOT.sql";
mysqldump -hsqldb -uroot -pmc4hct MEYSHOT -f < /usr/local/bin/MEYSHOT.sql
echo "- `date -u` Fertig.";

#SMB FTP Upload
echo "- `date -u` ### SMB FTP Upload ###";
echo "- `date -u` Daten von SMB-Freigabe 'html' werden heruntergeladen";
cd /usr/local/bin/html;
smbclient //192.168.10.200/html -N -c 'prompt; mget *'
cd /usr/local/bin/ergebnis/PDF;
smbclient //192.168.10.200/ergebnis/PDF -N -c 'prompt; mget *'
cd /usr/local/bin/ergebnis/HTML;
smbclient //192.168.10.200/ergebnis/HTML -N -c 'prompt; mget *'
cd ..
#cd ./html; 
echo "- `date -u` Daten werden auf FTP-Server für DorfCup hochgeladen";
ncftpput -R -v -u "svtieba" -p "IkOowINN82M%6e7af" h2790537.stratoserver.net /dorfcup /usr/local/bin/html

echo "- `date -u` Daten werden auf FTP-Server hochgeladen";
ncftpput -R -v -u "svtieba" -p "IkOowINN82M%6e7af" h2790537.stratoserver.net /meytonsmb /usr/local/bin/ergebnis/PDF
ncftpput -R -v -u "svtieba" -p "IkOowINN82M%6e7af" h2790537.stratoserver.net /meytonsmb /usr/local/bin/ergebnis/HTML


