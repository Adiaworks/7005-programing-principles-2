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

/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('test', function(){
    $sql = "select * from vehicle";
    $vehicles = DB::select($sql);
    //$items = array(), including all the data in the table/database;
    return view('vehicle_list'); /*dot or slash can be used to go to the directory of items */
    //dd($item);
});
