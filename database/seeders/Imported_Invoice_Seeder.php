<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Imported_Invoice_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('imported_invoices')->insert([
            [
                'id'=> 'IMPINV001',
                'employeeID'=>'NV202201253',
                'providerID'=>'PVD0001',
                'totalPrice'=>98000123,
                'totalQuantity'=>32143,
                'importedDate'=>date('Y-m-d H:i:s'),
                'status'=>1,
            ]
        ]);
    }
}