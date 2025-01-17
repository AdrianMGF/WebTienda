<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ProductController::class, 'Welcome'])
 ->name('home');

Route::get('/product/{product}',
 [ProductController::class, 'show'])->name('product.show');

 Route::get('/product/{product}',
 [ProductController::class, 'update'])->name('product.update');
 
Route::get('/addToCart/{product}',
[ProductController::class, 'addToCart'])->name('cart.add');
Route::get('/product/edit/{product}',
[ProductController::class, 'edit'])->name('product.edit')->middleware('role.editor');


Route::get('/cart',
[CartController::class, 'show'])->name('cart.show');

Route::get('/cart/{operation}/{product}',
[CartController::class, 'operate'])->name('cart.operate');
 
Route::get('/user/logout',
[UserController::class, 'logout'])->name('user.logout');

Route::get('/user',
[UserController::class, 'edit'])->name('user.edit');

Route::patch('/user',
[UserController::class, 'update'])->name('user.update');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

