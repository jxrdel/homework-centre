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
        Schema::create('UserPickupcontact', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('UserID');
            $table->unsignedBigInteger('PickupContactID');
            $table->timestamps();

            // Adding foreign key constraints
            $table->foreign('UserID')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('PickupContactID')->references('PickupContactID')->on('pickup_contacts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_pickupcontacts');
    }
};
