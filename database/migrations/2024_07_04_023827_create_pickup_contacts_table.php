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
        Schema::create('pickup_contacts', function (Blueprint $table) {
            $table->bigIncrements('PickupContactID'); // Primary Key
            $table->string('FirstName'); 
            $table->string('LastName'); 
            $table->string('Email')->nullable(); 
            $table->string('MobileNo')->nullable(); 
            $table->string('HomeNo')->nullable(); 
            $table->string('WorkNo')->nullable(); 
            $table->string('Address')->nullable(); 
            $table->string('PicturePath')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pickup_contacts');
    }
};
