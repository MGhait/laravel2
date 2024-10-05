<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // dd($request->route());
        // dd(Route::current());
        // dd($request->route()->getName());
        // dd(Route::currentRouteName());
        // dd($request->route()->getAction());
        // dd(Route::currentRouteAction());
        return view('welcome');
    }
}
