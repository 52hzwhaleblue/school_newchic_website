<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProductType;


class ProductTypeController extends Controller
{
    public function listProductType(){
      
        return DB::table('product_type')->get();
    }
    public function loadProductType(){
        $data =DB::table('product_types')->paginate(4);
        return view('admin.product_type.index',compact('data'));
    }
    public function viewCreate(){
        $data =DB::table('products')->select('type')->distinct()->get();
        return view('admin.product_type.create',compact('data'));
    }
    public function createProductType(Request $request){

         $countPrd = ProductType::all()->count();
        $date = Date('Y-m-d');
        $randomID = 'LSP-'.$date .'-'.'('. $countPrd.')';

        $products = new ProductType;
        $products->id = $randomID;
        $products->name = $request->name;
        $products->save();
        return redirect()->route('admin.product_type');
    }

    public function deleteProductType($id){
        $products = ProductType::find($id);
        if($products !=null){
            $products->delete();
            return redirect()->route('admin.product_type');
        }
    }

}