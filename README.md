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