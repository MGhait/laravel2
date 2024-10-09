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

        // Request Path & Methods
        // dd($request->path());
        // dd($request->is('/'));
        // dd($request->routeIs('Gheit route')); // flase ==> [Gheit Route]
        // dd($request->url());  //  main url only
        // dd($request->fullUrl());  // main url + all qurey paramter
        // dd($request->fullUrlWithoutQuery('age'));
        // dd($request->fullUrlWithoutQuery(['age', 'name']));
        // dd($request->fullUrlWithoutQuery('age'));
        // dd($request->method());
        // dd($request->isMethod('get'));
        
        
        // Request Inputs
        // dd($request->all());  // return array
        // dd($request->collect());  // return collection
        // $request->collect()->each(function ($elment) {
        //     dump($elment);
        // });  
        
        // dd($request->input());  // same as all -> gets the input form elment
        // dd($request->query());  // same as all -> gets the qurey form url
        // dd($request->boolean('is_admin'));  
        // dd($request->date('data'));   // return carbon collection
        // dd($request->only(['name', 'age']));
        // dd($request->except(['name', 'age']));
        
        
        //Request Inputs Presence  [has, filled, missing]

        // dd($request->has('age')); 
        // dd($request->hasAny(['name', 'age'])); 
        // dd($request->whenHas('age', function(){
        //     dd('request has age');
        // }, function (){
        //     dd('request dose not have age');
        // })); 

        // dd($request->filled('age')); 
        // dd($request->anyFilled(['name', 'age'])); 
        // dd($request->whenFilled('age', function(){
        //     dd('request has filled age');
        // }, function (){
        //     dd('request dose not have filled age');
        // })); 

        // dd($request->missing('value'));  // opposite of has 
        // dd($request->whenMissing('age', function(){
        //     dd('age is missing');
        // }, function (){
        //     dd('age exists');
        // })); 



        return view('welcome');
    }
}
