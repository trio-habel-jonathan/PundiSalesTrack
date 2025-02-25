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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id('id_jadwal');
            $table->foreignId('id_tim_sales')->constrained('tim_sales','id_tim_sales')->onDelete('cascade');
            $table->foreignId('id_lokasi')->constrained('lokasi','id_lokasi')->onDelete('cascade');
            $table->date('tanggal_kunjungan');
            $table->enum('status',['terjadwal','selesai','dibatalkan']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
