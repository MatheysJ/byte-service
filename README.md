## Instalação local

# Rodar o projeto

php artisan serve

# Iniciar container do MySql no Podman

podman pull docker.io/library/mysql

podman run -dt -e MYSQL_ROOT_PASSWORD=<MYSQL_ROOT_PASSWORD> -e MYSQL_USER=<MYSQL_USER> -e MYSQL_PASSWORD=<MYSQL_PASSWORD> -e MYSQL_DATABASE=byte --name byte-service -p 3306:3306 mysql:latest
