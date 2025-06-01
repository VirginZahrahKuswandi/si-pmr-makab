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
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_sekolah_id');
            $table->integer('jumlah_siswa_hadir');
            $table->string('deskripsi');
            $table->enum('status', ['pending', 'acc', 'tolak'])->default('pending');
            $table->timestamps();

            $table->foreign('jadwal_sekolah_id')->references('id')->on('jadwal_sekolah')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};
