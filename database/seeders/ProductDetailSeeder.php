<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_details')->insert([
            [  
            "id"=> '0',
            "productID"=> '1', // để truy vấn ra prodcut name làm chủ yếu
            "SKU"=> 'ATN-Red-XXL',
            "price"=> 442,
            "quantity"=> '10',
            "size"=> 'XXL',
            "color"=> 'Red',
            "image"=>  'https://imgaz1.chiccdn.com/thumb/large/oaupload/newchic/images/0A/43/40d12a71-9280-47ae-bd85-51085080f448.jpg?s=702x936',
            "typeID"=> 'LSP-AOTHUN',
            "providerID"=> 'NCC000',
            "status"=> '1',

            ],
        ]);
}}