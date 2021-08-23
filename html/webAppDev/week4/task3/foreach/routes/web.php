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
    // $get = request()->all(); //get the information the user type in 
    // dd($get);
    return view('foreach')->with('get', request()->all());//get the information the user type in and 
    //pass that to the variable 
});
