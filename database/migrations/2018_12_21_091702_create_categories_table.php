<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('categories_id');
            $table->mediumText('categories_image')->nullable();
            $table->mediumText('categories_icon');
            $table->integer('parent_id')->index()->default('0');
            $table->integer('sort_order')->default('0');
            $table->dateTime('date_added')->nullable();
            $table->dateTime('last_modified')->nullable();
            $table->string('categories_slug')->nullable();
            $table->char('categories_status',4)->nullable();
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
        Schema::dropIfExists('categories');
    }
}
