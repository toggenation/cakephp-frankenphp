# CakePHP Running in FrankenPHP Docker Container

This currently isn't working because the worker.php isn't right goto the following link for details on a working `frankenphp` setup

https://toggen.com.au/it-tips/frankenphp-caddy-ubuntu-24-04-cakephp/ 

See below for a minimal Docker compose environment with Postgres, Mailpit, PgAdmin and FrankenPHP containers

Tried on Apple Silicon Mac


## Docker FrankenPHP one container
1. Clone repo
2. Run `composer install`
3. Run `./build.sh`
4. Run `./run.sh`
5. Connect to `https://localhost`

## Docker Compose

Mailpit, Postgres, PgAdmin, FrankenPHP images/containers

```sh
cp docker.example.env .env
docker compose build 
docker compose up -d
```

Mailpit: http://localhost:$FORWARD_MAILPIT_DASHBOARD_PORT
PgAdmin: http://localhost:$FORWARD_PGADMIN_PORT
    Login: admin@example.com
    Pass: $POSTGRES_PASSWORD

Once logged into PgAdmin to Register Postgres Server
    Servers (Right click) 
    Choose Register => Server
    Name: postgres
    Host name/address: postgres
    User: $POSTGRES_USER
    Pass: $POSTGRES_PASSWORD


Refer: 

https://discourse.cakephp.org/t/frankenphp-support/12571 \
https://github.com/dunglas/frankenphp/issues/1464
