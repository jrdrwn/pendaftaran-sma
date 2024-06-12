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
        Schema::table('ortu_wali', function (Blueprint $table) {
            $table->foreign(['ortu_wali_dari_calon'], 'ortu_wali_ibfk_1')->references(['id'])->on('calon')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['id_pendidikan_terakhir'], 'ortu_wali_ibfk_2')->references(['id'])->on('pendidikan')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['id_pekerjaan'], 'ortu_wali_ibfk_3')->references(['id'])->on('pekerjaan')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ortu_wali', function (Blueprint $table) {
            $table->dropForeign('ortu_wali_ibfk_1');
            $table->dropForeign('ortu_wali_ibfk_2');
            $table->dropForeign('ortu_wali_ibfk_3');
        });
    }
};
