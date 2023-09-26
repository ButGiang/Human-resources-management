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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('username', 100);
            $table->string('email', 100)->unique();
            $table->string('password', 1000);
            $table->timestamps();
            $table->integer('id')->unsigned();
        });

        Schema::table('users', function ($table) {    
            $table->foreign('id')->references('id')->on('staffs')->onDelete('cascade')->onUpdate('cascade');    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
