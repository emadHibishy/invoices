<?php

namespace Database\Seeders;

use App\Models\Warehouse;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddWarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('warehouses')->truncate();

        $warehuoses = [
            [
                'code' => 'FG',
                'name' => ['en' => 'Finished Goods', 'ar' => 'الإنتاج التام'],
                'description' => ['en' => 'a warehouse to store Finished Goods.', 'ar' => 'مخزن لتخزين المنتجات التامة.']
            ]
        ];

        foreach ($warehuoses as $warehuose)
        {
            Warehouse::create($warehuose);
        }
    }
}
