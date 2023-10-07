<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactUsFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_us_forms', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("body");
            $table->string("user_name");
            $table->string("phone_number")->nullable();
            $table->string("email")->nullable();
            $table->boolean("answered")->default(false);
            $table->boolean("status")->default(false);
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
        Schema::dropIfExists('contact_us_forms');
    }
}
