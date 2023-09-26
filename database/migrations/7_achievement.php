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
        Schema::create('achievement', function (Blueprint $table) {
            $table->increments('achievement_id');
            $table->string('name', 255);
            $table->date('date');
            $table->string('describe', 255);
            $table->string('image', 255)->nullable();
            $table->integer('reward')->unsigned();
            $table->integer('id')->unsigned();
        });

        Schema::table('achievement', function ($table) {   
            $table->foreign('id')->references('id')->on('staffs')->onDelete('cascade')->onUpdate('cascade');    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achievement');
    }
};
