<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Invoice;
class InvoiceController extends Controller
{
    public function showInvoice(){
         $invoices = DB::table('invoices')
        ->join('employees','invoices.employeeID','=','employees.id')
        ->join('users','invoices.userID','=','users.id')
        ->select(DB::raw('employees.fullName as nv'),'users.fullName','invoices.id','invoices.dateCreated','total','invoices.status','invoices.shippingAddress','invoices.isPaid')
        ->where('invoices.status',-1)->paginate(3) ;
        return view('admin.invoices.index',compact('invoices'));
    }
    public function orderTracking(){
        $countWaitingToAccept = DB::table('invoices')
        ->join('users','invoices.userID','=','users.id')
        ->where('invoices.status',0)
        ->select(DB::raw('COUNT(invoices.id) as SL'))
        ->get();
        $countConfirmed = DB::table('invoices')
        ->join('users','invoices.userID','=','users.id')
        ->where('invoices.status',1)
        ->select(DB::raw('COUNT(invoices.id) as SL'))
        ->get();
        $countDelivery = DB::table('invoices')
        ->join('users','invoices.userID','=','users.id')
        ->where('invoices.status',2)
        ->select(DB::raw('COUNT(invoices.id) as SL'))
        ->get();
        $countSuccess = DB::table('invoices')
        ->join('users','invoices.userID','=','users.id')
        ->where('invoices.status',-1)
        ->select(DB::raw('COUNT(invoices.id) as SL'))
        ->get();
        return view('admin.invoices.order_tracking',
            [
                'WaitingToAccept'=>$countWaitingToAccept[0]->SL,
                'Confirmed'=>$countConfirmed[0]->SL,
                'Delivery'=>$countDelivery[0]->SL,
                'Success'=>$countSuccess[0]->SL,
            ]
        );
    }
    public function detailsInvoice($invoiceID){
        $invoices = DB::table('invoices')
        ->join('users','invoices.userID','=','users.id')
        ->where('invoices.id',$invoiceID)
        ->select('users.fullName','invoices.id','invoices.dateCreated','invoices.total','invoices.status','invoices.shippingAddress','invoices.shippingPhone','invoices.shippingName','invoices.isPaid')->get();
        $invoice_details = DB::table('invoice_details')
        ->join('products','invoice_details.productID','=','products.id')
        ->where('invoice_details.invoiceID',$invoiceID)->get();
        return view('admin.invoices.details',compact('invoices','invoice_details'));
    }

    public function detailsOrderTracking($invoiceID){
        $invoices = DB::table('invoices')
        ->join('users','invoices.userID','=','users.id')
        ->where('invoices.id',$invoiceID)
        ->select('users.fullName','invoices.id','invoices.dateCreated','invoices.total','invoices.status','invoices.shippingAddress','invoices.shippingPhone','invoices.shippingName','invoices.isPaid')->get();

        $invoice_details = DB::table('invoice_details')
        ->join('products','invoice_details.productID','=','products.id')
        ->where('invoice_details.invoiceID',$invoiceID)->get();


        return view('admin.invoices.details_order',compact('invoices','invoice_details'));
    }


    public function handleConfirmStatus($request){
        $invoices = Invoice::where('id',$request)->get();

        $invoices[0]->status = $invoices[0]->status+1;
        $query = DB::table('invoices')->get();
        return redirect()->route('admin.invoice.orderTracking');
    }
}
