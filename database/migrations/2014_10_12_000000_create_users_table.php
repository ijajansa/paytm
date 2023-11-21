<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->integer('role_id');
            $table->string('full_name')->nullable();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->text('address')->nullable();
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('pincode')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('email')->unique();
            $table->string('aadhar_number')->nullable();
            $table->string('pan_number')->nullable();
            $table->string('agent_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('visible_password');
            $table->integer('is_active')->default(1);
            $table->string('accountant_name')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('ifsc_code')->nullable();
            $table->string('account_number')->nullable();
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
};
