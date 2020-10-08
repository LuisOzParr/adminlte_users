<?php

/*
 *Configuracion de LOGIN
 * */
return [


    /*
   |--------------------------------------------------------------------------
   | Redirección cuando se hace el login
   |--------------------------------------------------------------------------
   |
   | La ruta a la que se redireccióna cunando un usuario es autenticado
   |
   */
    'loginRedirec'=>'admin/home',

    'loginRedirecLogout'=>'/login',

    'login_view' => 'auth.login',

    'user' => [
        'image' => false
    ],

    'user_model' => 'App\Models\User'
];