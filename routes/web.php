<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatckController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group([
    'prefix' => '{lang}',
    'where' => ['lang' => 'en|ar'],
    'middleware' => ['setLocale'], 
], function () {
    Route::get('/',[StatckController::class,'index'])->name('home.page');
    Route::get('/about',[StatckController::class,'about'])->name('about.page');
    Route::get('/faq',[StatckController::class,'faq'])->name('faq.page');
    Route::get('/shop',[StatckController::class,'shop'])->name('shop.page');
    Route::get('/categories',[StatckController::class,'categories'])->name('categories.page');
    Route::get('/contact',[StatckController::class,'contact'])->name('contact.page');
    Route::get('/blogs',[StatckController::class,'blogs'])->name('blogs.page');
    Route::get('/blogs/{blog}',[StatckController::class,'blog'])->name('blog.page');
    Route::get('products/{product}',[StatckController::class,'product'])->name('product.page');
    Route::get('cart',[CartController::class,'index'])->name('cart.page');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add')->middleware('auth');
    Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.page')->middleware('auth');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store')->middleware('auth');


 });

 require __DIR__.'/auth/auth.php';
 require __DIR__.'/admin/admin.php';