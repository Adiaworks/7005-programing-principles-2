<?php

use Illuminate\Support\Facades\Route;
use App\Models\Item;
use App\Models\User;
use App\Models\Review;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;

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

Route::resource('review', ReviewController::class);

Route::resource('item', ItemController::class);

Route::resource('user', UserController::class);

Route::get('/', function () {
    return view('welcome');
});

/*
Route::get('/test', function () {
    $review = new Review;
    $review->rating = 4;
    $review->content = 'So happy to use it';
    $review->review_created_at = DB::raw('CURRENT_TIMESTAMP');
    $review->save();
    $id = $review->id;
    dd($id);
});
*/

Route::get('/test', function () {
    $review = new Review;
    $review->rating = '4';
    $review->content = 'I will buy it forever.';
    $review->review_created_at = DB::raw('CURRENT_TIMESTAMP');
    $item = Item::find(6);
    $user = User::find(4);
    $item->reviews()->save($review);
    $user->reviews()->save($review);
    dd($review);

});

