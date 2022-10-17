<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('number', 10)->unique();
            $table->string('name')->unique();
            $table->foreignId('territory_id')
                ->references('id')
                ->on('territories')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('city_id')
                ->references('id')
                ->on('cities')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->text('address')->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('customers');
    }
}
