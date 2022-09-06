set -e # Выход при ошибке
cd ./ПР1

docker build -t lamp_image -f LAMP.dockerfile .
# docker cp CONTAINER_ID:/etc/php/7.4/apache2/php.ini php.ini
ln -s "/mnt/d/Users/popov/Documents/YandexDisk/Облако/Документы Учеба/Сервер/Работы" "/home/alex/server"

docker run -it --name lamp_server \
-v /home/alex/server/task1/server:/var/www/html \
-v /home/alex/server/task1/conf/php.ini:/etc/php/7.4/apache2/php.ini \
-p8080:80 lamp_image

#docker start lamp_server

wslview http://localhost:8080