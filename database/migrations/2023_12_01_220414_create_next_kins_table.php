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
        Schema::create('next_kins', function (Blueprint $table) {
            $table->id();
        
            $table->unsignedBigInteger('application_id');

            $table->string('nok_title');
            $table->string('nok_relationship');
            $table->string('nok_surname');
            $table->string('nok_middle_name');
            $table->string('nok_firstname');
            $table->string('nok_gender');
            $table->string('nok_dob');
            $table->string('nok_phone');
            $table->string('nok_email')->nullable();
            $table->string('nok_state');
            $table->string('nok_lga');
            $table->string('nok_busstop');
            $table->string('nok_address');
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
        Schema::dropIfExists('next_kins');
    }
};
