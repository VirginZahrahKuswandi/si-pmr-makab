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
            $table->unsignedBigInteger('fasilitator_id');
            $table->string('lokasi');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('deskripsi');
            $table->timestamps();

            $table->foreign('fasilitator_id')->references('id')->on('fasilitator')->onUpdate('cascade')->onDelete('cascade');
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
