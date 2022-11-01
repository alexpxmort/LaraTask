## Installation


Entre na pasta laratask e execute o comando

```bash
 docker-compose up -d nginx mysql phpmyadmin
```
Apos subir os containers execute

```bash
 docker-compose exec workspace bash 
```

apos entrar na pasta laratask-api

rodar os comandos na ordem:

```bash
 composer install
```

```bash
 php artisan migrate
```

```bash
 php artisan db:seed --class=UserTaskSeeder
```

## Tests

```bash
 php artisan test
```

## Features

- Create an account
- Login
- Create Task
- Update Task
- Complete Task



## API

- post => '/auth/login'
- post => '/auth/logOut'
- post => '/users/create'

- post => '/tasks/create'
- get => '/tasks/:id'
- get => '/tasks'
- put => '/tasks/:id'
- delete =>  '/tasks/:id'
- patch => '/tasks/completeTask/:id'

## Authors

- [@alexpxmort](https://github.com/alexpxmort)
