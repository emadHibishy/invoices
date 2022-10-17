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
        $this->call(AddUserSeeder::class);
        $this->call(AddCategoriesSeeder::class);
        $this->call(UOMSeeder::class);
        $this->call(AddProductsSeeder::class);
        $this->call(AddWarehouseSeeder::class);
        $this->call(AddTransactionTypes::class);
        $this->call(AddCitiesSeeder::class);
        $this->call(AddTerritoriesSeeder::class);
        $this->call(AddPaymetTermsSeeder::class);
        $this->call(AddCustomersSeeder::class);
    }
}
