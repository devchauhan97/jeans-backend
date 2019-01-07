<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('reviews_id');
            $table->integer('products_id')->index();
            $table->integer('customers_id')->nullable()->index();          
            $table->string('customers_name',255);
            $table->integer('reviews_rating')->nullable();
            $table->dateTime('date_added')->nullable();
            $table->dateTime('last_modified')->nullable();
            $table->tinyInteger('reviews_status')->default('0');
            $table->integer('reviews_read')->default('0');
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
        Schema::dropIfExists('reviews');
    }
}
