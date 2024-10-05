<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admins')->group(function () {
    
    Route::get('/', function () {
        echo 'this is admin.php route';
    });
    
});

