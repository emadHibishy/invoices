<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id')
                ->references('id')
                ->on('invoices')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('product_id')
                ->references('id')
                ->on('products')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('warehouse_id')
                ->references('id')
                ->on('warehouses')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->decimal('qty');

            $table->foreignId('uom_id')
                ->references('id')
                ->on('unit_of_measures')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->float('price');
            $table->decimal('tax_rate');
            $table->float('tax_value');
            $table->float('total_line');
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
        Schema::dropIfExists('invoice_products');
    }
}
