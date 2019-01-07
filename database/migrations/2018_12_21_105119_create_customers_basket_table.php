<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersBasketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers_basket', function (Blueprint $table) {
            $table->increments('customers_basket_id');
            $table->integer('customers_id');
            $table->Text('products_id');
            $table->integer('customers_basket_quantity');
            $table->decimal('final_price',15,2)->nullable();
            $table->char('customers_basket_date_added',10)->nullable();
            $table->tinyInteger('is_order')->default('0');
            $table->string('session_id',255);
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
        Schema::dropIfExists('customers_basket'); 
    }
}
