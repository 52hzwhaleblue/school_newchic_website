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
                'price'=>30000,
                'unit'=>'Kg',
                'image'=>'1.png',
            ]
        ]);
    }
}