<?php

namespace Ozparr\AdminlteUsers;

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
        $this->loadViewsFrom(__DIR__ . '/Views', 'adminlte_users');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->publishes([
            __DIR__.'/config/loginoz.php' => config_path('loginoz.php')
        ], 'OzParrAdmin' );
        $this->publishes([
            __DIR__.'/Views/' => base_path('resources/views/vendor/adminlte_users')
        ], 'OzParrAdmin');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Ozparr\AdminlteUsers\Controllers\Auth\LoginController');
        $this->app->make('Ozparr\AdminlteUsers\Controllers\Auth\RegisterController');

        $this->app->make('Ozparr\AdminlteUsers\Controllers\UsersController');
        $this->app->make('Ozparr\AdminlteUsers\Controllers\RolesController');
    }
}
