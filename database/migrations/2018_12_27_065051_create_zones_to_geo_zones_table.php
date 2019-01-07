<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZonesToGeoZonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zones_to_geo_zones', function (Blueprint $table) {
            $table->increments('association_id');
            $table->integer('zone_country_id')->index();
            $table->integer('zone_id')->nullable();
            $table->integer('geo_zone_id')->nullable();
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
        Schema::dropIfExists('zones_to_geo_zones');
    }
}
