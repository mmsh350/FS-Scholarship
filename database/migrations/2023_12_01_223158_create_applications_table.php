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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('names');
            $table->date('dob');
            $table->string('gender');
            $table->string('phone');
            $table->string('email');
            $table->string('country');
            $table->string('nationality');
            $table->string('state_id');
            $table->string('lga_id');
            $table->string('home_address');
            $table->string('busstop_address');
            $table->longText('passport');
            $table->string('dysabroad')->nullable();
            $table->string('intl_phone')->nullable();
            $table->string('intl_address')->nullable();
            $table->enum('status', ['Pending','Approved','Rejected'])->default('Pending');
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
        Schema::dropIfExists('applications');
    }
};
