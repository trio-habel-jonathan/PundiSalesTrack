<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey = 'id_jadwal';

    protected $fillable = [
        'id_tim_sales',
        'id_lokasi',
        'tanggal_kunjungan',
        'status',
       
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


    public function tim_sales()
    {
        return $this->belongsTo(TimSales::class, 'id_tim_sales', 'id_tim_sales');
    }

    public function lokasi() {
        return $this->belongsTo(Lokasi::class, 'id_lokasi', 'id_lokasi');
    }
}
