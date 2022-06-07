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
        Schema::create('gathering_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gathering_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->integer('packages');
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
        Schema::dropIfExists('gathering_details');
    }
};
