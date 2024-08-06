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
        Schema::create('IncidentReports', function (Blueprint $table) {
            $table->id();
            $table->string('ReporterName')->nullable();
            $table->string('JobTitle')->nullable();
            $table->string('ExtNo')->nullable();
            $table->string('IncidentLocation')->nullable();
            $table->dateTime('TimeOfIncident')->nullable();
            $table->text('IncidentDescription')->nullable();
            $table->date('DateOfReport')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('IncidentReports');
    }
};
