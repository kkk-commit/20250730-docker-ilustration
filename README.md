# 開発系エンジニアのためのDocker絵とき入門
https://www.shuwasystem.co.jp/book/9784798071503.html

## メモ
docker container run --rm -d --name=mail --restart unless-stopped \
-v /path/to/mailpit-data:/data \
-e MP_DATABASE=/data/mailpit.db \
-e MP_UI_AUTH_FILE=/data/authfile \
-e TZ=Europe/London \
-p 8025:8025 \
-p 1025:1025 \
axllent/mailpit


docker container run --name app --rm -d -p 8000:8000 --mount type=bind,source="$(pwd)"/src,target=/my-work --network work-network work-app:0.1.0 /usr/local/bin/php -S 0.0.0.0:8000 --docroot /my-work
docker container run --name db --rm -d -e MYSQL_ROOT_PASSWORD=secret -e MYSQL_USER=app -e MYSQL_PASSWORD=pass1234 -e MYSQL_DATABASE=sample -e TZ=America/El_Salvador -p 3306:3306 --mount type=volume,source=work-db-volume,target=/var/lib/mysql --mount type=bind,source="$(pwd)"/docker/db/init,target=/docker-entrypoint-initdb.d --network work-network mysql:8.2.0
mysql --host=127.0.0.1 --port=3306 --user=app --password=pass1234 sample
docker container run --name mail --rm -d -e TZ=America/El_Salvador -e MP_DATABASE=/data/mailpit.db -p 8025:8025 --mount type=volume,source=work-mail-volume,target=/data --network work-network axllent/mailpit:v1.10.1


docker container run --name db -d -e MYSQL_ROOT_PASSWORD=secret -e MYSQL_USER=app -e MYSQL_PASSWORD=pass1234 -e MYSQL_DATABASE=sample -e TZ=America/El_Salvador -p 3306:3306 --mount type=volume,source=work-db-volume,target=/var/lib/mysql --mount type=bind,source="$(pwd)"/docker/db/init,target=/docker-entrypoint-initdb.d --network work-network mysql:8.2.0


第6部
・環境変数名MP_DATABASE
・ソースコード$success = mail($user['email'], $subject, $message);