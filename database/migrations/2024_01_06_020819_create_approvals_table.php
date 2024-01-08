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
        Schema::create('approvals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('app_id');
            $table->string('approved_amount')->nullable()->default(0);
            $table->string('initial_fee')->nullable()->default(0);
            $table->string('monthly_repayment')->nullable()->default(0);
            $table->string('disbursed_amount')->nullable()->default(0);
            $table->string('disbursed_interest')->nullable()->default(0);
            $table->enum('status', ['Pending','Ongoing','Completed'])->default('Pending');
            $table->date('disbursed_date')->nullable();
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
        Schema::dropIfExists('approvals');
    }
};
