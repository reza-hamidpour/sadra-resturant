<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FoodsOptionsOptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods_options_options', function(Blueprint $table){
            $table->unsignedBigInteger('option_id');
            $table->foreign('option_id')->references('id')->on('foods_options')->onDelete('cascade');
            $table->string('option_value');
            $table->string('price')->default('0.0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foods_options_options');
    }
}
