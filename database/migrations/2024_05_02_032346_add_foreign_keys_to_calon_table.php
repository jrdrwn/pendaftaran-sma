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
        Schema::table('calon', function (Blueprint $table) {
            $table->foreign(['id_agama'], 'calon_ibfk_1')->references(['id'])->on('agama')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['id_asal_sekolah'], 'calon_ibfk_2')->references(['id'])->on('asal_sekolah')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('calon', function (Blueprint $table) {
            $table->dropForeign('calon_ibfk_1');
            $table->dropForeign('calon_ibfk_2');
        });
    }
};
