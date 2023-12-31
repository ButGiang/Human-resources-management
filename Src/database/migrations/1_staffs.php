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
        Schema::create('staffs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 255);
            $table->string('last_name', 50);
            $table->integer('gender')->length(1);
            $table->date('birthday');
            $table->integer('CCCD')->unique();
            $table->string('email', 100)->unique();
            $table->string('address', 255);
            $table->string('phone', 11);
            $table->string('avatar', 255);
            $table->date('recruit_day');
            $table->integer('active')->length(1);
            $table->integer('department_id')->unsigned()->nullable();
            $table->integer('position_id')->unsigned()->nullable();
            $table->integer('degree_id')->unsigned()->nullable();
        });

        Schema::table('staffs', function ($table) {    
            $table->foreign('department_id')->references('department_id')->on('departments')->onDelete('cascade')->onUpdate('cascade');  
            $table->foreign('position_id')->references('position_id')->on('position')->onDelete('cascade')->onUpdate('cascade'); 
            $table->foreign('degree_id')->references('degree_id')->on('degree')->onDelete('cascade')->onUpdate('cascade');   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staffs');
    }
};
