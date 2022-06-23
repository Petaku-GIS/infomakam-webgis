FROM ubuntu:20.04

# updating package
RUN apt update -y
RUN apt upgrade -y
RUN apt -y install libssl-dev
ENV DEBIAN_FRONTEND="noninteractive apt-get install -y --no-install-recommends tzdata"
# install php8.1
RUN apt install software-properties-common -y
RUN add-apt-repository ppa:ondrej/php -y
RUN apt update -y
RUN apt upgrade -y
RUN apt install php8.1 -y
RUN apt install php8.1-fpm -y
RUN service php8.1-fpm restart

RUN apt install php8.1-common php8.1-mysql php8.1-xml php8.1-xmlrpc php8.1-curl php8.1-gd php8.1-imagick php8.1-cli php8.1-dev php8.1-imap php8.1-mbstring php8.1-opcache php8.1-soap php8.1-zip php8.1-redis php8.1-intl -y

# copy to container
RUN mkdir /app
WORKDIR /app
COPY . .

RUN chmod -R 777 storage

# installing composer package
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install

RUN cp www.conf /etc/php/8.1/fpm/pool.d/

RUN mkdir -p /run/php/


RUN apt -y install nginx

RUN rm -rf /etc/nginx/sites-enabled/default

RUN cp server.conf /etc/nginx/sites-enabled/server.conf

RUN cp /app/start.sh /start.sh

RUN chmod +x /start.sh

CMD ["/start.sh"]

EXPOSE 80

