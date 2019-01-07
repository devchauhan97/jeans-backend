<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders_images', function (Blueprint $table) {
            $table->increments('sliders_id');
            $table->string('sliders_title',255);
            $table->string('sliders_url',255);
            $table->string('sliders_image',255);
            $table->string('sliders_group',255);
            $table->mediumText('sliders_html_text');
            $table->timestamp('expires_date');
            $table->dateTime('date_added');
            $table->tinyInteger('status');
            $table->string('type',255);
            $table->dateTime('date_status_change')->nullable();
            $table->integer('languages_id');
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
        Schema::dropIfExists('sliders_images');
    }
}
