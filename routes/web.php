<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group([
    'middleware' => ['auth'],
], function() {
    Route::resource('users', UserController::class)->only(['edit', 'update']);
    Route::post('/items/{item}/cancel', [ItemController::class, 'cancel'])->name('items.cancel');
    Route::post('/items/{item}/bid', [ItemController::class, 'bid'])->name('items.bid');
    Route::resource('items', ItemController::class)->only(['create', 'store', 'show']);
});

Auth::routes(['reset' => false]);
