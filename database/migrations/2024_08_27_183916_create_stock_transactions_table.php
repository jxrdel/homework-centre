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
        Schema::create('StockTransactions', function (Blueprint $table) {
            $table->id();
            $table->string('TransactionType');
            $table->integer('Quantity');
            $table->string('TransactionDetails')->nullable();
            $table->string('Remainder')->nullable();
            $table->unsignedBigInteger('StockItemID');
            $table->string('created_by');
            $table->timestamps();
            $table->softDeletes();

            
            $table->foreign('StockItemID')->references('id')->on('StockItems')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('StockTransactions');

        Schema::table('StockTransactions', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
