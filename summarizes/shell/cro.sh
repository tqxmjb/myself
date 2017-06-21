#!/bin/bash
source /etc/profile
#echo `date '+%Y-%m-%d %H:%M:%S'` > time.txt
#php /data/www/myself/summarizes/redis.php > time.txt
php /data/www/myself/summarizes/shell/time.php 1> time.txt
#php -v > time.txt
