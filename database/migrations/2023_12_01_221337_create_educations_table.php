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
        Schema::create('educations', function (Blueprint $table) {
            $table->id();
           
            $table->unsignedBigInteger('application_id');
          

            $table->string('school_category');
            $table->string('school_name');
            $table->string('school_section');
            $table->string('school_course');
            $table->string('school_no_of_years');
            $table->string('school_ramount');
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
        Schema::dropIfExists('educations');
    }
};
