<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeController::class)->name('Gheit Route');
// Route::get('/', HomeController::class)->middleware('throttle:watch_limiter')->name('Gheit Route');

// Route::get('/users/{id}/{name}', HomeController::class)->whereNumber('id')->whereAlpha('name'); // better to but it as a golobal constrain in RouteServiceProvider 


Route::prefix('dashboard')->group(function () {

    // ==================================== dashboard main page
    Route::view('/', 'dashboard')->name('dashboard');

    // ============================================= products
    // Route::get('products/show/{product:name}', [ProductController::class, 'show'])->name('products.show');
    // Route::resource('products', ProductController::class)->except('show')->parameters(['products' => 'product:name']);
    Route::get('products/show/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::resource('products', ProductController::class)->except('show');

});


Route::fallback(function(){
    // echo 'this is a fallback function';
    return to_route('Gheit Route');
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';

// require __DIR__.'/admins.php';
// require __DIR__.'/merchant.php';