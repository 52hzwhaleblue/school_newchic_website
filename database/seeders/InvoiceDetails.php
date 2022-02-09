<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class InvoiceDetails extends Seeder
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
                'productID' => 'f180120022pr2',
                'quantity' => '3',
            ],
            [
                'id' => 2,
                'invoiceID' => 'in202201221',
                'productID' => 'f180120022pr3',
                'quantity' => '1',
            ],
            [
                'id' => 3,
                'invoiceID' => 'in202201222',
                'productID' => 'f180120022pr5',
                'quantity' => '6',
            ],
            [
                'id' => 4,
                'invoiceID' => 'in202201223',
                'productID' => 'f180120022pr2',
                'quantity' => '7',
            ],
            [
                'id' => 5,
                'invoiceID' => 'in202201223',
                'productID' => 'f180120022pr1',
                'quantity' => '2',
            ],
            [
                'id' => 6,
                'invoiceID' => 'in202201224',
                'productID' => 'f180120022pr2',
                'quantity' => '2',
            ]
            ]);
    }
}
