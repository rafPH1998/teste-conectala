### Passo a passo
Clone Repositório
```sh
git clone https://github.com/rafPH1998/teste-conectala
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

- **GET /api/users** - Lista todos os usuários da base de dados.
- **GET /api/users/{id}** - Obtém informações sobre um usuário específico pelo seu ID.
- **POST /api/users** - Cadastra um novo usuário.
- **PUT /api/users/{id}** - Atualiza as informações de um usuário específico pelo seu ID
- **DELETE /api/users/{id}** - Deleta um usuário existente pelo seu ID