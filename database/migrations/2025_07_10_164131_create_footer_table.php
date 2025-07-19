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
        Schema::create('footer', function (Blueprint $table) {
            $table->id();
            $table->text('deskripsi')->nullable();
            $table->string('alamat')->nullable();
            $table->text('maps')->nullable();
            $table->text('maps_link')->nullable();
            $table->timestamps();
        });

        Schema::create('footer_kontak', function (Blueprint $table) {
            $table->id();
            $table->string('tipe'); // email, phone, facebook, instagram, dll
            $table->string('label')->nullable();
            $table->string('value');
            $table->string('gambar')->nullable(); // untuk logo/icon kontak
            $table->unsignedBigInteger('footer_id');
            $table->foreign('footer_id')->references('id')->on('footer')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footer_kontak'); 
        Schema::dropIfExists('footer');   
    }
};
