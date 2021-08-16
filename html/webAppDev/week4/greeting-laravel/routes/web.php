<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('greeting', function () {
    return 'Hello!';
});

Route::get('product', function () {
    return 'Code to list all products';
});

Route::get('user/{name}', function($name){
    return "Hello $name";
});