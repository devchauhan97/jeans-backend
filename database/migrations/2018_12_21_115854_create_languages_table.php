<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->increments('languages_id');
            $table->string('name',32);
            $table->char('code',2);
            $table->mediumText('image')->nullable();
            $table->string('directory',32)->nullable();
            $table->integer('sort_order')->nullable();
            $table->string('direction',100);
            $table->tinyInteger('is_default')->nullable()->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('languages');
    }
}
