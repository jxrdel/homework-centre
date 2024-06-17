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
        Schema::table('appointments', function (Blueprint $table) {
            // Change the columns to datetime
            $table->datetime('StartDate')->change();
            $table->datetime('EndDate')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            // Revert the columns back to their original type
            $table->date('StartDate')->change();
            $table->date('EndDate')->change();
        });
    }
};
