# byte-service

### Pré requisitos

#### PHP e Composer

Instalados localmente

#### MySql

Via XAMPP, Docker ou Podman

# Instalação local

### Container do MySql

_Precisa estar de acordo com o .env da aplicação. Por padrão, o Laravel já conta com um .env de exemplo: [.env-example](.env-example). Porém, caso seja necessário, no final desse README, há o conteúdo do .env que estamos utilizando para a aplicação. Será necessário, apenas gerar a **APP_KEY** do projeto, você pode gerá-la através do comando **php artisan key:generate**._

_Caso utilize o **Podman** ou **Docker** para levantar o Banco de Dados, seguem alguns comandos que podem ser úteis:_

podman pull docker.io/library/mysql

podman run -dt -e MYSQL_ROOT_PASSWORD=<MYSQL_ROOT_PASSWORD> -e MYSQL_USER=<MYSQL_USER> -e MYSQL_PASSWORD=<MYSQL_PASSWORD> -e MYSQL_DATABASE=byte --name byte-service -p 3306:3306 mysql:latest

### Comandos para inicar o projeto

_Instala as dependências necessárias para rodar o projeto_
**composer install**

_Cria a tabela do Banco de Dados na estrutura esperada pela aplicação_
**php artisan migrate**

_Inicia o projeto_
**php artisan serve**

### .env

APP_NAME=Laravel
APP_ENV=prod
APP_KEY=<GERADA_AUTOMATICAMENTE>
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=byte
DB_USERNAME=<MYSQL_USER>
DB_PASSWORD=<MYSQL_PASSWORD>

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
