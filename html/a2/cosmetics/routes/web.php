<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;
use APp\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Models\Item;
use App\Models\User;
use App\Models\Review;


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

Route::resource('item', ItemController::class);//this route directs to all functions in the ItemController

Route::get('/', [ItemController::class, 'index']);//this route directs to the index function in the ItemController

Route::resource('user', UserController::class);//this route directs to all functions in the UserController

Route::resource('review', ReviewController::class);//this route directs to all functions in the ReviewController

Route::get('review/create_a_review/{item_id}', [ReviewController::class, 'create_a_review']);//this route directs to create_a_review functions in the ReviewController

Route::get('item/upload_images/{item_id}', [ItemController::class, 'upload_images']);//this route directs to upload_images function in the ItemController

Route::post('item/store_images/{item_id}', [ItemController::class, 'store_images']);//this route directs to store_images function in the ItemController

Route::post('review/like/{review_id}', [ReviewController::class, 'like']);//this route directs to like function in the ReviewController

Route::post('review/dislike/{review_id}', [ReviewController::class, 'dislike']);//this route directs to dislike function in the ReviewController

Route::post('user/unfollow/{user_id}', [UserController::class, 'unfollow']);//this route directs to unfollow function in the UserController

Route::post('user/follow/{user_id}', [UserController::class, 'follow']);//this route directs to follow function in the UserController

Route::resource('user/recommendation', [UserController::class, 'recommendation']);//this route directs to the recommendation function

Route::get('documentation', function () {
    return view('documentation.content');
});//this route directs to the documentation display page

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');//this route goes to the welcome dashboard of laravel

require __DIR__.'/auth.php';
