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
        Schema::create('guarantors', function (Blueprint $table) {
            $table->id();
            //first guarantor
           
            $table->unsignedBigInteger('application_id');
         

            $table->string('gf_names');
            $table->string('gf_relationship');
            $table->string('gf_phone');
            $table->string('gf_email')->nullable();
            $table->string('gf_address');
            //second guarantor
            $table->string('gs_names');
            $table->string('gs_relationship');
            $table->string('gs_phone');
            $table->string('gs_email')->nullable();
            $table->string('gs_address');
           
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
        Schema::dropIfExists('guarantors');
    }
};
