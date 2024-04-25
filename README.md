### Passo a passo
Clone Repositório
```sh
git clone -b laravel-10-com-php-8.1 https://github.com/especializati/setup-docker-laravel.git app-laravel
```
```sh
cd app-laravel
```


Crie o Arquivo .env
```sh
cp .env.example .env
```


Atualize as variáveis de ambiente do arquivo .env
```dosini
APP_URL=http://localhost:8989

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=root
```


Suba os containers do projeto
```sh
docker-compose up -d
```


Acesse o container app
```sh
docker-compose exec app bash
```


Instale as dependências do projeto
```sh
composer install
```


Gere a key do projeto Laravel
```sh
php artisan key:generate
```


Acesse o projeto
[http://localhost:8990](http://localhost:8990)

# Caso não possua o docker instalado

- PHP versão 8+
- Composer 2.7.4

Instale as dependências do projeto
```sh
composer install
```


Gere a key do projeto Laravel
```sh
php artisan key:generate
```


# Estruturando uma API Restful utilizando Laravel para criação de usuários

- **GET /api/usuarios** - Lista todos os usuários da base de dados.
- **GET /api/usuario/{id}** - Obtém informações sobre um usuário específico pelo seu ID.
- **POST /api/usuario** - Cadastra um novo usuário.
- **PUT /api/usuario/{id}** - Atualiza as informações de um usuário específico pelo seu ID
- **DELETE /api/usuario/{id}** - Deleta um usuário existente pelo seu ID