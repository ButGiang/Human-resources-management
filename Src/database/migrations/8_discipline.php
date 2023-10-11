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
        Schema::create('discipline', function (Blueprint $table) {
            $table->increments('discipline_id');
            $table->string('name', 255);
            $table->date('date');
            $table->string('describe', 255);
            $table->string('image', 255)->nullable();
            $table->integer('punish')->unsigned();
            $table->integer('id')->unsigned();
        });

        Schema::table('discipline', function ($table) {   
            $table->foreign('id')->references('id')->on('staffs')->onDelete('cascade')->onUpdate('cascade');    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discipline');
    }
};
