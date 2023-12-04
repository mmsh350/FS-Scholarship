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
            $table->id();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->enum('title', ['Mr','Mrs','Miss']);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();;
            $table->date('dob')->nullable();;
            $table->string('gender')->nullable();
            $table->string('phone_number')->nullable();
            $table->boolean('is_active')->default(true);
            $table->enum('role', ['admin','staff','agent','applicant'])->default('applicant');
            $table->enum('registeredby', ['admin','staff','agent','self'])->default('self');
            $table->bigInteger('registrar_id')->nullable();
            $table->bigInteger('state_id')->nullable();
            $table->bigInteger('lga_id')->nullable();
            $table->longText('address')->nullable();
            $table->longText('profile_pic')->nullable();
            $table->timestamp('current_sign_in_at')->nullable();
            $table->timestamp('last_sign_in_at')->nullable();
            $table->string('created_by')->nullable();
            $table->dateTimeTz('deleted_at')->nullable();
            $table->string('deleted_by')->nullable();
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
