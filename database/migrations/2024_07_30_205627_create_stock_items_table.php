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
        Schema::create('StockItems', function (Blueprint $table) {
            $table->id();
            $table->string('ItemName');
            $table->integer('Quantity');
            $table->string('Notes')->nullable();
            $table->string('Code')->nullable();
            $table->string('Addition')->nullable();
            $table->string('Removal')->nullable();
            $table->string('DetailsOfRemoval')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('StockItems');
    }
};
