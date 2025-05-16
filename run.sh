docker run -v $PWD:/app \
    -v $PWD/webroot:/app/public \
    -v $PWD/config:/app/config \
    -p 80:80 -p 443:443 -p 443:443/udp \
    -e FRANKENPHP_CONFIG="worker ./worker.php" --tty my-php-app
