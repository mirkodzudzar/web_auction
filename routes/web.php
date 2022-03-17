<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\NotificationController;

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

/****************** GUEST ROUTES ******************/

/** HomeController routes */
Route::get('/', [HomeController::class, 'index'])->name('home.index');

/** CategoryContorller routes */
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

/** Auth routes */
Auth::routes(['reset' => false]);

/** USERS ROUTES */
Route::group(['prefix' => 'users/{user}', 'as' => 'users.'], function() {
    /** UserController routes */
    Route::get('/items', [UserController::class, 'itemsIndex'])->name('items.index');

    /** CommentController routes */
    Route::get('/comments', [CommentController::class, 'index'])->name('comments');
});

/** ITEMS ROUTES */
Route::group(['prefix' => 'items', 'as' => 'items.'], function() {
    /** ItemController routes */
    Route::get('{item}', [ItemController::class, 'show'])->name('show');
    Route::get('/search', [ItemController::class, 'search'])->name('search');
});

/****************** AUTH ROUTES ******************/

Route::group(['middleware' => 'auth'], function() {

    /** USERS ROUTES */
    Route::group(['prefix' => 'users/{user}', 'as' => 'users.'], function() {
        /** UserController routes */
        Route::get('/edit', [UserController::class, 'edit'])->name('edit');
        Route::put('', [UserController::class, 'update'])->name('update');
        Route::get('/items/bought', [UserController::class, 'itemsBought'])->name('items.bought');
        Route::get('/items/sold', [UserController::class, 'itemsSold'])->name('items.sold');

        /** CommentController routes */
        Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

        /** NotificationController routes */
        Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');
        Route::post('/notifications/{id}/mark-as-read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
        Route::post('/notifications/{id}/mark-as-unread', [NotificationController::class, 'markAsUnread'])->name('notifications.markAsUnread');
        Route::post('/notificaitons/mark-all-read', [NotificationController::class, 'markAllRead'])->name('notifications.markAllRead');
    });

    /** ITEMS ROUTES */
    Route::group(['prefix' => 'items', 'as' => 'items.'], function() {
    
        /** ItemController routes */
        Route::get('/create', [ItemController::class, 'create'])->name('create');
        Route::put('', [ItemController::class, 'store'])->name('store');
        Route::post('/{item}/cancel-item', [ItemController::class, 'cancelItem'])->name('cancel_item');
        Route::post('/{item}/cancel-bid', [ItemController::class, 'cancelBid'])->name('cancel_bid');
        Route::post('/{item}/bid', [ItemController::class, 'bid'])->name('bid');

        /** InvoicesController routes */
        Route::get('{item}/invoice', [InvoicesController::class, 'invoice'])->name('invoice');
    });
});
