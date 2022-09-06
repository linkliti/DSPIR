# Образ
FROM ubuntu:20.04
ARG DEBIAN_FRONTEND=noninteractive
# Обновления
RUN apt update
# Установка
RUN apt install -y php-common libapache2-mod-php php-cli
RUN apt install -y php-mysql
RUN apt install -y mysql-server mysql-client
# Порт
EXPOSE 80
# Запуск
CMD /etc/init.d/apache2 start; bash