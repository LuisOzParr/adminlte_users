Agrega al archivo ```app\http\Kernel.php``` las sigientes lineas 
```
 protected $routeMiddleware = [
     ...
     'rolByLvl' => \Ozparr\AdminLogin\Middleware\RolByLvl::class,
     'rolByName' => \Ozparr\AdminLogin\Middleware\RolByName::class
     ...
 ]

```

Agregar al modelo ```User``` los siguientes metodos:

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
Tambien agregar en el array ```fillable``` los sigientes valores:

```
protected $fillable = [
    ...
    'rol_id', 
    'img'
    ...
];
```

Ejecutar en consola ```php artisan migrate```

A continuacion ejecutamos los seeds para crear un usuario root 
```
artisan db:seed --class=Ozparr\AdminLogin\DataBase\Seeds\DatabaseSeeder 
```
Crea un link simbolico a stograge public

```
php artisan storage:link
```


