FROM php:7.4.30-fpm


COPY k8s/fpm/php.ini /usr/local/etc/php/php.ini
COPY k8s/fpm/error.ini /usr/local/etc/php/conf.d/


# Set timezone  & bak crontab
RUN ln -sf /usr/share/zoneinfo/Asia/Shanghai /etc/localtime \
		 && echo "Asia/Shanghai" > /etc/timezone \
		 && cp /etc/crontab /etc/crontab.bak

WORKDIR /var/www

EXPOSE 9000

ENTRYPOINT ["sh","./entrypoint.sh"]