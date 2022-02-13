#!/bin/sh

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

echo "- `date -u` crond -f"
crond -f