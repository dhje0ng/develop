FROM ubuntu:latest

MAINTAINER jhyeon <stjhyeon@kakao.com>

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -y apache2 \
    libapache2-mod-wsgi-py3 \
    build-essential \
    python3 \
    python3-dev \
    python3-pip \
    && apt-get clean -y \
    && apt-get autoremove -y \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/app

COPY ./requirements.txt /var/www/app/

RUN pip install --no-cache-dir -r requirements.txt

COPY ./apache2.conf /etc/apache2/sites-available/apache2.conf

COPY ./run.wsgi /var/www/app/

COPY ./web/serve.py /var/www/app/serve.py

RUN a2dissite 000-default.conf
RUN a2ensite apache2.conf

EXPOSE 80

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]