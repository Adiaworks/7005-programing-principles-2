<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Product;
Use App\Models\User;
Use App\Models\Manufacturer;


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

Route::resource('product', ProductController::class);

Route::get('/', [ProductController::class, 'index']);

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

Route::get('/test', function(){
    //$user = User::find(1);
    //$prods = $user->products;
    //dd($prods);

    $name = 'Apple';
    //$prods = $user->products()->whereRaw('name like ?', array("%$name%"))->get();
    //dd($prods);

    //'manufacturer' is a function defined in the class of product to joint products with manufacturers table
    $products = Product::whereHas('manufacturer', function($query) use ($name){
        return $query->whereRaw('name like ?', array("%$name%")); })->get();
    dd($products);
});

require __DIR__.'/auth.php';
