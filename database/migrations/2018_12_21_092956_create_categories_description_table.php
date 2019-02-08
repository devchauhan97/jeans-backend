<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesDescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_description', function (Blueprint $table) {
            $table->increments('categories_description_id');
            //$table->integer('')->default('0');
            $table->unsignedInteger('categories_id');
            $table->foreign('categories_id')->references('categories_id')->on('categories')->onDelete('cascade');
            $table->integer('language_id')->default('1');
            $table->string('categories_name')->index();
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
        Schema::dropIfExists('categories_description');
    }
}
