<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_profile', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('member_id');
            $table->string('patient_name', 69);
            $table->tinyInteger('age')->nullable();
            $table->tinyInteger('weight')->nullable();
            $table->tinyInteger('pulse')->nullable();
            $table->string('blood_pressure', 1)->nullable();
            $table->string('blood_group', 3)->nullable();
            $table->string('diabetus', 1)->nullable();
            $table->tinyInteger('temperature')->nullable();
            $table->string('urination',7)->nullable();
            $table->string('temperament',7)->nullable();
            $table->text('problem')->nullable();
            $table->string('profile_image',125)->nullable();
            $table->string('google', 69)->nullable();
            $table->string('skype', 69)->nullable();
            $table->string('mobile', 11)->nullable();
            $table->string('imo', 11)->nullable();
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
        Schema::dropIfExists('patient_profile');
    }
}
