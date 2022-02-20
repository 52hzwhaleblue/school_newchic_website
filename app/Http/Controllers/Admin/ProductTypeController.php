<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProductType;


class ProductTypeController extends Controller
{
    public function listProductType(){
      
        return DB::table('product_types')->get();
    }
    public function loadProductType(){
        $data =DB::table('product_types')->paginate(4);
        return view('admin.product_type.index',compact('data'));
    }
    public function productTypeView(){
        $data =DB::table('product_types')->get();
        return view('admin.product_type.index',compact('data'));
    }
    public function store(Request $request){

        $products = new ProductType;
        $products->id =  $request->id;
        $products->type = $request->type;
        $products->status = $request->status;
        $products->save();
        return redirect()->route('admin.product_types.index');
    }

    public function deleteProductType($id){
        $productTypes = ProductType::find($id);
        if($productTypes !=null){
            $productTypes->delete();
            return redirect()->route('admin.product_types.index');
        }
    }

}