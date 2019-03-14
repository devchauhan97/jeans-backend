<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('products_id');
            $table->integer('products_quantity');
            $table->string('products_model',255)->index()->nullable();
            $table->mediumText('products_image')->nullable();
            $table->decimal('products_price',15,2);
            $table->dateTime('products_date_added')->index();
            $table->dateTime('products_last_modified')->nullable();
            $table->dateTime('products_date_available')->nullable();
            $table->string('products_weight',255);
            $table->string('products_weight_unit',255);
            $table->tinyInteger('products_status');
            $table->integer('products_tax_class_id')->default('0');
            $table->integer('manufacturers_id')->nullable();
            $table->integer('products_ordered')->default('0');
            $table->integer('products_liked')->default('0');
            $table->integer('low_limit')->nullable();
            $table->string('products_slug')->nullable();
            $table->tinyInteger('is_feature')->nullable();
            $table->tinyInteger('semi_stitched')->nullable();
            $table->string('products_tags_id')->nullable();
            
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
        Schema::dropIfExists('products');
    }
}
