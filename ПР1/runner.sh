set -e # Выход при ошибке
cd ./ПР1
docker build -t lamp_image -f LAMP.dockerfile .
docker run -it --name lamp_server -p8080:80 lamp_image
wslview http://localhost:8080