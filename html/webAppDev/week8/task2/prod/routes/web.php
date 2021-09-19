<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Manufacturer;
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


/*
Route::get('/test', function () {
    
    //$product = new Product; Create a new row in the products table
    //$product->name = 'ipod'; filling each column content
    //$product->price = 19.99;
    //$product->manufacturer_id = '2';
    //$product->save();
    
    $product = Product::create(array('name' => 'Playstation', 'price' => 555, 'manufacturer_id' => 2));
    $id = $product->id;
    dd($product);
});

Route::get('/test2', function () {
    
    $products = Product::all();
    //$manufacturers = Manufacturer::all();
    //dd($products);
    foreach ($products as $product) {
        $manufacturer_id = $product->manufacturer_id;
        $manufacture_detail = Manufacturer::whereRaw('id = $manufacturer_id')->get();
        echo $manufacture_detail;
    }
});

Route::get('/test1', function () {
    
    $products = Product::all();
    //$manufacturers = Manufacturer::all();
    //dd($products);
    foreach ($products as $product) {
        $manufacturer_id = $product->manufacturer_id;
        $manufacture_detail = Manufacturer::whereRaw('id = $manufacturer_id')->get();
        echo $manufacture_detail;
    }
});
*/