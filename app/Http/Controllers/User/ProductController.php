<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    public function ViewDetails($id){
        $product = DB::table('products')->where('id',$id)->get();
        return view('user.home.single-product',compact('product'));
    }
}
