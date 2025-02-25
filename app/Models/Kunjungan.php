<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    protected $table = 'kunjungan';
    protected $primaryKey ='id_kunjungan';

    protected $fillable = [
        'id_klien',
        'id_jadwal',
        'id_produk',
        'id_profile_sales',
        'waktu_mulai',
        'waktu_selesai',
        'deskripsi_aktivitas',
        'status'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


    public function klien() {
        return $this->belongsTo(Klien::class, 'id_klien', 'id_klien');
    }

    public function jadwal() {
        return $this->belongsTo(Jadwal::class, 'id_jadwal', 'id_jadwal');
    }

    public function produk() {
        return $this->belongsTo(Produk::class, 'id_produk', 'id_produk');
    }

    public function profil_sales() {
        return $this->belongsTo(ProfilSales::class, 'id_profile_sales', 'id_profile_sales');
    }

    public function tim_sales() {
        return $this->belongsTo(TimSales::class, 'id_tim_sales', 'id_tim_sales');
    }
    
    public function fotoKunjungan()
    {
        return $this->hasMany(FotoKunjungan::class, 'id_kunjungan', 'id_kunjungan');
    }
    
}
