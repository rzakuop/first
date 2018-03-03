#!/bin/sh

cd /vagrant/dev/mysql

data=false

for cname in `docker ps --filter="name=moving-mysql" --format "{{.Names}}" -q -a`
do
    if [ "$cname" = moving-mysql ]
    then
        docker stop $cname
        docker rm $cname
    fi

    if [ "$cname" = moving-mysql-data ]
    then
        data=true
    fi
done

if [ "$data" = false ]
then
    docker run --name moving-mysql-data -v /var/lib/mysql busybox
fi

docker build -t moving/mysql .

docker run \
       -d \
       --restart=always \
       -v /etc/localtime:/etc/localtime:ro \
       --name moving-mysql \
       --hostname moving-mysql \
       -p 3306:3306 \
       --volumes-from moving-mysql-data \
       -e MYSQL_DATABASE=moving \
       -e MYSQL_USER=moving \
       -e MYSQL_PASSWORD=moving \
       -e MYSQL_ALLOW_EMPTY_PASSWORD=yes \
       moving/mysql \
       --character-set-server=utf8 \
       --collation-server=utf8_unicode_ci
