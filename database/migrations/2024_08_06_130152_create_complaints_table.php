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
        Schema::create('Complaints', function (Blueprint $table) {
            $table->id();
            $table->date('DateOfComplaint')->nullable();
            $table->string('VOSCRep')->nullable();
            $table->string('FacilitiesManager')->nullable();
            $table->string('HSRep')->nullable();
            $table->string('ComplaintType')->nullable();
            $table->text('ComplaintLocation')->nullable();
            $table->text('ComplaintDetails')->nullable();
            $table->text('AdditionalInfo')->nullable();
            $table->date('VOSCRepDateReferred')->nullable();
            $table->date('FacilitiesManagerDateReferred')->nullable();
            $table->date('HSRepDateReferred')->nullable();
            $table->string('ReporterName')->nullable();
            $table->string('ReporterTelNo')->nullable();
            $table->string('ReporterExt')->nullable();
            $table->string('ReporterEmail')->nullable();
            $table->string('ComplaintPath')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Complaints');
    }
};
