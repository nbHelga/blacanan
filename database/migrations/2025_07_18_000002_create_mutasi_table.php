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
        Schema::create('mutasi', function (Blueprint $table) {
            $table->id();
            $table->string('wilayah'); // Desa, Kecamatan, Kabupaten, Provinsi, Negara
            $table->integer('pindah_laki')->default(0);
            $table->integer('pindah_perempuan')->default(0);
            $table->integer('datang_laki')->default(0);
            $table->integer('datang_perempuan')->default(0);
            $table->integer('urutan')->default(0); // untuk mengurutkan data
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mutasi');
    }
};
