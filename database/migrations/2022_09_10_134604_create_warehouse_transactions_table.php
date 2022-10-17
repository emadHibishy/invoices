<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarehouseTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouse_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_number', 20)->unique();
            $table->foreignId('transaction_type_id')
                ->references('id')
                ->on('transactions_types')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('warehouse_id')
                ->references('id')
                ->on('warehouses')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('product_id')
                ->references('id')
                ->on('products')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->decimal('qty');
            $table->foreignId('uom_id')
                ->references('id')
                ->on('unit_of_measures')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('created_by')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('updated_by')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->boolean('status')->default(1);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warehouse_transactions');
    }
}
