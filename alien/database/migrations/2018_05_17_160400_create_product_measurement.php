<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductMeasurement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_measurement', function (Blueprint $table) {
            $table->increments('id');
            $table->string('measurement_name_en',29);
            $table->string('measurement_name_bn',29)->nullable();
            $table->tinyInteger('create_user_id');
            $table->tinyInteger('update_user_id');
            $table->ipAddress('create_user_ip');
            $table->ipAddress('update_user_ip');
            $table->string('is_active', 1)->default('Y');
            $table->rememberToken();
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
        Schema::dropIfExists('product_measurement');
    }
}
