<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductStock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_stock', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('product_category_id');
            $table->tinyInteger('product_id');
            $table->tinyInteger('measurement_id');
            $table->float('product_price_tk', 6,2);
            $table->float('product_price_usd', 6,2)->nullable();
            $table->string('product_total_stock', 2);
            $table->tinyInteger('create_user_id');
            $table->tinyInteger('update_user_id');
            $table->ipAddress('create_user_ip');
            $table->ipAddress('update_user_ip');
            $table->string('is_active', 1)->default('Y');
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
        Schema::dropIfExists('product_stock');
    }
}
