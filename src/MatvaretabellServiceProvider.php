<?php

namespace Krmoller\Matvaretabell;

use Illuminate\Support\ServiceProvider;

class MatvaretabellServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/matvaretabell.php' => config_path('matvaretabell.php')
        ]);
    }

    public function register()
    {
        $this->app->singleton(Matvaretabell::class, function() {
            return new Matvaretabell();
        });
    }

}
