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
        Schema::create('profil_desa', function (Blueprint $table) {
            $table->id();
            $table->text('deskripsi')->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->string('peta')->nullable();
            // $table->json('batas')->nullable();     // simpan array batas wilayah
            // $table->string('luas')->nullable();
            // $table->string('koordinat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_desa');
    }
};
