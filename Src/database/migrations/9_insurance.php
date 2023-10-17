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
        Schema::create('insurance', function (Blueprint $table) {
            $table->integer('insurance_id');
            $table->date('registration_date');
            $table->string('register_place', 255);
            $table->string('hospital', 255);
            $table->integer('id')->unsigned();
        });

        Schema::table('insurance', function ($table) {   
            $table->foreign('id')->references('id')->on('staffs')->onDelete('cascade')->onUpdate('cascade');    
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('insurance');
    }
};
