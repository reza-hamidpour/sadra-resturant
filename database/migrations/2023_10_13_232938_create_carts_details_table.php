<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cart_id');
            $table->foreign('cart_id')->on('carts')->references('id')->onDelete('cascade');
            $table->unsignedBigInteger('food_id')->nullable();
            $table->foreign('food_id')->on('foods')->references('id')->onDelete('SET NULL');
            $table->string('food_options')->nullable();
            $table->string('allergic_comment')->nullable();
            $table->boolean('age_check');
            $table->string('price');
            $table->mediumInteger('quantity')->default(1);
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
        Schema::dropIfExists('carts_details');
    }
}
