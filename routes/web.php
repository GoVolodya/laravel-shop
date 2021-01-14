<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

Route::get('/', [App\Http\Controllers\MainController::class, 'main'])->name('main');

Route::get('/categories', [App\Http\Controllers\MainController::class, 'categories'])->name('categories');
Route::get('/categories/{category}/{product}', [App\Http\Controllers\MainController::class, 'product'])->name('product');
Route::get('/categories/{category}', [App\Http\Controllers\MainController::class, 'category'])->name('category');

Route::post('/cart/add/{id}', [App\Http\Controllers\CartController::class, 'cartAdd'])->name('cartAdd');
Route::post('/cart/remove/{id}', [App\Http\Controllers\CartController::class, 'cartRemove'])->name('cartRemove');
Route::get('/cart/order', [App\Http\Controllers\CartController::class, 'order'])->name('order');
Route::post('/cart/order', [App\Http\Controllers\CartController::class, 'orderConfirm'])->name('orderConfirm');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'cart'])->name('cart');

Route::group([
	'middleware' => 'admin',
	'prefix' => 'admin'
], function () {
	Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
	Route::get('/orders', [App\Http\Controllers\AdminController::class, 'orders'])->name('adminOrders');
	Route::resource('/categories', 'App\Http\Controllers\CategoryController');
	Route::resource('/products', 'App\Http\Controllers\ProductController');
});


Auth::routes();

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');


Route::get('/config', function(){
        Artisan::call('config:cache');
        return 'config are cached';
});

Route::get('/route', function(){
        Artisan::call('route:cache');
        return 'routes are cached';
});

Route::get('/view', function(){
        Artisan::call('view:cache');
        return 'views are cached';
});

Route::get('/clear', function(){
       Artisan::call('cache:clear');
       return 'all cache cleared';
});

Route::get('/storage', function () {
    Artisan::call('storage:link');
    return 'storage link created';
});