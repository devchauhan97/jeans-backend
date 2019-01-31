<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_options', function (Blueprint $table) {
            $table->increments('products_options_id');
            $table->integer('language_id')->index()->default('1');
            $table->string('products_options_name',255);
            //$table->integer('categories_id');
            $table->string('session_regenerate_id',255);
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
         Schema::dropIfExists('products_options');
    }
}

