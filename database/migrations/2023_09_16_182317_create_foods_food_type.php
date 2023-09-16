<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodsFoodType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods_food_type', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('foods_id')->index();
            $table->foreign('foods_id')->references('id')->on('foods')->onDelete('cascade');
            $table->unsignedBigInteger('food_types_id')->index();
            $table->foreign('food_types_id')->references('id')->on('food_types')->onDelete('cascade');
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
        Schema::dropIfExists('foods_food_type');
    }
}
