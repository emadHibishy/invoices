<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();

        $categories = [
            [
                'category_name' => [ 'ar' => 'مشروبات غازية' , 'en' => 'Soft drinks'],
                'description' => [ 'ar' => 'جميع المشروبات الغازية.' , 'en' => 'all known Soft drinks.'],
            ],
            [
                'category_name' => [ 'ar' => 'مثلجات' , 'en' => 'icecream'],
                'description' => [ 'ar' => 'جميع المثلجات.' , 'en' => 'all known icecreams.'],
            ],
            [
                'category_name' => [ 'ar' => 'جبن' , 'en' => 'cheese'],
                'description' => [ 'ar' => 'جميع انواع الجبن.' , 'en' => 'all known cheese types.'],
            ],
            [
                'category_name' => [ 'ar' => 'لحوم' , 'en' => 'meet'],
                'description' => [ 'ar' => '' , 'en' => ''],
            ],
        ];

        foreach ($categories as $category)
        {
            Category::create($category);
        }
    }
}
