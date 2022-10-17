<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();
        $products = [
            [
                'name' => ['ar'=> 'كوكاكولا كان', 'en' => 'cokacola can'],
                'price' => '6',
                'category_id' => '1',
                'notes' => ['ar'=> 'كان كوكاكولا 330 مللى.', 'en' => 'cokacola can 330 ml.'],
                'uom_id'=> '2',
            ],
            [
                'name' => ['ar'=> 'شويبس أناناس كان', 'en' => 'pineapple Schweppes can'],
                'price' => '7',
                'category_id' => '1',
                'notes' => ['ar'=> 'كان شويبس أناناس 330 مللى.', 'en' => 'pineapple Schweppes can 330 ml.'],
                'uom_id'=> '2',
            ],
            [
                'name' => ['ar'=> 'كرنفال مانجا', 'en' => 'carnival mango'],
                'price' => '30',
                'category_id' => '2',
                'notes' => ['ar'=> 'علبة مثلجات كرنفال بعطم المانجو.', 'en' => 'carnival ice cream box with flavor of mango.'],
                'uom_id'=> '2',
            ],
            [
                'name' => ['ar'=> 'موتزاريلا', 'en' => 'Mozzarella'],
                'price' => '100',
                'category_id' => '3',
                'notes' => ['ar'=> 'جبنة موتزاريلا.', 'en' => 'Mozzarella Cheese.'],
                'uom_id'=> '1',
            ],
            [
                'name' => ['ar'=> 'لانشون حلوانى', 'en' => 'Halawany Beef'],
                'price' => '50',
                'category_id' => '4',
                'notes' => ['ar'=> 'لانشون حلوانى', 'en' => 'Halawany Beef.'],
                'uom_id'=> '1',
            ],
        ];

        foreach ( $products as $product )
        {
            Product::create($product);
        }
    }
}
