<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Imported_Invoice_Detail_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('imported_invoice_details')->insert([
            [
                'id'=> '0',
                'importedInvoiceID'=>'IMPINV001',
                'productID'=>'MSP-180120022-(0)',
                'productName'=>'Dâu tằm',
                'quantity'=>100,
                'imported_price'=>10000,
                'retail_price'=>200000,
                'wholesale_price'=>150000,
                'image'=>'https://imgaz1.chiccdn.com/thumb/large/oaupload/newchic/images/0A/43/40d12a71-9280-47ae-bd85-51085080f448.jpg?s=702x936',
            ]
        ]);
    }
}