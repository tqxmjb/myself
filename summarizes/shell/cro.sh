#!/bin/bash
source /etc/profile
#echo `date '+%Y-%m-%d %H:%M:%S'` > time.txt
#php /data/www/redis.php > time.txt
php /data/www/time.php 1> time.txt
#php -v > time.txt
