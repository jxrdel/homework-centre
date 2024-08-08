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
        Schema::create('FeedbackForms', function (Blueprint $table) {
            $table->bigIncrements('FeedbackFormID'); // Primary Key
            $table->string('Compliments')->nullable();
            $table->string('Complaints')->nullable();
            $table->string('Suggestions')->nullable();
            $table->string('ActivitySatisfaction')->nullable();
            $table->string('OverallSatisfaction')->nullable();
            $table->string('ChildSatisfaction')->nullable();
            $table->unsignedBigInteger('ParentID');

            $table->timestamps();
            $table->foreign('ParentID')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('FeedbackForms');
    }
};
