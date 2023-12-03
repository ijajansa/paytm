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
        Schema::create('imports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cpsa_name')->nullable();
            $table->string('agent_name')->nullable();
            $table->string('agent_contact_number')->nullable();
            $table->string('status')->nullable();
            $table->string('status2')->nullable();
            $table->string('user_type')->nullable();
            $table->string('referee_id')->nullable();
            $table->string('contact_number')->nullable();
            $table->integer('is_payable')->default(0);
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
        Schema::dropIfExists('imports');
    }
};
