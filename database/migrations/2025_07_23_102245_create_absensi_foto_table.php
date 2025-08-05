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
        Schema::create('absensi_foto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('absensi_id')->constrained('absensi')->onDelete('cascade');
            $table->foreignId('jenis_absensi_foto_id')->constrained('jenis_absensi_foto')->onDelete('cascade');
            $table->string('path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi_foto');
    }
};
