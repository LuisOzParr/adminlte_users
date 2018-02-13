Admin Login
==========
Admin Login integra la famosa plantilla AdminLTE junto con un administrador de usuarios y roles.

Instalación
--------------------
Para instalar este paquete ejecuta en la raíz del proyecto lo siguiente:

```
composer require ozparr/admin_templeta
```

Agrega los nuevos provider en el array de ```providers``` que se encuentra en el archivo ```config/app.php:```

```
'providers' => ['
    // ...
    Ozparr\AdminTempleta\AdminTempletasServiceProvider::class,
    Ozparr\AdminLogin\AdminLoginServiceProvider::class,
    Collective\Html\HtmlServiceProvider::class,
    Laracasts\Flash\FlashServiceProvider::class,
    Laravelista\Ekko\EkkoServiceProvider::class,
    // ...
  ],
```
A continuacion agrega los alias en el array ```aliases```
```
'aliases' => [
    // ...
    'Form' => Collective\Html\FormFacade::class,
    'Html' => Collective\Html\HtmlFacade::class,
    'Flash'=> Laracasts\Flash\Flash::class,
    'Ekko' => Laravelista\Ekko\Facades\Ekko::class,
    // ...
],
```

Ahora en el archivo ```app\http\Kernel.php``` agrega en el array ```routeMiddleware``` los siguientes middlewares:
```
 protected $routeMiddleware = [
     ...
     'rolByLvl' => \Ozparr\AdminLogin\Middleware\RolByLvl::class,
     'rolByName' => \Ozparr\AdminLogin\Middleware\RolByName::class
     ...
 ]

```

A continuación agrega en el modelo ```User``` los siguientes métodos:

```
public function rol(){
    return $this->belongsTo('Ozparr\AdminLogin\Models\Rol');
}

public function getImgAttribute($value)
{
    return 'storage/img/users/' . $value;
}

/**
 * @var array $roles
 * @return bool
 */
public function areRol($roles){
    foreach ($roles as $rol){
        if($this->rol->nombre == $rol ){
            return true;
        }
    }
    return false;
}
``` 
También agregar en el array ```fillable``` los siguientes valores:
```
protected $fillable = [
    ...
    'rol_id', 'img'
    ...
];
```

Ejecutamos las migraciones:

```php artisan migrate```

A continuacion ejecutamos los seeds para crear un usuario root 

```
artisan db:seed --class=Ozparr\AdminLogin\DataBase\Seeds\DatabaseSeeder 
```

Crea un link simbólico de ```stograge\public``` a la carpeta ```\public```, para poder guardar las imágenes de los usuarios:

```
php artisan storage:link
```

Por ultimo publicamos los assets en la carpeta publica: 

```
php artisan vendor:publish
```


