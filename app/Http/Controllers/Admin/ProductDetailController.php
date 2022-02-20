<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductDetailController extends Controller
{
    public function listProductDetails(){
        return DB::table('product_details')->get();
    }

    public function singleProductDetails($productID){
        return DB::table('product_details')
        ->select('*')
        ->where('productID', $productID)
        ->get();
    }

    public function getProductDetailName($productID){
        return DB::table('products')
        ->join('product_details', 'products.id', '=', 'product_details.productID')
        ->where('products.id', $productID)
        ->select('products.name')->distinct()
        ->get();
    }
    public function getProductDetailPrice($productID){
        return DB::table('products')
        ->join('product_details', 'products.id', '=', 'product_details.productID')
        ->where('products.id', $productID)
        ->select('products.price')->distinct()
        ->get();
    }
    public function getProductDetailImage($productID){
        return DB::table('products')
        ->join('product_details', 'products.id', '=', 'product_details.productID')
        ->where('products.id', $productID)
        ->select('product_details.image')->distinct()
        ->get();
    }

    public function getProductDetailColor($productSKU){
        return DB::table('product_details')
        ->select('product_details.color')
        ->where('SKU', $productSKU)
        ->get();
    }

    public function getProductDetailSKU($productSKU){
        return DB::table('product_details')
        ->select('product_details.SKU')
        ->where('SKU', $productSKU)
        ->get();
    }
    
    public function getProductDetailSize($productID){
        return DB::table('product_details')
        ->select('product_details.size')->distinct()
        ->where('productID', $productID)
        ->get();
    }

    
    
    public function loadProduct(){
        $datas =DB::table('products')->paginate(4);
        return view('admin.products.details',compact('data'));
    }

    // view tạo chi tiết sản phẩm hàng
    public function ProductDetailView(){
        $datas =DB::table('product_details')->paginate(4);
        return view('admin.products.create_detail',compact('datas'));
    }

    // 
    public function store(Request $request){
        $countPrd = ProductDetail::all()->count();
        
        $productDetails = new ProductDetail;
        $productDetails->id = $countPrd;
        $productDetails->productID = $request->productID;
        $productDetails->SKU = $request->SKU;
        $productDetails->price = $request->price;
        $productDetails->quantity =$request->quantity;
        $productDetails->size =$request->size;
        $productDetails->color =$request->color;
        $productDetails->image =$request->image;
        $productDetails->typeID =$request->typeID;
        $productDetails->providerID =$request->providerID;
        $productDetails->status = 1;
        $productDetails->save();
        
        return redirect()->route('admin.product');
    }

    
    public function delete($id){
        $productDetails = ProductDetail::find($id);
        if($productDetails !=null){
            $productDetails->delete();
            return redirect()->route('admin.product');
        }
    }
}