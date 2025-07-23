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
        Schema::create('artikel', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('konten');
            $table->string('slug')->unique();
            $table->string('gambar')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->boolean('status')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->string('kategori')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artikel');
    }
};
