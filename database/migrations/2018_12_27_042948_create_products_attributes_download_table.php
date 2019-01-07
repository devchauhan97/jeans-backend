<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsAttributesDownloadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_attributes_download', function (Blueprint $table) {
            $table->increments('products_attributes_id');
            $table->string('products_attributes_filename',255);
            $table->integer('products_attributes_maxdays')->nullable()->default('0');
            $table->integer('products_attributes_maxcount')->nullable()->default('0');
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
       Schema::dropIfExists('products_attributes_download');
    }
}
