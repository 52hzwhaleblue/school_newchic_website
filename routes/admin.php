<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\Imported_Invoice_Controller;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\ProductDetailController;
use App\Http\Controllers\Admin\ProviderController;

use App\Http\Controllers\Admin\ProductTypeController;
use Illuminate\Support\Facades\Auth;
Route::group(['prefix' => '/'], function () {
    Route::get('login', [LoginController::class,'loginForm'])->name('admin.login.get');
    Route::post('login', [LoginController::class, 'login'])->name('admin.login.post');
    Route::get('logout', [LoginController::class, 'logout'])->
    name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function () {
       Route::get('/dashboard', [HomeController::class,'index'])->name('admin.dashboard');

       Route::get('/account', [AccountController::class, 'loadAccount'])->
       name('admin.account');

       Route::get('/account/delete/{id}', [AccountController::class, 'deleteAccount'])->
       name('admin.account.delete');

       Route::get('/account/search', [AccountController::class, 'searchAccount'])->
       name('admin.account.search');

       Route::get('/account/profile', [AccountController::class, 'viewProfile'])->
       name('admin.account.profile');

       Route::get('/address', [AccountController::class, 'loadAddress'])->
       name('admin.address');

       //--------------------------------------------------------------->

       Route::group(['prefix' => '/products'], function () {

            Route::get('', [ProductController::class, 'loadProduct'])->
            name('admin.product');

            Route::get('/request/{request1}', [ProductController::class, 'handleRequestSwap'])->
            name('admin.product.request');

            Route::get('/search', [ProductController::class, 'Search'])->
            name('admin.product.search');

            Route::get('/create', [ProductController::class, 'viewCreate'])->
            name('admin.product.index');

            Route::post('/create', [ProductController::class, 'store'])->
            name('admin.product.store');

            Route::get('/delete/{id}', [ProductController::class, 'delete'])->
            name('admin.product.delete');
       });

       //--------------------------------------------------------------->

       Route::group(['prefix' => '/product-detail'], function () {

        Route::get('', [ProductDetailController::class, 'loadProductDetail'])->
        name('admin.product_details.loadProductDetail');

        Route::get('/request/{request1}', [ProductDetailController::class, 'handleRequestSwap'])->
        name('admin.product.request');

        Route::get('/search', [ProductDetailController::class, 'Search'])->
        name('admin.product.search');

        Route::get('/create-detail', [ProductDetailController::class, 'ProductDetailView'])->
        name('admin.product_detail.ProductDetailView');

        Route::post('/create', [ProductDetailController::class, 'store'])->
        name('admin.product_detail.store');

        Route::get('/delete/{id}', [ProductDetailController::class, 'deleteProduct'])->
        name('admin.product.delete');
   });

        //--------------------------------------------------------------->

        Route::group(['prefix' => '/product-types'], function () {

          Route::get('', [ProductTypeController::class, 'loadProductType'])->
          name('admin.product_types.index');

          Route::get('/create-product-type', [ProductTypeController::class, 'productTypeView'])->
          name('admin.product_types.productTypeView');

          Route::post('/create-product-type', [ProductTypeController::class, 'store'])->
          name('admin.product_types.store');

          Route::get('/delete/{id}', [ProductTypeController::class, 'delete'])->
          name('admin.product_types.delete');
       });

        //----------------------------------------------------------------------------------------
       Route::group(['prefix' => '/invoices'], function () {
               Route::get('/', [InvoiceController::class, 'showInvoice'])->name('admin.invoice');
               Route::get('/details/{invoiceID}', [InvoiceController::class, 'detailsInvoice'])->name('admin.invoice.details');

               Route::get('/order-tracking', [InvoiceController::class, 'orderTracking'])->name('admin.invoice.orderTracking');

               Route::get('/confirmStatus/{invoiceID}', [InvoiceController::class, 'handleConfirmStatus'])->name('admin.invoice.confirmStatus');

        });


        //----------------------------------------------------------
        Route::group(['prefix' => '/imported_invoices'], function(){
            // -------- Hoa  don nhap hang ---------------------- \\
            Route::get('/', [Imported_Invoice_Controller::class, 'loadHoaDonNhap'])->name('admin.imported_invoice.index');

             // paginate
            Route::get('/create', [Imported_Invoice_Controller::class, 'loadHoaDonNhap'])->name('admin.imported_invoice.index');

            Route::post('/create', [Imported_Invoice_Controller::class, 'createHoaDonNhap'])->name('admin.imported_invoice.createHDN');


            // -------- Chi tiet  hoa  don nhap hang ---------------------- \\

            // return view create detail
            Route::get('/create_detail', [Imported_Invoice_Controller::class, 'create_detail_hdn_view'])->name('admin.imported_invoice.create_detail_view');

            // create imported invoice detail by POST method
            Route::post('/create_detail', [Imported_Invoice_Controller::class, 'create_imp_inv_detail'])->name('admin.imported_invoice.create_imp_inv_detail');

            // delete imp inv detail
            Route::get('/delete_detail/{id}', [Imported_Invoice_Controller::class, 'delete_imp_inv_detail'])->
            name('admin.imp_inv_detail.delete');

            // Update imp inv detail
            Route::get('/update_detail/{id}', [App\Http\Controllers\Imported_Invoice_Controller::class, 'edit']);
            Route::post('/update_detail/{id}', [App\Http\Controllers\Imported_Invoice_Controller::class, 'update']);
        });

//----------------------------------------------------------------------------------------

     Route::group(['prefix' => '/provider'], function(){
      Route::get('', [ProviderController::class, 'loadProvider'])->name('admin.provider.index');

      Route::get('/create', [ProviderController::class, 'loadProvider'])->name('admin.provider.index'); // dùng cho paginate

      Route::post('/create', [ProviderController::class, 'createProvider'])->name('admin.provider.createProvider');

     });
//----------------------------------------------------------------------------------------
Route::group(['prefix' => '/employee'], function(){

    // --------------------   Tạo nhân viên--------------------------------------------
    Route::get('', [EmployeeController::class, 'loadEmployee'])->name('admin.employee.index');

    Route::get('/create', [EmployeeController::class, 'loadEmployee'])->name('admin.employee.index'); // dùng cho paginate

    Route::post('/create', [EmployeeController::class, 'createEmployee'])->name('admin.employee.createEmployee');

   });


    });

});