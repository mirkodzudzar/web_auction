<?php

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

Route::get('users/{user}/items', [UserController::class, 'items_index'])->name('users.items.index');
Route::get('users/{user}/items/bought', [UserController::class, 'items_bought'])->name('users.items.bought');
Route::get('users/{user}/items/sold', [UserController::class, 'items_sold'])->name('users.items.sold');
Route::resource('users', UserController::class)->only(['edit', 'update']);

Route::post('/items/{item}/cancel-item', [ItemController::class, 'cancel_item'])->name('items.cancel_item');
Route::post('/items/{item}/cancel-bid', [ItemController::class, 'cancel_bid'])->name('items.cancel_bid');
Route::post('/items/{item}/bid', [ItemController::class, 'bid'])->name('items.bid');
Route::resource('items', ItemController::class)->only(['create', 'store', 'show']);

Auth::routes(['reset' => false]);
