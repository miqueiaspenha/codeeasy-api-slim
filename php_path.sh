#!/bin/sh
docker exec -it codeeasy-php-container php "$@"
return $?