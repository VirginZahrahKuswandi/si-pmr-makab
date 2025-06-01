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
        Schema::create('jadwal_fasilitator', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_sekolah_id')->constrained('jadwal_sekolah')->onDelete('cascade');
            $table->foreignId('fasilitator_id')->constrained('fasilitator')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_fasilitator');
    }
};
