<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('travel_id')->constrained();
            $table->foreignId('customer_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->foreignId('product_type_id')->constrained();
            $table->integer('weight');
            $table->integer('total_price');
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
        Schema::dropIfExists('travel_details');
    }
};
