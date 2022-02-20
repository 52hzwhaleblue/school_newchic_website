<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        DB::table('addresses')->insert([
            [
                'id' => '1',
                'userID' => 'KH202201255',
                'reciver' => 'Long',
                'phone' => '0123456789',
                'street' => '33/1 Phùng Chí Kiên',
                'city' => 'Tp.Hồ Chí Minh',
                'disctrict' => 'Q. Tân Phú',
                'ward' => 'P. Tân Quý',
                'status' => '1', 
            ],

            [
                'id' => '2',
                'userID' => 'KH202201255',
                'reciver' => 'Nam',
                'phone' => '0123456789',
                'street' => 'Âu Cơ',
                'city' => 'Tp.Hồ Chí Minh',
                'disctrict' => 'Q. Tân Phú',
                'ward' => 'P. Tân Thành',
                'status' => '1', 
            ],
        ]);
    }
}