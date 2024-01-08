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

            $table->bigInteger('user_id');
            $table->bigInteger('school_id');
            $table->string('category');
            $table->string('names');
            $table->date('dob');
            $table->string('gender');
            $table->string('phone');
            $table->string('email');
            $table->string('country');
            $table->string('nationality');
            $table->bigInteger('state_id');
            $table->bigInteger('lga_id');
            $table->string('home_address');
            $table->string('busstop_address');
            $table->longText('passport');
            $table->string('dysabroad')->nullable();
            $table->string('intl_phone')->nullable();
            $table->string('intl_address')->nullable();
            $table->enum('status', ['Pending','Approved','Rejected'])->default('Pending');
            $table->string('ramount')->nullable();
            $table->string('comments')->nullable();
            $table->string('approved_amount')->nullable()->default(0);
            $table->string('initial_fee')->nullable()->default(0);
            $table->string('total_paid')->nullable()->default(0);
            $table->string('monthly_repayment')->nullable()->default(0);
            $table->enum('pay_status', ['Paid','Pending'])->default('Pending');
            $table->enum('app_verify', [0,1])->default(0);
            $table->tinyInteger('verify_id')->nullable();
            $table->enum('app_accept', [0,1,2])->default(0);
            $table->string('acct_name')->nullable();
            $table->string('acct_number')->nullable();
            $table->string('acct_bankname')->nullable();
            $table->enum('disbursed', [0,1])->default(0);
            $table->bigInteger('location_id');
            $table->enum('app_status', ['Open','Close'])->default('Open');
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
