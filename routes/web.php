<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BasketController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Auth::routes([
    'confirm' => false,
    'verify' => false
]);
Route::get('/logout', [LoginController::class, 'logout'])->name('get-logout');

Route::group([
    'middleware' => 'auth'
], function() {
    Route::group([
        'middleware' => 'is_admin',
        'prefix' => 'admin'
    ], function() {
        Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/show/{id}', [OrderController::class, 'show'])->name('orders.show');
        Route::get('/orders/edit/{id}', [OrderController::class, 'edit'])->name('orders.edit');
        Route::post('/orders/edit-accept/{id}', [OrderController::class, 'editAccept'])->name('orders.edit-accept');
        Route::post('/orders/delete/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
        Route::resource('categories', CategoryController::class);
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
