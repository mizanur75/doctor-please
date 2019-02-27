<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_profile', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('user_id');
            $table->string('doctor_name', 69);
            $table->string('degree', 69)->nullable();
            $table->string('training', 255)->nullable();
            $table->string('email', 69)->nullable();
            $table->string('skype', 69)->nullable();
            $table->string('mobile', 11)->nullable();
            $table->string('imo', 11)->nullable();
            $table->string('gender', 1)->nullable();
            $table->text('about')->nullable();
            $table->text('available',1)->default('N');
            $table->string('profile_image',125)->nullable();
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
        Schema::dropIfExists('doctor_profile');
    }
}
