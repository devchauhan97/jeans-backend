<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAdministrators extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('administrators', function (Blueprint $table) {
            $table->increments('myid');
            $table->string('user_name',255)->nullable();
            $table->string('first_name',255)->nullable(false);
            $table->string('last_name',255)->nullable();
            $table->string('email',255)->index();
            $table->string('password',255)->nullable(false);
            $table->tinyInteger('isActive')->default('0');
            $table->string('address',255);
            $table->string('city',255);
            $table->string('state',255);
            $table->string('zip',255);
            $table->string('country',255);
            $table->string('phone',255);
            $table->longText('image');
            $table->tinyInteger('adminType')->default('1');
            $table->string('remember_token')->nullable();
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
         Schema::dropIfExists('administrators');
    }
}
