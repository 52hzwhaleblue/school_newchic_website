<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([

            [
                'id'=> 'A202201251',
                'username'=> 'layer01',
                'password' => Hash::make('23112001'),
                'email' => 'russian2311@gmail.com',
                'fullName' => 'Nguyễn Hoài Chương',
                'address' => 'Gò vấp',
                'type' => 'admin',
                'phone' => '0123456789',
                'salary' =>10000000,
                'avatar' => 'avatar1.png',
                'status' => 1,
            ],

            [
                'id' => 'NV202201252',
                'username' => 'layer02',
                'password' => Hash::make('4214232524232'),
                'email' => 'tuannghia@gmail.com',
                'fullName' => 'Huỳnh Tấn Nghĩa',
                'address' => 'Quận 6',
                'type' => 'NV kiểm kho',
                'phone' => '0123456789',
                'salary' =>10000000,
                 'avatar' => 'avatar2.png',
                'status' => 1,
            ],
            [
                'id' => 'NV202201253',
                'username' => 'layer03',
                'password' => Hash::make('4531231246'),
                'email' => 'vantuan@gmail.com',
                'fullName' => 'Hồ Văn Tuân',
                'address' => 'Quận 5',
                'type' => 'NV thanh toán',
                'phone' => '0123456789',
                'salary' =>10000000,
                 'avatar' => 'avatar3.png',
                'status' => 1,
            ],

            [
                'id' => 'NV202201254',
                'username' => 'layer04',
                'password' => Hash::make('81231290'),
                'email' => 'thanhle@gmail.com',
                'fullName' => 'Nguyễn Thành Lễ',
                'address' => 'Quận 5',
                'type' => 'admin',
                'phone' => '0123456789',
                'salary' =>10000000,
                 'avatar' => 'xyz.jpg',
                'status' => 1,
            ], [
                'id' => 'NV202201255',
                'username' => 'layer05',
                'password' => Hash::make('Minhlong@1902'),
                'email' => 'minhlong@gmail.com',
                'fullName' => 'Nguyễn Vũ Minh Long',
                'address' => 'TP Hồ Chí minh',
                'type' => 'admin',
                'phone' => '0123456789',
                'salary' =>10000000,
                 'avatar' => 'avatar1.png',
                'status' => 1,
            ],


        ]);
    }
}