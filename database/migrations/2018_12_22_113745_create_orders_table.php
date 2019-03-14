<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('orders_id');
            $table->decimal('total_tax',7,2);
            $table->integer('customers_id')->index();
            $table->string('customers_name',255);
            $table->string('customers_company',255)->nullable();
            $table->string('customers_street_address',255);
            $table->string('customers_suburb',255)->nullable();
            $table->string('customers_city',255);
            $table->string('customers_postcode',255);
            $table->string('customers_state',255)->nullable();
            $table->string('customers_country',255);
            $table->string('customers_telephone',255);
            $table->string('email',255);
            $table->integer('customers_address_format_id')->nullable();
            $table->string('delivery_name',255);
            $table->string('delivery_company',255)->nullable();
            $table->string('delivery_street_address',255);
            $table->string('delivery_suburb',255)->nullable();
            $table->string('delivery_city',255);
            $table->string('delivery_postcode',255);
            $table->string('delivery_state',255)->nullable();
            $table->string('delivery_country',255);
            $table->integer('delivery_address_format_id')->nullable();
            $table->string('billing_name',255);
            $table->string('billing_company',255)->nullable();
            $table->string('billing_street_address',255);
            $table->string('billing_suburb',255)->nullable();
            $table->string('billing_city',255);
            $table->string('billing_postcode',255);
            $table->string('billing_state',255)->nullable();
            $table->string('billing_country',255);
            $table->integer('billing_address_format_id');
            $table->string('payment_method',255)->nullable();
            $table->string('cc_type',20)->nullable();
            $table->string('cc_owner',255)->nullable();
            $table->string('cc_number',32)->nullable();
            $table->string('cc_expires',4)->nullable();
            $table->dateTime('last_modified')->nullable();
            $table->dateTime('date_purchased')->nullable();
            $table->dateTime('orders_date_finished')->nullable();
            $table->char('currency',3)->nullable();
            $table->decimal('currency_value',14,6)->nullable();
            $table->decimal('order_price',10,2);
            $table->decimal('shipping_cost',10,2);
            $table->string('shipping_method',100);
            $table->integer('shipping_duration')->nullable();
            $table->mediumText('order_information');
            $table->tinyInteger('is_seen')->default('0');
            $table->text('coupon_code');
            $table->decimal('coupon_amount',10,2);
            $table->string('exclude_product_ids',255);
            $table->string('product_categories',255);
            $table->string('excluded_product_categories',255);
            $table->tinyInteger('free_shipping')->default('0');
            $table->string('product_ids',255);
            $table->tinyInteger('ordered_source')->comment('1: Website, 2: App');
            $table->string('unique_order_id');
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
        Schema::dropIfExists('orders');
    }
}
