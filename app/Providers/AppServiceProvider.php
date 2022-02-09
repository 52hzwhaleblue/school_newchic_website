<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        Paginator::useBootStrap();

        // delete  code bellow before migrate
        $data = DB::table('imported_invoices')->get();
        View::share('imported_inv_data', $data);

        // hóa đơn nhập hàng
        $imported_inv_data = DB::table('imported_invoices')->get();
        View::share('imported_inv_data', $imported_inv_data);

        // chi tiết hóa đơn nhập hàng
        $imported_inv_details = DB::table('imported_invoice_details')->get();
        View::share('imported_inv_details', $imported_inv_details);



        $empData = DB::table('employees')
        ->select('avatar')
        ->where('email',$request->email)
        ->get();
        View::share('employees_data', $empData);

        $providerData = DB::table('providers')->get();
        View::share('providers_data', $providerData);


    }
}
