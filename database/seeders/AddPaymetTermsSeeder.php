<?php

namespace Database\Seeders;

use App\Models\PaymentTerm;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddPaymetTermsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_terms')->truncate();
        $payment_terms = [
            [
                'name' => ['ar' => 'نقدى', 'en' => 'Cash'],
                'description' => ['ar' => 'الدفع نقدى', 'en' => 'Cash Payment'],
                'days' => 0
            ],
            [
                'name' => ['ar' => 'آجل 30 يوم', 'en' => 'Net 30'],
                'description' => ['ar' => 'الاستحقاق بعد 30 يوم من تاريخ الفاتورة', 'en' => 'due date after 30 days of invoice data'],
                'days' => 30
            ],
            [
                'name' => ['ar' => 'آجل 60 يوم', 'en' => 'Net 60'],
                'description' => ['ar' => 'الاستحقاق بعد 60 يوم من تاريخ الفاتورة', 'en' => 'due date after 60 days of invoice data'],
                'days' => 60
            ],
            [
                'name' => ['ar' => 'آجل 90 يوم', 'en' => 'Net 90'],
                'description' => ['ar' => 'الاستحقاق بعد 90 يوم من تاريخ الفاتورة', 'en' => 'due date after 90 days of invoice data'],
                'days' => 90
            ],
        ];

        foreach ($payment_terms as $payment_term) {
            PaymentTerm::create($payment_term);
        }
    }
}
