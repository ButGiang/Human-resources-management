<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->increments('bank_account_id');
            $table->string('bank_name', 255);
            $table->integer('bank_number')->unique();
            $table->integer('id')->unsigned();
        });

        Schema::table('bank_accounts', function ($table) {    
            $table->foreign('id')->references('id')->on('staffs')->onDelete('cascade')->onUpdate('cascade');    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_accounts');
    }
};
