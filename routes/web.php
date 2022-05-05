<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/', [MainController::class, 'index'])->name('index');

Route::get('/categories', [MainController::class, 'categories'])->name('categories');

Route::get('/basket', [MainController::class, 'basket'])->name('basket');

Route::get('/basket/order', [MainController::class, 'order'])->name('order');

Route::get('/{category}', [MainController::class, 'category'])->name('category');

Route::get('/{category}/{product}', [MainController::class, 'product'])->name('product');
