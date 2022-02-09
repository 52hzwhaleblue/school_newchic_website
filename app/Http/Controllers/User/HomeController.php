<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    public function index(){
        $products = DB::table('products')->paginate(3);
        return view('user.home.index',compact('products'));
    }
    public function shop(){
        $products = DB::table('products')->paginate(6);
        return view('user.home.shop',compact('products'));
    }
    
}
