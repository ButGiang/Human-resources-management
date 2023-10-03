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
        Schema::create('departments', function (Blueprint $table) {
            $table->increments('department_id');
            $table->string('name', 100)->unique();
            $table->string('describe', 255);
            $table->timestamps();
            $table->integer('manager_id');
        });

        Schema::table('departments', function ($table) {    
            $table->foreign('manager_id')->references('id')->on('staffs')->onDelete('cascade')->onUpdate('cascade');    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
