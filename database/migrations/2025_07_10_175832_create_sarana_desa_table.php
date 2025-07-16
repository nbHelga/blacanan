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
        Schema::create('sarana_desa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profil_desa_id')->constrained('profil_desa')->onDelete('cascade');
            $table->json('sekolah_formal')->nullable();
            $table->json('tempat_ibadah')->nullable();
            $table->json('prasarana_kesehatan')->nullable();
            $table->json('sarana_kesehatan')->nullable();
            $table->integer('jumlah_stunting')->default(0);
            $table->json('pamsimas')->nullable();
            $table->json('bumdes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sarana_desa');
    }
};
