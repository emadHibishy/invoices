<?php

namespace Database\Seeders;

use App\Models\Territory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddTerritoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('territories')->truncate();

        $territories = [
            [
                'name' => ['ar' => 'المحلى', 'en' => 'Local'],
                'appreviation' => 'LOC',
            ],
            [
                'name' => ['ar' => 'التصدير', 'en' => 'Export'],
                'appreviation' => 'EXP',
            ],
        ];

        foreach ($territories as $territory)
        {
            Territory::create($territory);
        }
    }
}
