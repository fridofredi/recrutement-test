FROM php:7.2-cli

EXPOSE 80

COPY . /usr/src/myapp
WORKDIR /usr/src/myapp
CMD ["php", "./index.php"]