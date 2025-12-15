<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Menambah kolom actual_output_q1-q4 untuk menyimpan REALISASI POIN
     * pada 3 Indikator Spesial (4 Laporan)
     */
    public function up(): void
    {
        Schema::table('team_targets', function (Blueprint $table) {
            // Kolom untuk menyimpan REALISASI OUTPUT (khusus indikator spesial)
            // Berbeda dengan output_real_q1-q4 yang digunakan untuk TARGET per TW
            $table->decimal('actual_output_q1', 10, 2)->nullable()->after('output_real_q4');
            $table->decimal('actual_output_q2', 10, 2)->nullable()->after('actual_output_q1');
            $table->decimal('actual_output_q3', 10, 2)->nullable()->after('actual_output_q2');
            $table->decimal('actual_output_q4', 10, 2)->nullable()->after('actual_output_q3');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('team_targets', function (Blueprint $table) {
            $table->dropColumn(['actual_output_q1', 'actual_output_q2', 'actual_output_q3', 'actual_output_q4']);
        });
    }
};
