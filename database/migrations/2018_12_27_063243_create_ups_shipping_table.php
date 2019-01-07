<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpsShippingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ups_shipping', function (Blueprint $table) {
            $table->increments('ups_id');
            $table->string('pickup_method',255);
            $table->string('isDisplayCal',255);
            $table->string('serviceType',255);
            $table->string('shippingEnvironment',255);
            $table->string('user_name',255);
            $table->string('access_key',255);
            $table->string('password',255);
            $table->string('person_name',255);
            $table->string('company_name',255);
            $table->string('phone_number',255);
            $table->string('address_line_1',255);
            $table->string('address_line_2',255);
            $table->string('country',255);
            $table->string('state',255);
            $table->string('post_code',255);
            $table->string('city',255);
            $table->string('no_of_package',255);
            $table->string('parcel_height',255);
            $table->string('parcel_width',255);
            $table->string('title',255);
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
         Schema::dropIfExists('ups_shipping');
    }
}
