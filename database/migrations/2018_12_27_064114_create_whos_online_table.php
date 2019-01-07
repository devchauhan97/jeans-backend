<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWhosOnlineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whos_online', function (Blueprint $table) {
            $table->integer('customer_id')->default('0')->index();
            $table->string('full_name',255);
            $table->string('session_id',255);
            $table->string('ip_address',255);
            $table->string('time_entry',255);
            $table->string('time_last_click',255);
            $table->mediumText('last_page_url');
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
        Schema::dropIfExists('whos_online');
    }
}
