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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('patient_id')->nullable();
             $table->string('doctor_id')->nullable();
             $table->string('service_id')->nullable();
            $table->string('schedule_id')->nullable();
            $table->string('appointment_date')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('status')->nullable();
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
