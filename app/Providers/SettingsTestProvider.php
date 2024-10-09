<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\View\View as ViewView;
use Illuminate\Support\ServiceProvider;

class SettingsTestProvider extends ServiceProvider
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
    public function boot(): void
    {

        // view::Share to pass data to all views
        // view::composer to pass data to specific view

        // $settings = Settings::find(5);
        $settings = [
            'name' => 'mohamed',
            'address' => '13 Hendawy st'
        ];
        View::Share('settings', $settings);

        $myName = 'Mohamed Saad'; // to share it with all welcome pages 
        View::composer('welcome', function (ViewView $view) use($myName) {
            return $view->with('myName', $myName);
        });

    }
}
