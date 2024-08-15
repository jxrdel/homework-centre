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
            $table->bigIncrements('AppointmentID'); // Primary Key
            $table->string('Title'); // Title of the appointment
            $table->date('StartDate'); // Start date of the appointment
            $table->date('EndDate'); // End date of the appointment
            $table->unsignedBigInteger('StudentID'); // Foreign key to students table

            $table->timestamps(); // Created_at and updated_at timestamps

            // Define the foreign key constraint
            $table->foreign('StudentID')->references('StudentID')->on('students')->onDelete('cascade');
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
