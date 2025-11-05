<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mainController;

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

Route::controller(mainController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/cart', 'cart');
    Route::get('/contact', 'contact');
    Route::get('/single/{id}', 'singleproduct');
    Route::get('/shop', 'shop');
    Route::get('/about', 'about');
    Route::get('/register', 'register');
    Route::get('/orders', 'orders');
    Route::get('/login', 'login');
    Route::get('/checkout', 'checkout');
    Route::get('/deletefromcart/{id}', 'deleteFromCart');
    Route::post('/registerUser', 'registerUser');
    Route::post('/loginuser', 'loginuser');
    Route::get('/logout', 'logout');
    Route::post('/addToCart', 'addtocart');
    Route::post('/updatecart', 'updatecart');
    Route::get('/profile', 'profile');
  
});
    Route::post('/updateUser', [mainController::class, 'updateUser']);

