<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('providers')->insert([
            [
                'id' =>  'NCC000',
                'name' => 'Công ty TNHH trái cây',
                'address' =>  'Tp.HCM',
                'phone' => 2132323213,
                'status' => true,
            ],
        ]);

    }
}