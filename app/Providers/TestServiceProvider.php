<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// ddev artisan make:provider TestServiceProvider

//creating service provider isn't enough you need to add it in config/app.php file 
class TestServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    //to run any service you want use or you created
    public function boot(): void
    {
        // dump('somthing');
    }
}
