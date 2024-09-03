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
        Schema::create('WaitingList', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('TimeSlotID');
            $table->unsignedBigInteger('StudentID');
            $table->boolean('IsAccepted')->default(false);

            // Adding foreign key constraints
            $table->foreign('TimeSlotID')->references('TimeSlotID')->on('timeslots')->onDelete('cascade');
            $table->foreign('StudentID')->references('StudentID')->on('students')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('WaitingList');
    }
};
