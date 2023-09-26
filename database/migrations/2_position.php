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
        Schema::create('position', function (Blueprint $table) {
            $table->increments('position_id');
            $table->string('name', 100)->unique();
            $table->string('describe', 255);
            $table->timestamps();
            $table->integer('department_id')->unsigned();
        });

        Schema::table('position', function ($table) {    
            $table->foreign('department_id')->references('department_id')->on('departments')->onDelete('cascade')->onUpdate('cascade');    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('position');
    }
};
