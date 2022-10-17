<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddCustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->truncate();

        $customers = [
            [
                'name' => ['ar' => 'السيد النمر', 'en' => 'Elsayed Elnemr'],
                'number' => 'CUST-00001',
                'territory_id' => '1',
                'city_id' => '1',
                'address' => 'شارع خالد بن الوليد عمارة 3 شقة 15',
            ],
            [
                'name' => ['ar' => 'خالد عبدالله', 'en' => 'Khaled Abdullah'],
                'number' => 'CUST-00002',
                'territory_id' => '1',
                'city_id' => '2',
                'address' => 'شارع السكة الحديد عمارة 25 الدور الرابع شقة 2',
            ],
            [
                'name' => ['ar' => 'طلال بن حمد', 'en' => 'Talal Ben Hamad'],
                'number' => 'CUST-00003',
                'territory_id' => '2',
                'city_id' => '18',
                'address' => '',
            ],
            [
                'name' => ['ar' => 'ياسر الدوسرى', 'en' => 'Yasser El-Dossary'],
                'number' => 'CUST-00004',
                'territory_id' => '2',
                'city_id' => '22',
                'address' => '',
            ],
            [
                'name' => ['ar' => 'مصطفى خلف', 'en' => 'Mostafa Khalaf'],
                'number' => 'CUST-00005',
                'territory_id' => '1',
                'city_id' => '17',
                'address' => 'شارع 6 أكتوبر عمارة 5 شقة 8',
            ],
            [
                'name' => ['ar' => 'عامر عبد الرحمن', 'en' => 'Amer Abd Elrahman'],
                'number' => 'CUST-00006',
                'territory_id' => '1',
                'city_id' => '3',
                'address' => 'شارع الفاروق عمر عمارة 2 شقة 10',
            ],
        ];

        foreach ($customers as $customer)
        {
            Customer::create($customer);
        }
    }
}
