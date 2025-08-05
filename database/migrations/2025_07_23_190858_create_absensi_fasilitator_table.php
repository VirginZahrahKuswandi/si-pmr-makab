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
        Schema::create('absensi_fasilitator', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('absensi_id');
            $table->unsignedBigInteger('fasilitator_id');
            $table->enum('status', ['belum_absen', 'sudah_absen'])->default('belum_absen');
            $table->enum('status_verifikasi', ['pending', 'disetujui', 'ditolak'])->default('pending');
            $table->string('keterangan')->nullable();
            $table->timestamp('waktu_absen')->useCurrent();
            $table->timestamps();

            $table->foreign('absensi_id')->references('id')->on('absensi')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('fasilitator_id')->references('id')->on('fasilitator')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi_fasilitator');
    }
};
