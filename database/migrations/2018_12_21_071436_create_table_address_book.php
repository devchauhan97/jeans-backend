<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAddressBook extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_book', function (Blueprint $table) {
            $table->increments('address_book_id');
            $table->integer('customers_id')->index();
            $table->char('entry_gender',1)->nullable();
            $table->string('entry_company',255)->nullable();
            $table->string('entry_firstname',255);
            $table->string('entry_lastname',255)->nullable();
            $table->string('entry_street_address',255);
            $table->string('entry_suburb',255)->nullable();
            $table->string('entry_postcode',255);
            $table->string('entry_city',255);
            $table->string('entry_state',255)->nullable();
            $table->integer('entry_country_id')->default('0');
            $table->integer('entry_zone_id')->default('0');
            $table->integer('entry_phone_no')->nullable();

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
        Schema::dropIfExists('address_book'); 
    }
}
