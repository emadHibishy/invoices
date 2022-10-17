<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('number', 20);
            $table->date('invoice_date');
            $table->date('due_date');
            $table->integer('total_lines');
            $table->integer('tax_value');
            $table->integer('freight');
            $table->integer('total');
            $table->unsignedTinyInteger('payment_status');
            $table->foreignId('customer_id')
                ->references('id')
                ->on('customers')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('payment_term_id')
                ->references('id')
                ->on('payment_terms')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->timestamps();
            $table->foreignId('warehouse_id')
                ->references('id')
                ->on('warehouses')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
