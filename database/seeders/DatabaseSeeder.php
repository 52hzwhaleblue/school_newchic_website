<?php

namespace Database\Seeders;

use App\Models\Provider;
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

            User::class,
            Product::class,
            ProviderSeeder::class,
            EmployeeSeeder::class,
            InvoiceSeeder::class,
            Imported_Invoice_Seeder::class,
            Imported_Invoice_Detail_Seeder::class,
            InvoiceDetails::class,
        ]);
    }
}