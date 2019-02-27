<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 99);
            $table->string('user_type', 11)->default('6MeMber9');
            $table->string('gender', 1)->nullable();
            $table->string('email')->unique();
            $table->string('mobile', 11)->nullable();
            $table->string('password');
            $table->string('image_path', 255)->nullable();
            $table->ipAddress('visitors_ip', 29)->nullable();
            $table->timestamp('last_login');
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
        Schema::dropIfExists('users');
    }
}
