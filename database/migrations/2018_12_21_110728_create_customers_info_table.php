<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers_info', function (Blueprint $table) {
            $table->increments('customers_info_id');
            $table->dateTime('customers_info_date_of_last_logon')->nullable();
            $table->integer('customers_info_number_of_logons')->nullable();
            $table->dateTime('customers_info_date_account_created')->nullable();
            $table->dateTime('customers_info_date_account_last_modified')->nullable();
            $table->integer('global_product_notifications')->nullable()->default('0');

        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('customers_info');  
    }
}
