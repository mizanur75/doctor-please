<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_master', function (Blueprint $table) {
          $table->increments('id');
          $table->tinyInteger('product_category_id');
          $table->string('product_name_bn', 55);
          $table->string('product_name_en', 55)->nullable();
          $table->string('product_brief_bn', 155);
          $table->string('product_brief_en', 155)->nullable();
          $table->text('product_details_bn');
          $table->text('product_details_en')->nullable();
          $table->string('product_big_image', 99);
          $table->string('product_small_image', 99);
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
        Schema::dropIfExists('product_master');
    }
}
