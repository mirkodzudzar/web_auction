<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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

/** UserController routes */
Route::group(['prefix' => 'users/{user}', 'as' => 'users.'], function() {
    Route::get('/items', [UserController::class, 'itemsIndex'])->name('items.index');
    Route::get('/items/bought', [UserController::class, 'itemsBought'])->name('items.bought');
    Route::get('/items/sold', [UserController::class, 'itemsSold'])->name('items.sold');
    Route::get('/comments', [UserController::class, 'comments'])->name('comments');
    Route::post('/comments/create', [UserController::class, 'createComment'])->name('comments.create');
    Route::get('/notifications', [UserController::class, 'notifications'])->name('notifications');
    Route::get('/notifications/{id}/mark-as-read', [UserController::class, 'markAsRead'])->name('notifications.markAsRead');
    Route::get('/notifications/{id}/mark-as-unread', [UserController::class, 'markAsUnread'])->name('notifications.markAsUnread');
    Route::get('/notificaitons/mark-all-read', [UserController::class, 'markAllRead'])->name('notifications.markAllRead');
});

Route::resource('users', UserController::class)->only(['edit', 'update']);

/** ItemController routes */
Route::get('/', [ItemController::class, 'index'])->name('items.index');

Route::group(['prefix' => 'items', 'as' => 'items.'], function() {
    Route::post('/{item}/cancel-item', [ItemController::class, 'cancelItem'])->name('cancel_item');
    Route::post('/{item}/cancel-bid', [ItemController::class, 'cancelBid'])->name('cancel_bid');
    Route::post('/{item}/bid', [ItemController::class, 'bid'])->name('bid');
    Route::get('/search', [ItemController::class, 'search'])->name('search');
});

Route::resource('items', ItemController::class)->only(['create', 'store', 'show']);

/** CategoryController routes */
Route::resource('categories', CategoryController::class)->only(['show']);

/** Auth routes */
Auth::routes(['reset' => false]);
