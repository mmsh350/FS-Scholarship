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
        Schema::create('head_of_schools', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('application_id');
           

            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('state');
            $table->string('city')->nullable();
            $table->string('address');
            $table->timestamps();

            $table->foreign('application_id')->references('id')->on('applications');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('head_of_schools');
    }
};
