<?php

namespace Database\Seeders;

use App\Models\Helper\TransactionsTypes;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddTransactionTypes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions_types')->truncate();

        $transactions_types = [
            [
                'type_name' => ['en' => 'Issue', 'ar' => 'صرف'],
                'value' => -1
            ],
            [
                'type_name' => ['en' => 'Add', 'ar' => 'إضافة'],
                'value' => 1
            ],
        ];

        foreach ($transactions_types as $transactions_type)
        {
            TransactionsTypes::create($transactions_type);
        }
    }
}
