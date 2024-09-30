echo "- `date -u` 30min.sh job gestartet" >> /proc/1/fd/1

#SMB FTP Upload
echo "- `date -u` ### SMB FTP Upload ###";
echo "- `date -u` PDF Daten von SMB-Freigabe werden heruntergeladen";
cd /usr/local/bin/ergebnis/PDF;
rm -rf *;
smbclient //192.168.10.200/ergebnis -N -c 'prompt; cd PDF; recurse; mget *'
cd ..

echo "- `date -u` PDF Daten werden auf FTP-Server hochgeladen";
ncftpput -R -v -u "svtieba" -p "IkOowINN82M%6e7af" h2790537.stratoserver.net /meytonsmb /usr/local/bin/ergebnis
echo "abc"