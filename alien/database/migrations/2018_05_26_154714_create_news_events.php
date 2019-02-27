<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('news_title_bn', 55);
            $table->string('news_title_en', 55)->nullable();
            $table->string('news_brief_bn', 155);
            $table->string('news_brief_en', 155)->nullable();
            $table->text('news_details_bn');
            $table->text('news_details_en')->nullable();
            $table->string('news_big_image', 99);
            $table->string('news_small_image', 99);
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
        Schema::dropIfExists('news_events');
    }
}
