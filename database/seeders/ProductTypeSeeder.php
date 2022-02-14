<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_types')->insert([
            [  
            "id"=> 'LSP-AOTHUN',
            "type"=> "Áo thun",
            "status"=> "1",
            ],

            [  
            "id"=> 'LSP-AOKHOAC',
            "status"=> "1",
            "type"=> "Áo khoác",
            ],
        ]);
    }

}