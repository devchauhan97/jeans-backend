<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsDescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('news_description', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('news_id');
            $table->integer('language_id')->default('0')->index();
            $table->string('news_name',255)->index();
            $table->text('news_description')->nullable();
            $table->string('news_url',255)->nullable();
            $table->string('news_viewed')->nullable()->default('0');
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
        Schema::dropIfExists('news_description');
    }
}
