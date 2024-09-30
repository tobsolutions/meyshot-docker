#!/bin/sh

echo "- `date -u` crontab -r"
crontab -r

echo "- `date -u` starting startup.sh.." >> /proc/1/fd/1
echo  -e  "$(crontab -l)\n*/1 * * * * /usr/local/1min.sh" | crontab -
echo  -e  "$(crontab -l)\n*/5 * * * * /usr/local/5min.sh" | crontab -
echo  -e  "$(crontab -l)\n*/10 * * * * /usr/local/10min.sh" | crontab -
echo  -e  "$(crontab -l)\n*/15 * * * * /usr/local/15min.sh" | crontab -
echo  -e  "$(crontab -l)\n*/30 * * * * /usr/local/30min.sh" | crontab -

echo "- `date -u` crontab -l"
crontab -l

echo "- `date -u` apk upgrade"
apk upgrade

echo "- `date -u` apk update"
apk update

echo "- `date -u` apk add mysql-client"
apk add mysql-client

echo "- `date -u` apk add samba-client"
apk add samba-client

echo "- `date -u` apk add ncftp"
apk add ncftp

echo "- `date -u` mkdir -p /usr/local/bin"
mkdir -p /usr/local/bin

echo "- `date -u` mkdir -p /usr/local/bin/html"
mkdir -p /usr/local/bin/html

echo "- `date -u` mkdir -p /usr/local/bin/ergebnis/PDF"
mkdir -p /usr/local/bin/ergebnis/PDF

echo "- `date -u` mkdir -p /usr/local/bin/ergebnis/HTML"
mkdir -p /usr/local/bin/ergebnis/HTML

echo "- `date -u` crond -f"
crond -f
