<?php

/*
 *Configuracion de LOGIN
 * */
return [


    /*
   |--------------------------------------------------------------------------
   | Redireccionar una ves logeado
   |--------------------------------------------------------------------------
   |
   | La ruta a la que se redireccionara cunando un usuario es autenticado
   |
   */
    'loginRedirec'=>'admin/home',

    'loginRedirecLogout'=>'/login',

    'login_view' => 'auth.login',

    'user' => [
        'image' => false
    ],
];