FROM php:7.2-cli

EXPOSE 80
RUN docker-php-ext-install pdo pdo_mysql
COPY . /usr/src/myapp
WORKDIR /usr/src/myapp
CMD ["php", "./index.php"]