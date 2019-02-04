<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersProductsAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_products_attributes', function (Blueprint $table) {
            $table->increments('orders_products_attributes_id');
            $table->unsignedInteger('orders_id');
            $table->foreign('orders_id')->references('orders_id')->on('orders')->onDelete('cascade');
            $table->integer('orders_products_id');
            $table->integer('products_id');
            $table->integer('products_options_values_id');
            $table->string('products_options',32);
            $table->string('products_options_values',32);
            $table->decimal('options_values_price',15,2);
            $table->char('price_prefix',1);
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
        Schema::dropIfExists('orders_products_attributes');
    }
}
