<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Klien extends Model
{
    protected $table = 'klien';
    protected $primaryKey = 'id_klien';


    protected $fillable = [
        'id_lokasi',
        'nama_klien',
        'nomor_telepon',
        'email',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


    public function lokasi() {
        return $this->belongsTo(Lokasi::class, 'id_lokasi', 'id_lokasi');
    }

}
