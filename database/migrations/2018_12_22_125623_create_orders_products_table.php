<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_products', function (Blueprint $table) {
            $table->increments('orders_products_id');
            $table->unsignedInteger('orders_id');
            $table->foreign('orders_id')->references('orders_id')->on('orders')->onDelete('cascade');
            $table->integer('products_id')->index();
            $table->string('products_model',12)->nullable();
            $table->string('semi_stitched')->nullable();
            $table->string('products_name',64);
            $table->decimal('products_price',15,2);
            $table->decimal('final_price',15,2);
            $table->decimal('products_tax',7,0);
            $table->integer('products_quantity');
            $table->timestamp('deliver_on')->nullable();
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
        Schema::dropIfExists('orders_products');
    }
}
