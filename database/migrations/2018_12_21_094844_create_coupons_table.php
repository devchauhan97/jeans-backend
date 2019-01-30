<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('coupans_id');
            $table->string('code',255); 
            $table->dateTime('date_created')->nullable();
            $table->dateTime('date_modified')->nullable();
            $table->mediumText('description')->nullable();
            $table->string('discount_type',100)->comment('Options: fixed_cart, percent, Default: fixed_cart.');/ /fixed_product and percent_product.
            $table->integer('amount'); 
            $table->dateTime('expiry_date');
            $table->integer('usage_count')->nullable();
            $table->tinyInteger('individual_use')->nullable();
            $table->string('product_ids',255);
            $table->string('exclude_product_ids',255);
            $table->integer('usage_limit')->nullable();
            $table->integer('usage_limit_per_user')->nullable();
            $table->integer('limit_usage_to_x_items')->nullable();
            $table->tinyInteger('free_shipping')->nullable();
            $table->string('product_categories',255);
            $table->string('excluded_product_categories',255);
            $table->tinyInteger('exclude_sale_items')->nullable();;
            $table->decimal('minimum_amount', 10, 2)->nullable();
            $table->decimal('maximum_amount', 10, 2)->nullable();
            $table->mediumText('email_restrictions');
            $table->string('used_by')->nullable();
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
        Schema::dropIfExists('coupons');
    }
}
