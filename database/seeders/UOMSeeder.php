<?php

namespace Database\Seeders;

use App\Models\Helper\UOM;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UOMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unit_of_measures')->truncate();
        $uoms = [
            [
                'uom_code' => 'KG',
                'uom_name' => ['en'=> 'Kilogram', 'ar'=> 'كيلوجرام']
            ],
            [
                'uom_code' => 'Each',
                'uom_name' => ['en'=> 'Each', 'ar'=> 'وحدة']
            ],
            [
                'uom_code' => 'Sqm',
                'uom_name' => ['en'=> 'Square Meter', 'ar'=> 'متر مربع']
            ],
            [
                'uom_code' => 'Cm',
                'uom_name' => ['en'=> 'Cubic Meter', 'ar'=> 'متر مكعب']
            ],
        ];

        foreach ($uoms as $uom){
            UOM::create($uom);
        }
    }
}
