<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Menambah kolom report_name dan is_special_indicator yang hilang
     * Kolom ini dibutuhkan oleh TeamTargetController untuk menyimpan data
     */
    public function up(): void
    {
        Schema::table('team_targets', function (Blueprint $table) {
            // Kolom untuk menyimpan nama laporan/sasaran
            $table->string('report_name')->nullable()->after('activity_name');
            
            // Kolom untuk menandai apakah ini indikator spesial (4 laporan khusus)
            $table->boolean('is_special_indicator')->default(false)->after('actual_output_q4');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('team_targets', function (Blueprint $table) {
            $table->dropColumn(['report_name', 'is_special_indicator']);
        });
    }
};
