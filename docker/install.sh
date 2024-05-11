#!/bin/bash

docker exec zzz-php-container composer ins
docker exec zzz-php-container php bin/console doctrine:database:create