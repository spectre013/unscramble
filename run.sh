docker stop local-php
docker rm local-php
docker run --name local-php -p 8080:80 -d -v /Users/brian/opt/scrambler/public:/srv/app/public local-php