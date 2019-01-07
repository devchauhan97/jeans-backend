<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('news_id');
            $table->mediumText('news_image')->nullable();
            $table->dateTime('news_date_added')->index();
            $table->dateTime('news_last_modified')->nullable();
            $table->tinyInteger('news_status');
            $table->tinyInteger('is_feature')->default('0');
            $table->string('news_slug',255);
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
        Schema::dropIfExists('news');
    }
}
