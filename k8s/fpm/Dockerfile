FROM php:7.4.30-fpm

# Update packages
RUN apt-get update && \
    pecl channel-update pecl.php.net \
    && apt-get install -y curl \
        wget \
        net-tools \
        iputils-ping \
        nmap  \
        htop \
        vim \
        lsof \
        telnet \
        libmcrypt-dev \
        libjpeg-dev \
        libpng-dev \
        libfreetype6-dev \
        libbz2-dev \
        zlib1g-dev \
        libzip-dev \
        cron

# Clear out the local repository of retrieved package files
# RUN apt-get clean
# Install needed extensions
# Here you can install any other extension that you need during the test and deployment process
RUN apt-get clean; docker-php-ext-install pdo pdo_mysql zip gd pcntl opcache bcmath

RUN pecl install -o -f redis && \
    rm -rf /tmp/pear && \
    docker-php-ext-enable redis

RUN pecl install mcrypt-1.0.4 && \
    docker-php-ext-enable mcrypt



COPY k8s/fpm/php.ini /usr/local/etc/php/php.ini
COPY k8s/fpm/error.ini /usr/local/etc/php/conf.d/


# Set timezone  & bak crontab
RUN ln -sf /usr/share/zoneinfo/Asia/Shanghai /etc/localtime \
		 && echo "Asia/Shanghai" > /etc/timezone \
		 && cp /etc/crontab /etc/crontab.bak

WORKDIR /var/www

EXPOSE 9000

ENTRYPOINT ["sh","./entrypoint.sh"]