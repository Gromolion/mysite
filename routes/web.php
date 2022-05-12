<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\Admin\ResetController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Person\PersonController;
use App\Http\Controllers\Admin\CategoryController;

Auth::routes([
    'confirm' => false,
    'verify' => false
]);
Route::get('/logout', [LoginController::class, 'logout'])->name('get-logout');

Route::group([
    'middleware' => 'auth'
], function() {
    Route::group([
        'prefix' => 'person'
    ], function() {
        Route::get('orders', [PersonController::class, 'orders'])->name('person.orders');
    });
    Route::group([
        'middleware' => 'is_admin',
        'prefix' => 'admin'
    ], function() {
        Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
        Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');
        Route::delete('orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
        Route::get('reset', [ResetController::class, 'reset'])->name('reset');
    });
});

Route::get('/', [MainController::class, 'index'])->name('index');

Route::get('/basket', [BasketController::class, 'basket'])->name('basket');
Route::get('/basket/order', [BasketController::class, 'basketOrder'])->name('basket-order');
Route::post('/basket/add/{product}', [BasketController::class, 'basketAdd'])->name('basket-add');
Route::post('/basket/remove/{product}', [BasketController::class, 'basketRemove'])->name('basket-remove');
Route::post('/basket/accept',[BasketController::class, 'basketAccept'])->name('basket-accept');

Route::get('/categories', [MainController::class, 'categories'])->name('categories');
Route::get('/{category}', [MainController::class, 'category'])->name('category');
Route::get('/{category}/{product}', [MainController::class, 'product'])->name('product');
