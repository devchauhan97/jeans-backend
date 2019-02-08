<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsToCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('products_to_categories', function (Blueprint $table) {
            $table->integer('products_id')->index();
            //$table->integer('categories_id')->index();

            $table->unsignedInteger('categories_id');
            $table->foreign('categories_id')->references('categories_id')->on('categories');
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
        Schema::dropIfExists('products_to_categories');
    }
}
