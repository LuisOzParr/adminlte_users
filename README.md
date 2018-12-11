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
    Ozparr\AdminlteUsers\AdminLoginServiceProvider::class,
    JeroenNoten\LaravelAdminLte\ServiceProvider::class,
    Laracasts\Flash\FlashServiceProvider::class,
    // ...
  ],
```
A continuacion agrega los alias en el array ```aliases```
```
'aliases' => [
    // ...
    'Flash'=> Laracasts\Flash\Flash::class,
    // ...
],
```

Ahora en el archivo ```app\http\Kernel.php``` agrega en el array ```routeMiddleware``` los siguientes middlewares:
```
 protected $routeMiddleware = [
     ...
     'rolByLvl' => \Ozparr\AdminlteUsers\Middleware\RolByLvl::class,
     'rolByName' => \Ozparr\AdminlteUsers\Middleware\RolByName::class
     ...
 ]

```

A continuación agrega en el modelo ```User``` los siguientes métodos:

```
public function rol(){
    return $this->belongsTo('Ozparr\AdminlteUsers\Models\Rol');
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

Ejecutar en consola ```php artisan migrate``` para crear las migraciones

A continuacion ejecutamos los seeds para crear un usuario root 

```
php artisan db:seed --class="\Ozparr\AdminlteUsers\DataBase\Seeds\DatabaseSeeder"
```

Crea un link simbólico de ```stograge\public``` a la carpeta ```\public```, para poder guardar las imágenes de los usuarios:

```
php artisan storage:link
```

En consola ejecuta: ```php artisan vendor:publish``` y elige el tag ```OzParrAdmin``` y ```assets```

Sustituir la sigiente linea de codigo del Middeleware que se encuentra en ```app\app\Http\Middleware\RedirectIfAuthenticated.php```

    return redirect('\home');

por esta

    return redirect(config('loginoz.loginRedirec'));
