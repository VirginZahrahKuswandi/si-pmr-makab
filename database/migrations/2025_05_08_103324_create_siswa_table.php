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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_sekolah');
            $table->string('nis', 20)->nullable();
            $table->string('nisn', 20)->nullable();
            $table->string('nama_lengkap', 100);
            $table->string('nama_panggilan', 100)->nullable();
            $table->string('kelas', 10);
            $table->string('no_telp', 20)->nullable();
            $table->text('alamat')->nullable();
            $table->char('golongan_darah', 2)->nullable();
            $table->timestamps();

            $table->foreign('id_sekolah')->references('id')->on('sekolah')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
