<?php

use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrdersystemController;

Route::group([
    'prefix' => '{lang}/admin',
    'where' => ['lang' => 'en|ar'],
    'middleware' => ['setLocale', 'auth', 'admin'],
], function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('abouts', AboutController::class);
    Route::get('/orders',[OrdersystemController::class,'index'])->name('order.admin');
    Route::get('orders/{order}', [OrdersystemController::class, 'show'])->name('orders.show');
Route::patch('/orders/{order}/update-status', [OrdersystemController::class, 'updateStatus'])->name('admin.orders.updateStatus');

 });