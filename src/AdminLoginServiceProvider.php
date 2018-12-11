<?php

namespace Ozparr\AdminLogin;

use Illuminate\Support\ServiceProvider;

class AdminLoginServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        $this->loadViewsFrom(__DIR__ . '/Views', 'admin_login');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->publishes([
            __DIR__.'/config/loginoz.php' => config_path('loginoz.php')
        ], 'OzParrAdmin' );
        $this->publishes([
            __DIR__.'/Views/templeta/menu/users/' => base_path('resources/views/admin/ozPartials')
        ], 'OzParrAdmin');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Ozparr\AdminLogin\Controllers\Auth\LoginController');
        $this->app->make('Ozparr\AdminLogin\Controllers\Auth\RegisterController');

        $this->app->make('Ozparr\AdminLogin\Controllers\UsersController');
        $this->app->make('Ozparr\AdminLogin\Controllers\RolesController');
    }
}
