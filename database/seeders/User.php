<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 'KH202201255',
                'username' => 'user05',
                'password' => Hash::make('Minhlong@1902'),
                'email' => 'josephminhlong@gmail.com',
                'fullName' => 'Nguyễn Vũ Minh Long',
                'address' => 'TP Hồ Chí minh',
                'phone' => '0123456789',
                 'avatar' => 'avatar1.png',
                'status' => 1,
            ],
        ]);
    }
}