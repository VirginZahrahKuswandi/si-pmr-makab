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
        Schema::create('fasilitator', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('pelatihan_sertifikasi');
            $table->string('pendidikan_terakhir');
            $table->string('nomor_anggota_pmi');
            $table->string('nomor_anggota_makab');
            $table->string('tahun_bergabung_makab');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('nomor_rekening_bank_dki')->nullable();
            $table->string('alamat');
            $table->string('telepon');
            $table->string('npwp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fasilitator');
    }
};
