<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;


//Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/')->group(function () {
    Route::get('users/login',[LoginController::class,'loginForm'])->name("user.login");
    Route::post('users/login',[LoginController::class,'login'])->name("user.login.post");
    Route::get('users/logout',[LoginController::class,'logout'])->name("user.logout");
    Route::get('home',[HomeController::class,'index'])->name("user.home");
    Route::get('home/shop',[HomeController::class,'shop'])->name("user.home.shop");
    Route::get('home/cart',[CartController::class,'showCart'])->name("user.cart");
    Route::get('home/products/view-details/{id}',[ProductController::class,'ViewDetails'])->name("user.home.details");
    Route::get('home/user/my-profile',[UserController::class,'myProfile'])->name("user.profile");
    Route::get('home/addToCart/{id}',[CartController::class,'addToCart'])->name("user.addToCart");
});

?>