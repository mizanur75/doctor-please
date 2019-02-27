<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestimonialsInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonials_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('testimonials_title_bn', 55);
            $table->string('testimonials_title_en', 55)->nullable();
            $table->string('testimonials_brief_bn', 155);
            $table->string('testimonials_brief_en', 155)->nullable();
            $table->text('testimonials_details_bn');
            $table->text('testimonials_details_en')->nullable();
            $table->string('testimonials_big_image', 99);
            $table->string('testimonials_small_image', 99);
            $table->integer('total_view')->nullable();
            $table->string('show_home',1)->default('N');
            $table->string('bn_url', 69);
            $table->string('en_url', 69);
            $table->string('is_active', 1)->default('Y');
            $table->tinyInteger('create_user_id');
            $table->tinyInteger('update_user_id');
            $table->ipAddress('create_user_ip');
            $table->ipAddress('update_user_ip');
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
        Schema::dropIfExists('testimonials_info');
    }
}
