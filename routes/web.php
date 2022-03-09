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

Route::get('/', [ItemController::class, 'index'])->name('items.index');

Route::get('users/{user}/items', [UserController::class, 'itemsIndex'])->name('users.items.index');
Route::get('users/{user}/items/bought', [UserController::class, 'itemsBought'])->name('users.items.bought');
Route::get('users/{user}/items/sold', [UserController::class, 'itemsSold'])->name('users.items.sold');
Route::get('users/{user}/comments', [UserController::class, 'comments'])->name('users.comments');
Route::post('users/{user}/comments/create', [UserController::class, 'createComment'])->name('users.comments.create');
Route::get('users/{user}/notifications', [UserController::class, 'notifications'])->name('users.notifications');
Route::get('users/{user}/notifications/{id}/mark-as-read', [UserController::class, 'markAsRead'])->name('users.notifications.markAsRead');
Route::get('users/{user}/notifications/{id}/mark-as-unread', [UserController::class, 'markAsUnread'])->name('users.notifications.markAsUnread');
Route::get('users/{user}/notificaitons/mark-all-read', [UserController::class, 'markAllRead'])->name('users.notifications.markAllRead');
Route::resource('users', UserController::class)->only(['edit', 'update']);

Route::post('/items/{item}/cancel-item', [ItemController::class, 'cancelItem'])->name('items.cancel_item');
Route::post('/items/{item}/cancel-bid', [ItemController::class, 'cancelBid'])->name('items.cancel_bid');
Route::post('/items/{item}/bid', [ItemController::class, 'bid'])->name('items.bid');
Route::get('/items/search', [ItemController::class, 'search'])->name('items.search');
Route::resource('items', ItemController::class)->only(['create', 'store', 'show']);

Route::resource('categories', CategoryController::class)->only(['show']);

Auth::routes(['reset' => false]);
