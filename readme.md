# Inicios con laravel y Codeship

[![Codeship Status for favillon/IniciosLaravel](https://app.codeship.com/projects/37605c90-e0d6-0137-6120-12a315aacd2b/status?branch=master)](https://app.codeship.com/projects/372468)


## Integracion con slack

Se agregaron git y codeship a las notificaciones de slack

## Nueva estructura para la ejecucion de las pruebas

En el auto load de composer se cargo la Clase FeatureTestCase 

```shell
composer dump-autoload
```

## Como modificar el origin de github de https a ssh


Se ejecuta la siguiente sentencia para el cambio de remote. Para mas informacion [Aquí](https://help.github.com/es/github/using-git/changing-a-remotes-url)
```shell
git remote set-url origin git@github.com:<user>/<repositorio>.git
```


## Metodologia TDD

1. Primero definir la prueba
2. Ejecutar prueba
3. Falla
4. Solucionar 


## Filtrar pruebas phpunit

Se debio haber creado previamente el alias 
```shell
code .bashrc
alias t='vendor/bin/phpunit'
```
Ejecutar las pruebas con el alias
```shell
t --filter a_user_create_a_post
```

## Comandos *php artisan*

Crear modulo de autenticacion  
```shell
php artisan make:auth
```

levantar servidor 
```shell
php artisan serve
```

Crear controlador
```shell
php artisan make:controller CreatePostsController
```

Crear migracion
```shell
php artisan migration create_posts_table --create=posts
```

Crear Modelo 
```shell
php artisan make:model Post
```

Definir en que base de datos quiere la migracion 
```shell
php artisan migrate --database=pgsql_test
```

Hacer un refresh de la base de datos
```shell
php artisan mig:ref --database=pgsql_test
```