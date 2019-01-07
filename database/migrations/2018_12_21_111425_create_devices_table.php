<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('devices', function (Blueprint $table) {
        $table->increments('id')->index();
        $table->Text('device_id');
        $table->integer('customers_id')->default('0');
        $table->Text('device_type');
        $table->integer('register_date')->default('0');
        $table->integer('update_date')->nullable();
        $table->tinyInteger('status')->default('0');
        $table->tinyInteger('isDesktop')->default('0');
        $table->tinyInteger('onesignal')->default('0');
        $table->tinyInteger('isEnableMobile')->default('1');
        $table->tinyInteger('isEnableDesktop')->default('1');
        $table->string('ram',255)->nullable();
        $table->string('processor',255)->nullable();
        $table->string('device_os',255)->nullable();
        $table->string('location',255)->nullable();
        $table->string('device_model',255);
        $table->string('manufacturer',255);
        $table->tinyInteger('is_notify')->default('1');
        $table->tinyInteger('fcm')->default('0');
        });  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('devices');  
    }
}
