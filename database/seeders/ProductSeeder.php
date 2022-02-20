<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [  
            "id"=> '0',
            "name"=> "Áo thun nam",
            "price"=> 300000,
            "price_high"=> 600000,
            "image"=> "https://imgaz1.chiccdn.com/thumb/large/oaupload/newchic/images/0A/43/40d12a71-9280-47ae-bd85-51085080f448.jpg?s=702x936",
            "status"=> 1,
            ],
        ]);

}}