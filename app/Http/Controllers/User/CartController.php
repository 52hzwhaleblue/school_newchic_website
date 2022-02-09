<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class CartController extends Controller
{
    public function addToCart($id){
        $sessionCart = Session::get('carts');
        if($sessionCart == null){
            $product =  DB::table('products')
            ->where('id',$id)
            ->select('products.*')
            ->addSelect(DB::raw("1 as quantity"))
            ->get();
            Session::push('carts',$product[0]);
        }else{
            foreach($sessionCart as $item){
                if($item->id == $id){
                    $item->quantity = $item->quantity+1;
                    break;
                }else{
                    $product =  DB::table('products')
                    ->where('id',$id)
                    ->select('products.*')
                    ->addSelect(DB::raw("1 as quantity"))
                    ->get();
                    Session::push('carts',$product[0]);
                    break;
                }
            }
        }
        $products =  DB::table('products')->paginate(3);
        return view('user.home.index',compact('products'));
    }
    public function showCart(){
        return view('user.cart.index');
    }
}
