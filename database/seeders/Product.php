<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class Product extends Seeder
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
                'id'=>  'f180120022pr1',             
                'name' => 'Dâu tằm',
                'price' =>  30000,
                'stock' => 120,
                'type' => 'Trái cây',
                'unit' => 'Kg',
                 'description' => 'Hỗ trợ tăng sức khỏe, vitamin C',
                 'image' => '1.png',
                'status' => 1,
            ]
            ,                   
            [ 'id'=> 'f180120022pr2',
              
                'name' => 'Kiwi',
                'price' =>  50000,
                'stock' => 90,
                'type' => 'Trái cây',
                'unit' => 'Kg',
                'description' => 'Hỗ trợ tăng sức khỏe, vitamin C',
                'image' => '3.png',
                'status' => 1,
            ],
            [ 'id'=> 'f180120022pr3',           
                'name' => 'Cam mỹ',
                'price' =>  35000,
                'stock' => 90,
                'type' => 'Trái cây',
                'unit' => 'Kg',
                'description' => 'Hỗ trợ tăng sức khỏe, vitamin C',
                'image' => '4.png',
                'status' => 1,
            ],                     
            [ 'id'=>  'f180120022pr4',
               
                'name' => 'Nho nhật',
                'price' =>  45000,
                'stock' => 90,
                'type' => 'Trái cây',
                'unit' => 'Kg',
                'description' => 'Hỗ trợ tăng sức khỏe, vitamin C',
                'image' => '5.png',
                'status' => 1,
            ],
            [ 'id'=>  'f180120022pr5',
                
                'name' => 'Dâu tây',
                'price' =>  90000,
                'stock' => 90,
                'type' => 'Trái cây',
                'unit' => 'Kg',
                'description' => 'Hỗ trợ tăng sức khỏe, vitamin C',
                'image' => '6.png',
                'status' => 1,
            ],
            [ 'id'=> 'f180120022pr6',
            'name' => 'Táo mỹ',
            'price' =>  25000,
            'stock' => 30,
            'type' => 'Trái cây',
            'unit' => 'Kg',
            'description' => 'Hỗ trợ tăng sức khỏe, vitamin C',
            'image' => '2.png',
            'status' => 1,
        ],
        ]);

}}
