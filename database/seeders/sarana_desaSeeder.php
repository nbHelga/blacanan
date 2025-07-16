<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class sarana_desaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
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
}
