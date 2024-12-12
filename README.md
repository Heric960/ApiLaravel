## Requisitos

* PHP 8.3 ou superior 
* Mysql 8 ou superior
* Composer

## Como rodar o projet baixado

Duplicar o arquivo ".env.exemple" e renomear para ".env".<br>

instalar as dependencias do PHP
```
composer install
```

Gerar a chave no arquivo .env
```
php artisan key:generate
```

Executar as migration
```
php artisan migrate
```

Executar as seed
```
php artisan db:seed
```

Iniciar o projeto criado com Laravel
```
php artisan serve
```

Para acessar a API, é recomendado utilizar o Postman ou similar, para 
simular as requisições à API.
```
http://127.0.0.1:8000/api/users
```

## Sequencia para criar o projeto
Criar o projeto com Laravel
```
composer create-project laravel/laravel .
ou
composer create-project laravel/laravel nome-do-projeto
```
Alterar no arquivo .env as credenciais do banco de dados<br>

Criar o arquivo de rotas para API
```
php artisan install:api
```