<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->increments('currencies_id');
            $table->string('title',32);
            $table->char('code',3)->index();
            $table->string('symbol_left',12)->nullable();
            $table->string('symbol_right',12)->nullable();
            $table->char('decimal_point',1)->nullable();
            $table->char('thousands_point',1)->nullable();
            $table->char('decimal_places',1)->nullable();
            $table->float('value', 13, 8)->nullable();
            $table->dateTime('last_updated')->nullable();
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
        Schema::dropIfExists('currencies');
    }
}
