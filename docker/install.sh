#!/bin/bash

docker exec sf64-1-php-container composer ins
docker exec sf64-1-php-container php bin/console doctrine:database:create
