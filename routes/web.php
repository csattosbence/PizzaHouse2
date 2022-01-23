<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('/',[Controllers\HomeController::class, 'show'])->name('home.show');

Route::get('/pizzas',[Controllers\PizzaController::class,'show'])->name('pizzas.show');



Route::get('/cart',[Controllers\CartController::class,'show'])->name('cart.show');

Route::get('/add-to-cart/{id}',[Controllers\CartController::class,'addToCart'])->name('cart.addToCart');

Route::get('/increase-quantity/{id}',[Controllers\CartController::class,'increaseQuantity'])->name('cart.increaseQuantity');

Route::get('/decrease-quantity/{id}',[Controllers\CartController::class,'decreaseQuantity'])->name('cart.decreaseQuantity');

Route::get('/drinks',[App\Http\Controllers\DrinkController::class,'show'])->name('drink.show');

Route::middleware(['auth'])->group(function(){
    Route::post('/logout',[Controllers\Auth\LoginController::class,'destroy'])->name('auth.logout');
    Route::get('/admin',[Controllers\AdminController::class,'show'])->name('admin.show');
    Route::get('/admin/orders',[Controllers\OrdersController::class,'show'])->name('orders.show');
    Route::post('/order',[Controllers\OrdersController::class,'store'])->name('order.store');
});

Route::middleware(['guest'])->group(function(){
    Route::get('/login',[Controllers\Auth\LoginController::class,'create'])->name('auth.login');
    Route::post('/login',[Controllers\Auth\LoginController::class,'store'])->name('auth.login');;
    Route::get('/register',[Controllers\Auth\RegisterController::class,'create'])->name('auth.register');
    Route::post('/register',[Controllers\Auth\RegisterController::class,'store']);
});
