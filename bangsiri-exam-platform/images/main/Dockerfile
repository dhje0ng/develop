FROM ubuntu:20.04

MAINTAINER jhyeon <stjhyeon@kakao.com>

ENV DEBIAN_FRONTEND=noninteractive

RUN apt clean -y
RUN apt update -y
RUN apt install apache2 libapache2-mod-php -y
RUN apt install php php-mysqli -y

COPY ./apache2.conf /etc/apache2/apache2.conf

ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data

EXPOSE 31912

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]