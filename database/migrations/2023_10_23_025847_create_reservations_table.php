<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone_number');
            $table->string('reserve_date');
            $table->string('from');
            $table->string('to');
            $table->string('party_size');
            $table->unsignedBigInteger('desk_number')->nullable();
            $table->foreign('desk_number')->references('id')->on('desk_information')->onDelete('SET NULL');
            $table->smallInteger('reservation_status');
            $table->unsignedBigInteger('user_changed')->nullable();
            $table->foreign('user_changed')->references('id')->on('users')->onDelete('SET NULL');
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
        Schema::dropIfExists('reservations');
    }
}
