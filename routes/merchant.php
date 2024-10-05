<?php

use Illuminate\Support\Facades\Route;

Route::prefix('merchant')->group(function () {
    
    Route::get('/', function () {
        echo 'this is merchant.php route';
    });
    
});

