FROM composer as composer

# 构建时需要拷贝的文件

COPY ./composer.json /project/
COPY ./composer.lock /project/

RUN set -x ; cd /project \
     	&& composer install \
           --ignore-platform-reqs \
           --no-interaction \
           --no-plugins \
           --no-scripts \
           --prefer-dist

FROM busybox as code


# 拷贝 vendor
COPY --from=composer /project/vendor/ /code/vendor/

# 将完整代码拷贝到 /code/

COPY . /code/

# 配置文件
COPY k8s/code/.env /code/.env

rm -rf /code/k8s