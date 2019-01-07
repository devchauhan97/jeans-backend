<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('orders_status', function (Blueprint $table) {
                $table->integer('orders_status_id')->default('0')->index();
                $table->integer('language_id')->index()->default('0');
                $table->string('orders_status_name',255)->index();
                 $table->integer('public_flag')->nullable()->default('0');
                  $table->integer('downloads_flag')->nullable()->default('0');

            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_status');
    }
}
