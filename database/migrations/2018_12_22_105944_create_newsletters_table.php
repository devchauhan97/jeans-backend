<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewslettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newsletters', function (Blueprint $table) {
            $table->increments('newsletters_id');
            $table->string('title',255);
            $table->mediumText('content');
            $table->string('module',255);
            $table->dateTime('date_added');
            $table->dateTime('date_sent')->nullable();
            $table->integer('status')->nullable();
            $table->integer('locked')->nullable()->default('0');
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
        Schema::dropIfExists('newsletters');
    }
}
