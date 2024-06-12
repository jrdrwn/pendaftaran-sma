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
        Schema::create('asal_sekolah', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nama')->nullable();
            $table->enum('status', ['negeri', 'swasta'])->nullable();
            $table->text('alamat')->nullable();
            $table->integer('tahun_lulus')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asal_sekolah');
    }
};
