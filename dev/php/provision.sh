#!/bin/sh

cd /vagrant/dev/php


for cname in `docker ps --filter="name=moving-php" --format "{{.Names}}" -q -a`
do
    if [ "$cname" = moving-php ]
    then
        docker stop $cname
        docker rm $cname
    fi
done

docker build -t moving/php .

docker run \
       -d \
       --restart=always \
       -v /etc/localtime:/etc/localtime:ro \
       --name moving-php \
       --hostname moving-php \
       -p 80:80 \
       -v /vagrant:/vagrant \
       --link moving-mysql:moving-mysql \
       -e DESKTOP_NOTIFIER_SERVER_URL=http://192.168.88.1:12345 \
       moving/php

docker cp \
       /vagrant/dev/php/desktop-notifier-client \
       moving-php:/usr/bin/notify-send

docker exec moving-php /vagrant/dev/php/init-env.sh
