<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_request', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('member_id');
            $table->tinyInteger('patient_id');
            $table->tinyInteger('doctor_id');
            $table->string('communication_by', 1);
            $table->tinyInteger('response_time')->nullable();
            $table->string('done_it', 1)->default('N');
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
        Schema::dropIfExists('patient_request');
    }
}
