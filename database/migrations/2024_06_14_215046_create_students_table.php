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
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('StudentID'); // Primary Key
            $table->string('FirstName');
            $table->string('LastName');
            $table->string('OtherNames')->nullable();
            $table->string('Sex')->nullable();
            $table->date('DOB')->nullable(); // Date of birth
            $table->string('SchoolName')->nullable();
            $table->string('Address')->nullable();
            $table->string('PicturePath')->nullable(); // Path for uploaded picture

            
            $table->string('DoctorName')->nullable();
            $table->string('DoctorPhone')->nullable();
            $table->string('DoctorAddress')->nullable();
            $table->string('DoctorCity')->nullable();
            $table->string('Allergies')->nullable();
            $table->string('MedicalProblems')->nullable();
            $table->string('Disabilities')->nullable();
            $table->string('BloodType')->nullable();
            $table->string('AdditionalInfo')->nullable();
            $table->string('ImmunizationPath')->nullable();

            $table->timestamps(); // Created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
