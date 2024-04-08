FROM php:8.0-fpm
WORKDIR /var/www/app/

ENV ACCEPT_EULA=Y
ENV TZ=America/Recife
ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -y \
  apt-utils \
  libpng-dev \
  libicu-dev \
  libonig-dev \
  libxml2-dev \
  libtool \
  libcurl4-openssl-dev \
  libzip-dev \
  libxml2-dev \
  gnupg \
  apt-transport-https \
  git \
  nginx \
  && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

RUN docker-php-ext-install \
  intl \
  mbstring \
  exif \
  pcntl \
  bcmath \
  gd \
  mysqli \
  pdo \
  pdo_mysql \
  xml \
  curl \
  zip

COPY --from=composer:2.5.5 /usr/bin/composer /usr/bin/composer

RUN openssl req -subj '/CN=localhost' -x509 -newkey rsa:4096 -nodes -keyout /etc/nginx/conf.d/key.pem -out /etc/nginx/conf.d/cert.pem -days 365

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

COPY ./DockerConfig/nginx/default.conf /etc/nginx/sites-enabled/default
COPY ./DockerConfig/entrypoint.sh /etc/entrypoint.sh

RUN sed -i 's/access.log = \/proc\/self\/fd\/2/access.log = \/dev\/null/g' /usr/local/etc/php-fpm.d/docker.conf

EXPOSE 80

RUN chmod +x /etc/entrypoint.sh

ENTRYPOINT ["/etc/entrypoint.sh"]