<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('url')->unique();  // ← Index für schnelle Suche!
            $table->json('content')->nullable();
            $table->boolean('is_published')->default(false);
            $table->foreignId('parent_id')->nullable()->constrained('pages')->onDelete('cascade');
            $table->timestamps();
            
            // Indices
            $table->index('slug');
            $table->index('is_published');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};