<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('banners_history', function (Blueprint $table) {
            $table->increments('banners_history_id');
            $table->integer('banners_id');
            $table->integer('banners_shown')->default('0');
            $table->integer('banners_clicked')->default('0');
            $table->dateTime('banners_history_date');
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
       Schema::dropIfExists('banners_history');
    }
}
