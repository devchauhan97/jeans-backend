<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tax_rates', function (Blueprint $table) {
            $table->increments('tax_rates_id');
            $table->integer('tax_zone_id');
            $table->integer('tax_class_id');
            $table->integer('tax_priority')->nullable()->default('1');
            $table->decimal('tax_rate',7,2);
            $table->string('tax_description',255)->nullable();
            $table->dateTime('last_modified')->nullable();
            $table->dateTime('date_added');
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
        Schema::dropIfExists('tax_rates');
    }
}
