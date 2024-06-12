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
        Schema::create('calon', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nisn', 10)->nullable()->unique('nisn');
            $table->string('nik', 16)->nullable()->unique('nik');
            $table->string('nama')->nullable();
            $table->enum('jenis_kelamin', ['l', 'p'])->nullable();
            $table->string('tempat_kelahiran')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->integer('id_agama')->nullable()->index('id_agama');
            $table->enum('status_dalam_keluarga', ['kandung', 'angkat'])->nullable();
            $table->string('alamat')->nullable();
            $table->string('no_hp')->nullable()->unique('no_hp');
            $table->integer('id_asal_sekolah')->nullable()->index('id_asal_sekolah');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calon');
    }
};
