<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([

            // ngời dùng
            UserSeeder::class,

            // nhà cung cấp
            ProviderSeeder::class,

            // sản phẩm
            ProductTypeSeeder::class,
            ProductSeeder::class,
            ProductDetailSeeder::class,

            // nhân viên
            EmployeeSeeder::class,

            // hóa đơn
            InvoiceSeeder::class,
            InvoiceDetailSeeder::class,

              // địa chỉ
             AddressSeeder::class,

            // nhập hàng
            // Imported_Invoice_Seeder::class,
            // Imported_Invoice_Detail_Seeder::class,
        ]);
    }
}