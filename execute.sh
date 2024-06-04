#/bin/bash
if [ ! -d "./vendor" ]; then
  docker run --rm \
      -u "$(id -u):$(id -g)" \
      -v "$(pwd):/var/www/html" \
      -w /var/www/html \
      laravelsail/php83-composer:latest \
      composer install
fi
if [ $1 = "teste" ]; then
  docker run --rm \
      -u "$(id -u):$(id -g)" \
      -v "$(pwd):/var/www/html" \
      -w /var/www/html \
      laravelsail/php83-composer:latest \
      ./vendor/bin/phpunit teste.php
else
  docker run --rm \
      -u "$(id -u):$(id -g)" \
      -v "$(pwd):/var/www/html" \
      -w /var/www/html \
      laravelsail/php83-composer:latest \
      php -f index.php
fi