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
        Schema::create('profil_sales', function (Blueprint $table) {
            $table->id('id_profile_sales'); 
            $table->foreignId('id_users')->constrained('users','id_users')->onDelete('cascade');
            $table->foreignId('id_tim_sales')->constrained('tim_sales','id_tim_sales')->onDelete('cascade');
            $table->foreignId('id_jabatan')->constrained('jabatan','id_jabatan')->onDelete('cascade');
            $table->string('foto_profil');
            $table->string('nama');
            $table->text('alamat');
            $table->string('nomor_telepon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_sales');
    }
};
