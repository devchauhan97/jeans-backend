<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->increments('banners_id');
            $table->string('banners_title',64);
            $table->string('banners_url',255);
            $table->mediumText('banners_image');
            $table->string('banners_group',10)->index();
            $table->mediumText('banners_html_text')->nullable();
            $table->integer('expires_impressions')->nullable()->default('0');
            $table->dateTime('expires_date')->nullable();
            $table->dateTime('date_scheduled')->nullable();
            $table->dateTime('date_added');
            $table->dateTime('date_status_change')->nullable();
            $table->integer('status')->default('1');
            $table->string('type',250);
            $table->string('banners_slug',250);
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
        Schema::dropIfExists('banners');
    }
}
