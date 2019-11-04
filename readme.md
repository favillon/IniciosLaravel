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



