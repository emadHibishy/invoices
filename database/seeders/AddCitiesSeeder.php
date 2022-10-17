<?php

namespace Database\Seeders;

use App\Models\Helper\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddCitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->truncate();
        $cities = [
            [
                // 1
                'ar' => 'القاهرة',
                'en' => 'Cairo'
            ],
            [
                // 2
                'ar' => 'الاسكندرية',
                'en' => 'Alexandria'
            ],
            [
                // 3
                'ar' => 'الشرقية',
                'en' => 'Sharquia'
            ],
            [
                // 4
                'ar' => 'السويس',
                'en' => 'Suez'
            ],
            [
                // 5
                'ar' => 'القلبوبية',
                'en' => 'Qaliobia'
            ],
            [
                // 6
                'ar' => 'المنصورة',
                'en' => 'Mansoura'
            ],
            [
                // 7
                'ar' => 'كفر الشيخ',
                'en' => 'Kafr Elsheikh'
            ],
            [
                // 8
                'ar' => 'الاقصر',
                'en' => 'luxor'
            ],
            [
                // 9
                'ar' => 'أسوان',
                'en' => 'Aswan'
            ],
            [
                // 10
                'ar' => 'المنيا',
                'en' => 'Elmenia'
            ],
            [
                // 11
                'ar' => 'قنا',
                'en' => 'Qena'
            ],
            [
                // 12
                'ar' => 'الجيزة',
                'en' => 'Elgiza'
            ],
            [
                // 13
                'ar' => 'الاسماعيلية',
                'en' => 'Esmailia'
            ],
            [
                // 14
                'ar' => 'سيناء',
                'en' => 'Sinai'
            ],
            [
                // 15
                'ar' => 'سوهاج',
                'en' => 'Souhag'
            ],
            [
                // 16
                'ar' => 'الغربية',
                'en' => 'Gharbia'
            ],
            [
                // 17
                'ar' => 'أسيوط',
                'en' => 'Assiut'
            ],
            [
                // 18
                'ar' => 'دبى',
                'en' => 'Dubai'
            ],
            [
                // 19
                'ar' => 'أبو ظبى',
                'en' => 'Abu Dhabi'
            ],
            [
                // 20
                'ar' => 'الدوحة',
                'en' => 'Doha'
            ],
            [
                // 21
                'ar' => 'جدة',
                'en' => 'Jeddah'
            ],
            [
                // 22
                'ar' => 'الرياض',
                'en' => 'Riyadh'
            ],
            [
                // 23
                'ar' => 'مكة',
                'en' => 'Mecca'
            ],
            [
                // 24
                'ar' => 'المدينة المنورة',
                'en' => 'Medina'
            ],
        ];


        foreach ($cities as $city)
        {
            City::create([
                'name' => ['ar' => $city['ar'] , 'en'=> $city['en'] ],
            ]);
        }
    }
}
