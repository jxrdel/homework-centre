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
        Schema::create('WeeklyReports', function (Blueprint $table) {
            $table->bigIncrements('WeeklyReportID'); // Primary Key
            $table->date('StartDate')->nullable();
            $table->date('EndDate')->nullable();
            $table->string('Objectives')->nullable();
            $table->string('ActivitiesCompleted')->nullable();
            $table->string('Challenges')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('WeeklyReports');
    }
};
