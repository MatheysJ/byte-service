## Instalação local

# Rodar o projeto

php artisan serve

# Iniciar container do MySql no Podman

podman pull docker.io/library/mysql

podman run -dt -e MYSQL_ALLOW_EMPTY_PASSWORD=true -e MYSQL_DATABASE=laravel --name laravel -p 3306:3306 mysql:latest
