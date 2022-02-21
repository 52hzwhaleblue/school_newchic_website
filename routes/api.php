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

Route::post('/register', [UserController::class, 'register'])->
name('user.register');

Route::post('/login', [UserController::class, 'login'])->
name('user.login');

Route::get('/users', [UserController::class, 'listUser'])->
name('user.listUser');

Route::get('/product-types', [ProductTypeController::class, 'listProductType'])->
name('products.listProductType');

Route::get('/products', [ProductController::class, 'listProducts'])->
name('products.list_products_api');

Route::get('/product-details', [ProductDetailController::class, 'listProductDetails'])->
name('products.list_products_api');

Route::get('/product-details/{productID}', [ProductDetailController::class, 'singleProductDetails'])->name('products.list_products');

Route::get('getProductDetailName/{productID}',[ProductDetailController::class, 'getProductDetailName']);
Route::get('getProductDetailPrice/{productID}',[ProductDetailController::class, 'getProductDetailPrice']);
Route::get('getProductDetailImage/{productID}',[ProductDetailController::class, 'getProductDetailImage']);
Route::get('getProductDetailColor/{productSKU}',[ProductDetailController::class, 'getProductDetailColor']);
Route::get('getProductDetailSKU/{productSKU}',[ProductDetailController::class, 'getProductDetailSKU']);
Route::get('getProductDetailSize/{productID}',[ProductDetailController::class, 'getProductDetailSize']);

Route::post('/create-cart', [UserController::class, 'createCart'])->name('user.createCart');
Route::get('/cart/{productSKU}', [UserController::class, 'listCart'])->name('user.listCart');

Route::get('/getUserID/{userEmail}', [UserController::class, 'getUserID'])->name('user.getUserID');
Route::get('/address/{userID}', [UserController::class, 'listAddress'])->name('user.listAddress');