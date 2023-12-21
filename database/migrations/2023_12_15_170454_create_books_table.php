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
        Schema::create('books', function (Blueprint $table) {
            $table->id('book_id');
            $table->string('title');
            $table->string('code');
            $table->string('author');
            $table->string('genre');
            $table->string('year');
            $table->string('edition')->nullable();
            $table->string('isbn');
            $table->string('description');
            $table->string('publish_city');
            $table->unsignedBigInteger('publisher_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('publisher_id')->references('publisher_id')->on('publishers')->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('category_id')->references('category_id')->on('categories')->nullOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
