<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductController extends Controller
{
    public function loadProduct(){

            $data =DB::table('products')->paginate(4);
            return view('admin.products.index',compact('data'));
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
    public function viewCreate(){
        $data =DB::table('products')->select('type')->distinct()->get();
        return view('admin.products.create',compact('data'));
    }
    public function createProduct(Request $request){
         $countPrd = Product::all()->count();
        if($request->has('image')){
            $file= $request->image;
            $ext = $request->image->extension();//lấy đuôi file png||jpg
            $file_name = Date('Ymd').'-'.'product'.$countPrd.$ext;
            $file->move(public_path('backend/assets/img/products'),$file_name);
        }

        $date = Date('Y-m-d');
        $randomID = 'f'.$date .'pr' . $countPrd;
        $products = new Product;

        $products->id = $randomID;
        $products->name = $request->name;
        $products->description = $request->description;
        $products->stock = $request->stock;
        $products->price = $request->price;
        $products->type = $request->type;
        $products->image = $file_name;
        $products->unit = $request->unit;
        $products->status = 1;
        $products->save();
        return redirect()->route('admin.product');
    }

    public function deleteProduct($id){
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
}