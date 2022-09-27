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
echo "- `date -u` Setze lokales Uploaddatum..";
echo "- `date -u` mysql -hsqldb -uroot -pmc4hct MEYSHOT -e 'INSERT INTO 'Upload' ('Uploaddatum') VALUES (CURRENT_TIMESTAMP)'";
mysql -hsqldb -uroot -pmc4hct MEYSHOT -e 'INSERT INTO `Upload` (`Uploaddatum`) VALUES (CURRENT_TIMESTAMP)'
echo "- `date -u` Dump wird aus MEYSHOT-Datenbank erstellt..";
echo "- `date -u` mysqldump -hsqldb -uroot -pmc4hct MEYSHOT > /usr/local/bin/MEYSHOT.sql";
mysqldump -hsqldb -uroot -pmc4hct MEYSHOT > /usr/local/bin/MEYSHOT.sql
echo "- `date -u` Dump für SSMDB2 wird auf Webserver eingespielt..";
echo "- `date -u` mysql -h$ssmdb2_host -u$ssmdb2_user -p$ssmdb2_password $ssmdb2_db -f < /usr/local/bin/SSMDB2.sql";
mysql -h$ssmdb2_host -u$ssmdb2_user -p$ssmdb2_password $ssmdb2_db -f < /usr/local/bin/SSMDB2.sql
echo "- `date -u` Dump für MEYSHOT wird auf Webserver eingespielt..";
echo "- `date -u` mysql -h$ssmdb2_host -u$ssmdb2_user -p$ssmdb2_password $ssmdb2_meyshot -f < /usr/local/bin/MEYSHOT.sql";
mysql -h$ssmdb2_host -u$ssmdb2_user -p$ssmdb2_password $ssmdb2_meyshot -f < /usr/local/bin/MEYSHOT.sql
echo "- `date -u` Fertig.";

echo "- `date -u` ### SMB FTP Upload ###";
mkdir -p html
cd html
echo "- `date -u` Daten von SMB-Freigabe 'html' wird heruntergeladen";
smbclient //192.168.10.200/html -N -c 'cd ./html; prompt; mget *'


ftp -n h2790537.stratoserver.net <<EOF
quote USER svtieba
quote PASS IkOowINN82M%6e7af
prompt
cd dorfcup/html
lcd ./html
mput *
quit
exit;
EOF


cd ..