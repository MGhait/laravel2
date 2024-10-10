<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UplodeImageController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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


    // mcamara pakage for localization
    // you can make it from routeServiceProvider once for all your web routes [BEST PRACTICE]
    // Route::group(
    //     [
    //         'prefix' => LaravelLocalization::setLocale() . '/dashboard',
    //         'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    //     ], function(){
    //     // dd(request()->segment(1));
    //     // ==================================== dashboard main page
    //     Route::view('/', 'dashboard')->name('dashboard');
    //     // Route::view('/', 'dashboard')->name('dashboard')->withoutMiddleware('auth');
    //     // to pass prameter to the middleware 'middlewareName:parameter'
    //     // Route::view('/', 'dashboard')->middleware('test:mohamed,ahmed,mahmoud')->name('dashboard');

    //     // ============================================= products
    //     // Route::get('products/show/{product:name}', [ProductController::class, 'show'])->name('products.show');
    //     // Route::resource('products', ProductController::class)->except('show')->parameters(['products' => 'product:name']);
    //     Route::get('products/show/{product}', [ProductController::class, 'show'])->name('products.show');
    //     Route::resource('products', ProductController::class)->except('show');

    // });



// Route::prefix('dashboard')->middleware('auth')->group(function () {
Route::prefix('dashboard')->group(function () {
    // dd(request()->segment(1));
    // ==================================== dashboard main page
    Route::view('/', 'dashboard')->name('dashboard');
    // Route::view('/', 'dashboard')->name('dashboard')->withoutMiddleware('auth');
    // to pass prameter to the middleware 'middlewareName:parameter'
    // Route::view('/', 'dashboard')->middleware('test:mohamed,ahmed,mahmoud')->name('dashboard');

    // ============================================= products
    // Route::get('products/show/{product:name}', [ProductController::class, 'show'])->name('products.show');
    // Route::resource('products', ProductController::class)->except('show')->parameters(['products' => 'product:name']);
    Route::get('products/show/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::resource('products', ProductController::class)->except('show');

});

// Manual Localizaion 
// // Route::prefix('dashboard')->middleware('auth')->group(function () {
// Route::prefix('{locale}/dashboard')->middleware('locale')->group(function () {
//     // dd(request()->segment(1));
//     // ==================================== dashboard main page
//     Route::view('/', 'dashboard')->name('dashboard');
//     // Route::view('/', 'dashboard')->name('dashboard')->withoutMiddleware('auth');
//     // to pass prameter to the middleware 'middlewareName:parameter'
//     // Route::view('/', 'dashboard')->middleware('test:mohamed,ahmed,mahmoud')->name('dashboard');

//     // ============================================= products
//     // Route::get('products/show/{product:name}', [ProductController::class, 'show'])->name('products.show');
//     // Route::resource('products', ProductController::class)->except('show')->parameters(['products' => 'product:name']);
//     Route::get('products/show/{product}', [ProductController::class, 'show'])->name('products.show');
//     Route::resource('products', ProductController::class)->except('show');

// })->where('locale', '[a-z](2)');



Route::fallback(function(){
    // echo 'this is a fallback function';
    return to_route('Gheit Route');
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// demo for graduation project
// Route::post('/upload', [UplodeImageController::class, 'upload'])->name('update');
// Route::get('/upload', [UplodeImageController::class, 'index']);

require __DIR__.'/auth.php';

// require __DIR__.'/admins.php';
// require __DIR__.'/merchant.php';