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
        Schema::create('evaluation', function (Blueprint $table) {
            $table->id('evaluation_id');
            $table->unsignedBigInteger('alternative_id');
            $table->integer('book_type');
            $table->integer('book_loan');
            $table->integer('popularity');
            $table->integer('avalability');
            $table->timestamps();

            $table->foreign('alternative_id')->references('alternative_id')->on('alternative');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluation');
    }
};
