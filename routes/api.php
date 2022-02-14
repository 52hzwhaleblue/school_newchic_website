<?php

use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductTypeController;
use App\Http\Controllers\Admin\ProductDetailController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/user-api', [UserController::class, 'register'])->
name('user.register');

Route::get('/user-api', [UserController::class, 'listUser'])->
name('user.listUser');

Route::get('/product-type-api', [ProductTypeController::class, 'listProductType'])->
name('products.listProductType');

Route::get('/product-api', [ProductController::class, 'listProductsAPI'])->
name('products.list_products_api');

Route::get('/product-api', [ProductDetailController::class, 'listProductsAPI'])->
name('products.list_products_api');