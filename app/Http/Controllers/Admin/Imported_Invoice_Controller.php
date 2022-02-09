<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ImportedInvoice;
use App\Models\ImportedInvoiceDetails;
use App\Models\Product;

class Imported_Invoice_Controller extends Controller
{
    // load imported invoice
    public function loadHoaDonNhap(){
        $data = DB::table('imported_invoices')->paginate(4);
        return View('admin.imported_invoice.index', compact('data'));
    }

    // tạo hóa đơn nhập => Add vào table sản phẩm
    public function createHoaDonNhap(Request $request){

        $data = DB::table('imported_invoices')->paginate(4);

        $countImpINV = ImportedInvoice::all()->count();

        $date= Date('Ymd');
        $randomID = 'HDN' .$date. $countImpINV;

        $importedInvoices = new ImportedInvoice;
        $importedInvoices->id = $randomID;
        $importedInvoices->employeeID = $request->emp_id;
        $importedInvoices->providerID = $request->providerID;
        $importedInvoices->totalPrice = $request->totalPrice;
        $importedInvoices->totalQuantity = $request->totalQuantity;
        $importedInvoices->importedDate = $request->importedDate;
        $importedInvoices->status = $request->status;
        $importedInvoices->save();


        return redirect()->route('admin.imported_invoice.index');
    }

    // tạo chi tiết hóa đơn nhập ( nhập những sản phẩm nào)
    public function create_detail_hdn_view(Request $request){

        $data  = DB::table('imported_invoice_details')
        ->select('importedInvoiceID')
        ->where('importedInvoiceID',$request->importedInvoiceID)
        ->first();

        return View('admin.imported_invoice.create_detail',compact('data'));
    }

    public function create_imp_inv_detail(Request $request){
        $data = DB::table('imported_invoices')->paginate(4);

        $count_imp_inv_detail = ImportedInvoiceDetails::all()->count();

        $randomID =  $count_imp_inv_detail;

        $imp_inv_detail = new ImportedInvoiceDetails;

        $date= Date('Ymd');
        $productID = 'MSP-'.$date.'-'.'('. $count_imp_inv_detail.')';

        if($request->has('image')){
            $file= $request->image;
            $ext = $request->image->extension();//lấy đuôi file png||jpg
            $file_name = Date('Ymd').'-'.'product'.$count_imp_inv_detail.$ext;
            $file->move(public_path('backend/assets/img/products'),$file_name);
        }

        $imp_inv_detail->id = $randomID;
        $imp_inv_detail->importedInvoiceID = $request->importedinvoice_id;
        $imp_inv_detail->productID = $productID;
        $imp_inv_detail->productName = $request->productName;
        $imp_inv_detail->quantity = $request->quantity;
        $imp_inv_detail->price = $request->price;
        $imp_inv_detail->unit = $request->unit;
        $imp_inv_detail->image = $file_name;
        $imp_inv_detail->save();

        // insert into product tabble
        // id, name, price, stock, type, unit,description, image, status, price
        $products = new Product;

        $products->id = $imp_inv_detail->productID;
        $products->name = $imp_inv_detail->productName;
        $products->description = "Hỗ trợ tăng sức khỏe, vitamin C";
        $products->stock = $imp_inv_detail->quantity;
        $products->price = $imp_inv_detail->price;
        $products->type = "Trái  cây";
        $products->unit =$imp_inv_detail->unit;
        $products->image = $imp_inv_detail->image;
        $products->status = 1;
        $products->save();

        return redirect()->route('admin.imported_invoice.create_detail_view');
    }

    // xóa chi tiết hóa đơn nhap hàng
    public function delete_imp_inv_detail($id){
        $ImportedInvoice = ImportedInvoiceDetails::find($id);
        if($ImportedInvoice !=null){
            $ImportedInvoice->delete();
            return redirect()->route('admin.imported_invoice.create_detail_view');
        }
    }


}