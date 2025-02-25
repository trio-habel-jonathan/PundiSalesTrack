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
        Schema::create('kunjungan', function (Blueprint $table) {
            $table->id('id_kunjungan');
            $table->foreignId('id_klien')->constrained('klien','id_klien')->onDelete('cascade');
            $table->foreignId('id_jadwal')->constrained('jadwal','id_jadwal')->onDelete('cascade');
            $table->foreignId('id_produk')->constrained('produk','id_produk')->onDelete('cascade');
            $table->foreignId('id_profile_sales')->constrained('profil_sales','id_profile_sales')->onDelete('cascade');
            $table->datetime('waktu_mulai');
            $table->datetime('waktu_selesai');  
            $table->text('deskripsi_aktivitas');
            $table->enum('status',['selesai','negoisasi','gagal']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kunjungan');
    }
};
