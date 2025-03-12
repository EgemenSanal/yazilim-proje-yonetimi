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
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->text('description');
            $table->string('publisher');
            $table->integer('year');
            $table->string('age_limit')->default(0);
            $table->string('cover_image_path')->nullable(); // Kapak resmi yolu
            $table->string('pdf_file_path')->nullable(); // PDF dosya yolu
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
