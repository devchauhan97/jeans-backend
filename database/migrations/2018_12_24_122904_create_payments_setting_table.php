<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('payments_setting', function (Blueprint $table) {
            $table->increments('payments_id');
            $table->string('braintree_enviroment',255);
            $table->string('braintree_name',100);
            $table->string('braintree_merchant_id',255);
            $table->string('braintree_public_key',255);
            $table->string('braintree_private_key',255);
            $table->tinyInteger('brantree_active')->default('0');
            $table->string('stripe_enviroment',255);
            $table->string('stripe_name',255);
            $table->string('secret_key',255);
            $table->string('publishable_key',255);            
            $table->tinyInteger('stripe_active')->default('0');
            $table->tinyInteger('cash_on_delivery')->default('0');
            $table->string('cod_name',100);
            $table->string('paypal_name',100);
            $table->string('paypal_id',255);
            $table->tinyInteger('paypal_status')->default('0');
            $table->tinyInteger('paypal_enviroment')->default('0')->nullable();
            $table->string('payment_currency',100);
            $table->tinyInteger('instamojo_enviroment');
            $table->string('instamojo_name',255);
            $table->string('instamojo_api_key',255);
            $table->string('instamojo_auth_token',255);
            $table->text('instamojo_client_id');
            $table->text('instamojo_client_secret');
            $table->tinyInteger('instamojo_active')->default('0');
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
        Schema::dropIfExists('payments_setting');
    }
}
