<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsDescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_description', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('products_id');
            $table->integer('language_id')->index()->default('1');
            $table->string('products_name',255)->index(); 
            $table->text('products_description')->nullable(); 
            $table->string('products_url',255)->nullable(); 
            $table->integer('products_viewed')->nullable()->default('0');
            $table->string('sort_description')->nullable();
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
         Schema::dropIfExists('products_description');
    }
}
