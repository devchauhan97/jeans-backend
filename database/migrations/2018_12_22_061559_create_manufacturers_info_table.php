<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManufacturersInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manufacturers_info', function (Blueprint $table) {
            $table->increments('manufacturers_id');
            $table->integer('languages_id')->index();
            $table->string('manufacturers_url',255)->nullable();
            $table->integer('url_clicked')->default('0');
            $table->dateTime('date_last_click')->nullable();
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
       Schema::dropIfExists('manufacturers_info'); 
    }
}
