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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('FirstName');
            $table->string('LastName');
            $table->string('Username')->unique();
            $table->string('Email')->nullable();
            $table->string('MobileNo')->nullable();
            $table->string('HomeNo')->nullable();
            $table->string('WorkNo')->nullable();
            $table->string('Ministry')->nullable();
            $table->string('Department')->nullable();
            $table->string('ChildRelationship')->nullable();
            $table->string('PicturePath')->nullable();
            $table->string('Address')->nullable();
            $table->string('CityTown')->nullable();
            $table->boolean('MediaReleaseConsent');
            $table->boolean('EmergencyConsent');
            $table->boolean('IsParent');
            $table->boolean('IsAdmin');
            $table->boolean('HasWindowsLogin')->nullable();
            $table->string('RegisteredBy')->nullable();
            $table->unsignedBigInteger('EmergencyContactID');
            $table->timestamps();
            
            $table->foreign('EmergencyContactID')->references('EmergencyContactID')->on('emergency_contacts');
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        // Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
