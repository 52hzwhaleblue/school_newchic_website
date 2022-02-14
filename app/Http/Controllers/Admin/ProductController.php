<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductController extends Controller
{
    public function listProductsAPI(){

       return DB::table('products')->get();
    }
    
    public function loadProduct(){

            $data =DB::table('products')->paginate(4);
            return view('admin.products.index',compact('data'));
    }
  
    public function viewCreate(){
        $data =DB::table('products')->paginate(4);
        return view('admin.products.create',compact('data'));
    }
    
    public function store(Request $request){
        $countPrd = Product::all()->count();
        $date = Date('Y-m-d');
        $randomID = 'MSP-'.$date .'-' . $countPrd.'-';
        $products = new Product;

        $products->id = $randomID;
        $products->name = $request->name;
        $products->price = $request->price;
        $products->price_high = $request->price_high;
        $products->image =$request->image;
        $products->status = 1;
        $products->save();
        return redirect()->route('admin.product');
    }

    public function delete($id){
        $products = Product::find($id);
        if($products !=null){
            $products->delete();
            return redirect()->route('admin.product');
        }
    }

    public function Search(Request $request){
        if(isset($_GET['keyWord'])){
            $searchText = $_GET['keyWord'];
            $data = DB::table('products')->where('name','LIKE','%'.$searchText.'%')->paginate(2);
            $data ->appends($request->all());
            return view('admin.products.index',compact('data'));
        }else{
            return view('admin.dashboard');
        }
    }
      
    public function handleRequestSwap($request){
        if($request == 'price_up'){
            $data =DB::table('products')
            ->where('price','>=','50000')->paginate(4);
            return view('admin.products.index',compact('data'));
        }else if($request == 'price_down'){
            $data =DB::table('products')
            ->where('price','<=','50000')->paginate(4);
            return view('admin.products.index',compact('data'));
        } else if($request == 'stock'){
            $data = Product::orderBy('stock')->paginate(4);
            return view('admin.products.index',compact('data'));
        }
}
}