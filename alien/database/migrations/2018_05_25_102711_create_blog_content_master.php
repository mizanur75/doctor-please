<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogContentMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_content_master', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('blog_category_id');
            $table->string('author_name');
            $table->string('bn_url',69)->nullable();
            $table->string('en_url',69)->nullable();
            $table->string('blog_title_bn', 55);
            $table->string('blog_title_en', 55)->nullable();
            $table->string('blog_brief_bn', 155);
            $table->string('blog_brief_en', 155)->nullable();
            $table->text('blog_details_bn');
            $table->text('blog_details_en')->nullable();
            $table->string('blog_big_image', 99);
            $table->string('blog_small_image', 99);
            $table->integer('total_view')->default(1);
            $table->string('show_home',1)->default('N');
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
        Schema::dropIfExists('blog_content_master');
    }
}
