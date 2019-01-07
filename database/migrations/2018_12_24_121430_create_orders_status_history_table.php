<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersStatusHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_status_history', function (Blueprint $table) {
            $table->increments('orders_status_history_id');
            $table->integer('orders_id')->index();
            $table->integer('orders_status_id');
            $table->dateTime('date_added');
            $table->integer('customer_notified')->nullable()->default('0');
            $table->mediumText('comments')->nullable();
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
        Schema::dropIfExists('orders_status_history');
    }
}
