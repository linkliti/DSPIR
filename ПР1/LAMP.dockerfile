# Образ
FROM ubuntu:20.04
ARG DEBIAN_FRONTEND=noninteractive
# Обновления
RUN apt update
RUN apt install -y libapr1-dev libaprutil1-dev libpcre3 libpcre3-dev build-essential
RUN apt install -y pkg-config libxml2-dev libsqlite3-dev zlib1g-dev libpng-dev
# Монтирование файлов сервера
ADD ./server /usr/local/apache2/htdocs/
# Копирование файлов php apache
COPY ./install /mnt/install
# Распаковка
WORKDIR /mnt/install
RUN tar -xzf httpd-2.4.54.tar.gz
RUN tar -xzf php-8.1.10.tar.gz
# Установка apache
WORKDIR /mnt/install/httpd-2.4.54
RUN ./configure --enable-so
RUN make
RUN make install
# Установка php mysql
WORKDIR /mnt/install/php-8.1.10
RUN ./configure --with-apxs2=/usr/local/apache2/bin/apxs --with-pdo-mysql
RUN make
RUN make install
# Порт
EXPOSE 80
# Конфиг
ADD ./config /mnt/config
RUN cat /mnt/config/httpd.conf > /usr/local/apache2/conf/httpd.conf
# Запуск
RUN apt install -y php-mysqlnd
#CMD /usr/local/apache2/bin/apachectl start