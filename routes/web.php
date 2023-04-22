<?php

use Illuminate\Support\Facades\Auth;
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

Route::prefix('/')->name('home.')->group(function () {
  Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); 
  Route::resource('/products', App\Http\Controllers\ProductController::class); 
  Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart'); 
});

Route::prefix('dashboard')->group(function () {
  Auth::routes();
  
  Route::prefix('/')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('dashboard'); 
    
    Route::resource('/categories', App\Http\Controllers\Dashboard\CategoryController::class);
    
    Route::resource('/products', App\Http\Controllers\Dashboard\ProductController::class);
    
    Route::post('/products/upload-images', [App\Http\Controllers\Dashboard\ProductController::class, 'upload_images'])->name('upload-images');
  });
});