## Instalação local

# Rodar o projeto

php artisan serve

# Iniciar container do MySql no Podman

podman pull docker.io/library/mysql

podman run -dt -e MYSQL_ROOT_PASSWORD=<MYSQL_ROOT_PASSWORD> -e MYSQL_USER=<MYSQL_USER> -e MYSQL_PASSWORD=<MYSQL_PASSWORD> -e MYSQL_DATABASE=byte --name byte-service -p 3306:3306 mysql:latest

# add cors

## periogoso:

header('Access-Control-Allow-Origin: _');
header('Access-Control-Allow-Methods: _');

## correto:

https://stackoverflow.com/questions/39429462/adding-access-control-allow-origin-header-response-in-laravel-5-3-passport
