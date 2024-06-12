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
        Schema::create('ortu_wali', function (Blueprint $table) {
            $table->integer('id', true);
            $table->enum('peran', ['ibu', 'ayah', 'wali'])->nullable();
            $table->integer('ortu_wali_dari_calon')->nullable()->index('ortu_wali_dari_calon');
            $table->string('nama')->nullable();
            $table->integer('id_pendidikan_terakhir')->nullable()->index('id_pendidikan_terakhir');
            $table->integer('id_pekerjaan')->nullable()->index('id_pekerjaan');
            $table->double('penghasilan_per_bulan')->nullable();
            $table->string('no_hp')->nullable()->unique('no_hp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ortu_wali');
    }
};
