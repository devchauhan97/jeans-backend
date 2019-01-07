<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlertSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alert_settings', function (Blueprint $table) {
            $table->increments('alert_id');
            $table->tinyInteger('create_customer_email')->default('0');
            $table->tinyInteger('create_customer_notification')->default('0');
            $table->tinyInteger('order_status_email')->default('0');
            $table->tinyInteger('order_status_notification')->default('0');
            $table->tinyInteger('new_product_email')->default('0');
            $table->tinyInteger('new_product_notification')->default('0');
            $table->tinyInteger('forgot_email')->default('0');
            $table->tinyInteger('forgot_notification')->default('0');
            $table->tinyInteger('news_email')->default('0');
            $table->tinyInteger('news_notification')->default('0');
            $table->tinyInteger('contact_us_email')->default('0');
            $table->tinyInteger('contact_us_notification')->default('0');
            $table->tinyInteger('order_email')->default('0');
            $table->tinyInteger('order_notification')->default('0');
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
        Schema::dropIfExists('alert_settings');
    }
}
