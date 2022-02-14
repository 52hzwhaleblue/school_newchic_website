<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class InvoiceDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('invoice_details')->insert([
            [
                'id' => 1,
                'invoiceID' => 'in202201221',
                'productID' => '1',
                'quantity' => '3',
            ],
           
            ]);
    }
}