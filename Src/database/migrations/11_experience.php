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
        Schema::create('experience', function (Blueprint $table) {
            $table->integer('experience_id');
            $table->integer('type')->unsigned();
            $table->string('describe', 255);
            $table->date('date');
            $table->integer('id')->unsigned();
        });

        Schema::table('experience', function ($table) {   
            $table->foreign('id')->references('id')->on('staffs')->onDelete('cascade')->onUpdate('cascade');    
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('experience');
    }
};
