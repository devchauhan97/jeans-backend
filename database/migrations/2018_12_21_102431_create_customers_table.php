<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('customers', function (Blueprint $table) {
            $table->increments('customers_id');
            $table->string('customers_gender')->nullable();
            $table->string('customers_firstname',255);
            $table->string('customers_lastname',255)->nullable();
            $table->string('customers_dob',255)->nullable();
            $table->string('email',255)->index();
            $table->string('user_name',255);
            $table->string('city',255);
            $table->integer('country_id')->nullable();
            $table->integer('customers_default_address_id')->nullable();
            $table->string('customers_telephone',255);            
            $table->string('customers_fax',255)->nullable();
            $table->string('password',60);
            $table->char('customers_newsletter',1)->nullable();
            $table->tinyInteger('isActive')->default('0');
            $table->string('fb_id',255)->nullable();
            $table->string('google_id',255)->nullable();
            $table->mediumText('customers_picture');
            $table->tinyInteger('is_seen')->default('0');
            $table->string('remember_token');
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
        Schema::dropIfExists('customers');
    }
}
