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
        Schema::create('AccidentReports', function (Blueprint $table) {
            $table->id();
            $table->string('ChildName')->nullable();
            $table->integer('ChildAge')->nullable();
            $table->string('AccidentLocation')->nullable();
            $table->dateTime('TimeOfAccident')->nullable();
            $table->text('AccidentDescription')->nullable();
            $table->text('InjuryDescription')->nullable();
            $table->string('MedicalReport')->nullable();
            $table->text('RemedialActions')->nullable();
            $table->boolean('ParentNotified')->nullable();
            $table->string('ReporterName')->nullable();
            $table->string('JobTitle')->nullable();
            $table->date('DateOfReport')->nullable();
            $table->string('ReportPath')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('AccidentReports');
    }
};
