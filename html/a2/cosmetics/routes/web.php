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

Route::resource('item', ItemController::class);

Route::get('/', [ItemController::class, 'index']);

Route::resource('uer', ItemController::class);

Route::resource('review', ReviewController::class);

Route::get('review/create_a_review/{item_id}', [ReviewController::class, 'create_a_review']);

Route::get('documentation', function () {
    return view('documentation.content');
});

Route::get('item/upload_images/{item_id}', [ItemController::class, 'upload_images']);

Route::post('item/store_images/{item_id}', [ItemController::class, 'store_images']);

Route::post('item/like/{review_id}', [ReviewController::class, 'like']);

Route::post('item/dislike/{review_id}', [ReviewController::class, 'dislike']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
