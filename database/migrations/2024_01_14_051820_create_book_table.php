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
        Schema::create('book', function (Blueprint $table) {
            $table->id('book_id');
            $table->unsignedBigInteger('book_category_id');
            $table->string('code');
            $table->string('title');
            $table->string('author');
            $table->string('genre');
            $table->integer('year');
            $table->integer('edition');
            $table->string('isbn');
            $table->string('city');
            $table->text('description');
            $table->unsignedBigInteger('book_publisher_id');
            $table->timestamps();

            $table->foreign('book_category_id')->references('book_category_id')->on('book_category');
            $table->foreign('book_publisher_id')->references('book_publisher_id')->on('book_publisher');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book');
    }
};
