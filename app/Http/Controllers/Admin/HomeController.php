<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index(){

        $countInv = Invoice::where('status',-1)->count();
        $countUser = DB::table('employees')
        ->where('type','LIKE','%NV%')->count();
        $sales = DB::table('invoices')
        ->where('status',-1)
        ->select(DB::raw('SUM(invoices.total) as sales'))
        ->get();
        return view('admin.dashboard',['countInv'=> $countInv,'countUser'=>$countUser,'sales'=>$sales[0]->sales]);

    }

}