<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentDescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_description', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255);
            $table->integer('language_id');
            $table->string('payment_name',32);
            $table->string('sub_name_1',100);
            $table->string('sub_name_2',100);
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
        Schema::dropIfExists('payment_description');
    }
}
