#!/bin/sh

echo "- `date -u` starting startup.sh.." >> /proc/1/fd/1
echo  -e  "$(crontab -l)\n*/1 * * * * /home/meyshot/1min.sh" | crontab -
echo  -e  "$(crontab -l)\n*/5 * * * * /home/meyshot/5min.sh" | crontab -
echo  -e  "$(crontab -l)\n*/10 * * * * /home/meyshot/10min.sh" | crontab -
echo  -e  "$(crontab -l)\n*/15 * * * * /home/meyshot/15min.sh" | crontab -
echo  -e  "$(crontab -l)\n*/30 * * * * /home/meyshot/30min.sh" | crontab -

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