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
        Schema::create('jadwal_sekolah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sekolah_id');
            $table->date('tanggal');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('deskripsi')->nullable();
            $table->string('penanggungjawab');
            $table->string('kontak_pj');
            $table->string('pembina');
            $table->string('kontak_pembina');
            $table->timestamps();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->string('catatan')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');

            $table->foreign('sekolah_id')->references('id')->on('sekolah')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_sekolah');
    }
};
