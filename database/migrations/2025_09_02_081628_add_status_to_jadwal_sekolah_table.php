<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('jadwal_sekolah', function (Blueprint $table) {
            if (!Schema::hasColumn('jadwal_sekolah', 'status')) {
                $table->enum('status', ['pending', 'approved', 'rejected'])
                    ->default('approved')
                    ->after('kontak_pembina');
            }

            if (!Schema::hasColumn('jadwal_sekolah', 'catatan')) {
                $table->string('catatan')->nullable()->after('status');
            }

            if (!Schema::hasColumn('jadwal_sekolah', 'created_by')) {
                $table->foreignId('created_by')
                    ->nullable()
                    ->after('catatan')
                    ->constrained('users')
                    ->nullOnDelete();
            }
        });
    }

    public function down(): void
    {
        Schema::table('jadwal_sekolah', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
            $table->dropColumn(['status', 'catatan', 'created_by']);
        });
    }
};
